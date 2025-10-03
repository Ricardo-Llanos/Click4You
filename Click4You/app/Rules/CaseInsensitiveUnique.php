<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CaseInsensitiveUnique implements ValidationRule
{

    /**
     * @var string $table - Tabla sobre la cual se buscarán coincidencias
     */
    protected string $table;

    /**
     * @var string $attribute - Atributo sobre el cual se buscará la coincidencia
     */
    protected string $attribute;

    /**
     * @var string $id - Id del atributo a ignorar 
     */
    protected ?string $ignoreId = null;

    public function __construct(
        string $table,
        string $attribute
    ){
        $this->table = $table;
        $this->attribute = $attribute;
    }

    /**
     * El método nos permite ignorar un registro específico en la búsqueda de coincidencias.
     * 
     * @param string $id - Identificador único del registro
     * @return $this - Permite el 
     */
    public function ignore(string $id) : self
    {
        $this->ignoreId = $id;

        return $this;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = mb_strtolower(trim($value));   

        // Generamos el query principal
        $query = DB::table($this->table)
                            ->whereRaw('LOWER('.$this->attribute.')=?', //lower al atributo para que coincida
                                        [$value]); // hacemos lower al value para el insensitive

        // Ignoramos un registro en caso sea necesario
        if ($this->ignoreId){
            $query->where('id', '!=', $this->ignoreId);
        }

        // Ejecutamos la query
        $coincidence = $query->exists();

        // ERROR en caso hayan coincidencias
        if ($coincidence){
            $fail('El valor '.$value.' del campo '.$this->attribute.' ya se encuentra registrado. Inténtelo nuevamente con otro valor.');
        }
    }
}
