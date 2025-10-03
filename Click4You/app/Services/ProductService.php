<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\Models\Product;

class ProductService
{

    protected FileProductService $fileProductService;

    /**
     * Create a new class instance.
     */
    public function __construct(
        FileProductService $fileProductService
    ) {
        $this->fileProductService = $fileProductService;
    }

    public function showProduct()
    {
        $products = Product::with('file_products')->take(20)->get();
        // $products->load('file_products');

        return $products;
    }

    public function storeProduct(array $productData, array $fileProductData)
    {
        return DB::transaction(function () use ($productData, $fileProductData) {
            $product = Product::create($productData);
            $this->fileProductService->storeFileProduct($fileProductData, $product);

            $product->load('file_products');

            return $product;
        });
    }

    public function updateProduct(array $productData, array $fileProductData, int $id)
    {
        return DB::transaction(function () use ($productData, $fileProductData, $id) {
            $product = Product::findOrFail($id);

            if ($productData) {
                $product->update($productData);
            }

            if ($fileProductData) {
                $this->fileProductService->updateFileProduct($fileProductData, $product);
            }

            $product->load('file_products');
            return $product;
        });
    }

    public function deleteProduct(){
        
    }
}
