<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\Http\Requests\Product\RegisterProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(
        ProductService $productService
    ) {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $product = $this->productService->showProduct();

        return response()->json(
            ProductResource::collection($product), Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterProductRequest $request)
    {
        // Validamos la data
        $data = $request->validated();

        // Extraemos la información
        $productData = $data['product_data'];
        $fileProductData = $data['file_product_data'] ?? [];

        // Llamamos al servicio
        $product = $this->productService->storeProduct($productData, $fileProductData);

        return response()->json(
            new ProductResource($product), Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        // Validamos la data
        $data = $request->validated();

        // Extraemos la información
        $productData = $data['product_data'] ?? [];
        $fileProductData = $data['file_product_data'] ?? [];

        // Llamamos al servicio
        $product = $this->productService->updateProduct($productData, $fileProductData, $id);

        return response()->json([
            'message' => 'Producto editado correctamente',
            'data' => new ProductResource($product),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
