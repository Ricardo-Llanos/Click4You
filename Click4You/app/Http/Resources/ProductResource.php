<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            // 'id' => $this->id,
            'names' => $this->names,
            'price' => $this->price,
            'brand' => $this->brand,
            'quantity' => $this->quantity,
            'is_active' => (bool)$this->is_active,


            'categorie_id' => $this->whenLoaded('categorie', function(){
                return new CategorieResource($this->categorie);
            }),

            'files' => $this->whenLoaded('file_products', function(){
                return FileProductResource::collection($this->file_products);
            }),
        ];
    }
}
