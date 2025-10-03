<?php

namespace App\Http\Requests\Product;

use App\Helpers\ArrayRequest;
use App\Rules\CaseInsensitiveUnique;

class RegisterProductRequest extends BaseProduct
{
    /**
     * @var \App\Helpers\ArrayRequests $arrayRequests - Instancia de la clase ArrayRequests
     */
    protected ArrayRequest $arrayRequest;

    public function __construct(
        ArrayRequest $arrayRequest
    ) {
        $this->arrayRequest = $arrayRequest;
    }
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Extraemos la información
        $productData = array_merge_recursive($this->productRules(), $this->customRules()[$this->productPrefix]);
        $productData = $this->arrayRequest
            ->prefixArray(
                array: $productData,
                prefix: $this->productPrefix
            );

        $fileData = array_merge_recursive($this->fileProductRules(), $this->customRules()[$this->fileProductPrefix]);
        $fileData = $this->arrayRequest
            ->prefixArray(
                array: $fileData,
                prefix: $this->fileProductPrefix,
                separator: '.*.'
            );

        return array_merge_recursive([
            $this->productPrefix => ['required', 'min:1'],
            $this->fileProductPrefix => ['sometimes', 'min:1'],

        ], $productData, $fileData);
    }

    public function customRules(): array
    {
        return [
            $this->productPrefix => [
                'names' => ['required', new CaseInsensitiveUnique('products', 'names')],
                'price' => ['required'],
                'brand' => ['required'],
                'quantity' => ['required'],
                'categorie_id' => ['required'],
            ],

            $this->fileProductPrefix => [
                'path' => ['sometimes', 'unique:file_products,path'],
                'filename' => ['sometimes'],
                'size' => ['sometimes'], // BigInteger
                'type' => ['sometimes'],
                'image_file' => ['sometimes'],
            ],
        ];
    }

    public function customMessages(): array
    {
        return [];
    }
}
