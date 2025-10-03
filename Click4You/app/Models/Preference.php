<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'preferences';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'currency',
        'language_code',
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:1 (Uno a Uno) con la tabla users.
     *
     * Relación: Preference -> "belongsTo" -> User;
     * @return void
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
