<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUser extends Model
{
    use HasFactory;

    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'file_users';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'path',
        'filename',
        'size',
        'type',
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:N (Muchos a Uno) con la tabla users.
     *
     * Relación: FileUser -> "belongsTo" -> User;
     * @return void
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
