<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

use App\Models\Product;
use App\Models\FileProduct;
use Illuminate\Support\Facades\Storage;

class FileProductService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * @param array $fileProductData
     * @param \App\Models\Product $product
     */
    public function storeFileProduct(array $fileProductData, Product $product){
        foreach($fileProductData as $field=>$file){
            if ($file instanceof UploadedFile){
                $fileProductData['path'] = $file->store('product-files/'.$product->id, 'public');

                FileProduct::create($fileProductData);
            }
        }
    }

    public function updateFileProduct(array $fileProductData, Product $product){
        foreach ($fileProductData as $field => $file) {
            if ($file instanceof UploadedFile) {
                // Buscar archivo existente del mismo tipo
                $exists = $product->file_products->where('path', $product->path)->exists();

                // Si existe archivo anterior, eliminarlo del almacenamiento
                if ($exists && Storage::disk('public')->exists($product->path)) {
                    Storage::disk('public')->delete($product->path);
                    $product->delete();
                }

                $fileProductData['path'] = $file->store('product-files/'.$product->id, 'public');

                FileProduct::create($fileProductData);
            }
        }
    }
}

?>