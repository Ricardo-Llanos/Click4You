<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'builds';

    /**
     * @var array<int, string>
     */
    protected $fillable=[
        'user_id',
        'name',
        'is_complete',
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación N:1 (Muchos a Uno) con la tabla users.
     *
     * Relación: Build -> "belongsTo" -> User;
     * @return void
     */
    public function builds(){
        return $this->belongsTo(User::class);
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Product.
     * Establece la tabla pivote 'build_products'
     *      Establece la FK del modelo actual: 'user_id'
     *      Establece la FK del modelo relacionado: 'product_id'
     * 
     * Relación: Build -> "belongsToMany" -> Product.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote build_products' hace que exista una relación en la que un Producto Construido pueda tener muchos productos en su build_products.
     * @return void
     */
    public function products(){
        return $this->belongsToMany(Product::class, 'build_products', 'build_id', 'product_id')
                ->withTimestamps();
    }
}
