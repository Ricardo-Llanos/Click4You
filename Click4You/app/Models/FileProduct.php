<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileProduct extends Model
{
    /**
     * @var string - Tabla del Modelo
     */
    protected $table = 'file_products';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'path',
        'filename',
        'size',
        'type',
    ];

    /*================================================
        Definición de Relaciones con otras Tablas
    =================================================*/
    /**
     * Establece la relación 1:N (Muchos a Uno) con la tabla products.
     *
     * Relación: FileProduct -> "belongsTo" -> Product;
     * @return void
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
