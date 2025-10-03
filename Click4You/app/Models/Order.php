<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'orders';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'shipment_id',
        'address_id',
        'order',
        'state',
        'total_price',
    ];


    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:N (Muchos a Uno) con la tabla users.
     *
     * Relación: Order -> "belongsTo" -> User;
     * @return void
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Establece la relación 1:N (Muchos a Uno) con la tabla shipments.
     *
     * Relación: Order -> "belongsTo" -> Shipment;
     * @return void
     */
    public function shipment(){
        return $this->belongsTo(Shipment::class);
    }

    /**
     * Establece la relación 1:N (Muchos a Uno) con la tabla addresses.
     *
     * Relación: Order -> "belongsTo" -> Address;
     * @return void
     */
    public function address(){
        return $this->belongsTo(Address::class);
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Product.
     * Establece la tabla pivote 'order_products'
     *      Establece la FK del modelo actual: 'order_id'
     *      Establece la FK del modelo relacionado: 'product_id'
     * 
     * Relación: Order -> "belongsToMany" -> Product.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote order_products' hace que exista una relación en la que una Orden pueda tener muchos productos en su order_products.
     * @return void
     */
    public function products(){
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
                ->withPivot('product_name', 'quantity', 'unit_price')
                ->withTimestamps();
    }
}