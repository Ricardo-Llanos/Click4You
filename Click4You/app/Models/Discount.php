<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'discounts';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'percent',
        'available_from',
        'available_until',
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Product.
     * Establece la tabla pivote 'discount_products'
     *      Establece la FK del modelo actual: 'discount_id'
     *      Establece la FK del modelo relacionado: 'product_id'
     * 
     * Relación: Discount -> "belongsToMany" -> Product.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote discount_products' hace que exista una relación en la que un Descuento pueda tener muchos productos en su discount_products.
     * @return void
     */
    public function products(){
        return $this->belongsToMany(Product::class, 'discount_products', 'discount_id', 'product_id')
                ->withTimestamps();
    }
}
