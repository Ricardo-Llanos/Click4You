<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /**
     * @var string - - Tabla del Modelo
     */
    protected $table = 'categories';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla products.
     *
     * Relación: Categorie -> "belongsTo" -> Product;
     * @return void
     */
    public function products(){
        return $this->hasMany(Product::class);
    }

}
