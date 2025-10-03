<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'categorie_id',
        'names',
        'description',
        'price',
        'brand',
        'quantity',
        'is_active',
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla categories.
     *
     * Relación: Product-> "belongTo" ->Categorie;
     * @return void
     */
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    /**
     * Establece la relación 1:N (Uno a Muchos) con la tabla file_products.
     *
     * Relación: Product-> "hasMany" ->FileProduct;
     * @return void
     */
    public function file_products(){
        return $this->hasMany(FileProduct::class);
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Order.
     * Establece la tabla pivote 'order_products'
     *      Establece la FK del modelo actual: 'product_id'
     *      Establece la FK del modelo relacionado: 'order_id'
     *
     * Relación: Product -> "belongsToMany" -> Order.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote order_products' hace que exista una relación en la que una Orden pueda tener muchos productos en su order_products.
     * @return void
     */
    public function orders(){
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id')
                ->withPivot('product_name', 'quantity', 'unit_price')
                ->withTimestamps();
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Discount.
     * Establece la tabla pivote 'discount_products'
     *      Establece la FK del modelo actual: 'product_id'
     *      Establece la FK del modelo relacionado: 'discount_id'
     *
     * Relación: Product -> "belongsToMany" -> Discount.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote discount_products' hace que exista una relación en la que un Descuento pueda estar asignado a muchos productos en su discount_products.
     * @return void
     */
    public function discounts(){
        return $this->belongsToMany(Discount::class, 'discount_products', 'product_id', 'discount_id')
                ->withTimestamps();
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Build.
     * Establece la tabla pivote 'build_products'
     *      Establece la FK del modelo actual: 'product_id'
     *      Establece la FK del modelo relacionado: 'build_id'
     *
     * Relación: Product -> "belongsToMany" -> Build.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote build_products' hace que exista una relación en la que un Producto Creado puede tener asignado a muchos productos en su build_products.
     * @return void
     */
    public function builds(){
        return $this->belongsToMany(Build::class, 'build_products', 'product_id', 'build_id')
                ->withTimestamps();
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla Product.
     * Establece la tabla pivote 'compabilities'
     *      Establece la FK del modelo actual: 'product_id'
     *      Establece la FK del modelo relacionado: 'compatible_product_id'
     *
     * Relación: Product -> "belongsToMany" -> Product.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote compatibilities' hace que exista una relación en la que un Producto puede tener asignado a muchos productos compatibles en su 'compabilities'.
     * @return void
     */
    public function compabilities(){
        return $this->belongsToMany(Product::class, 'compabilities', 'product_id', 'compatible_product_id')
                ->withTimestamps();
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla User.
     * Establece la tabla pivote 'wish_lists'
     *      Establece la FK del modelo actual: 'product_id'
     *      Establece la FK del modelo relacionado: 'user_id'
     *
     * Relación: Product -> "belongsToMany" -> User.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote wish_lists' hace que exista una relación en la que un Usuario puede tener asignado a muchos productos en su 'wish_list'.
     * @return void
     */
    public function wish_list(){
        return $this->belongsToMany(User::class, 'wish_lists', 'product_id', 'user_id')
                ->withTimestamps();
    }

    /**
     * Establece la relación N:M (Uno a muchos) con la tabla User.
     * Establece la tabla pivote 'shopping_carts'
     *      Establece la FK del modelo actual: 'product_id'
     *      Establece la FK del modelo relacionado: 'user_id'
     *
     * Relación: Product -> "belongsToMany" -> User.
     *
     * Aunque no se tenga una relación directa entre ambas tablas, la 'tabla pivote shopping_carts' hace que exista una relación en la que un Usuario puede tener asignado a muchos productos en su 'shopping_cart'.
     * @return void
     */
    public function shopping_cart(){
        return $this->belongsToMany(User::class, 'shopping_carts', 'product_id', 'user_id')
                ->withPivot('quantity')
                ->withTimestamps();
    }
}
