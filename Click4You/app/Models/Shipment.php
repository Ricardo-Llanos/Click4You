<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    
    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'shipments';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price'
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:N (Muchos a Uno) con la tabla orders.
     *
     * Relación: Shipment -> "hasMany" -> Order;
     * @return void
     */
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
