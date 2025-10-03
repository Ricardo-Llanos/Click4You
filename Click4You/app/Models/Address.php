<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    
    /**
     * @var string - Tabla del Modelo
     */
    protected $table='addresses';

    /**
     * @var array<int, string>
     */
    protected $fillable=[
        'user_id',
        'street',
        'number',
        'city',
        'country',
        'postal_code',
        'is_billing',
        'is_shipping'
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación N:1 (Muchos a Uno) con la tabla users.
     *
     * Relación: Address -> "belongsTo" -> User;
     * @return void
     */
    public function users(){
        return $this->belongsTo(User::class);
    }

    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla orders.
     *
     * Relación: Address -> "hasMany" -> Order;
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
