<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => $this->id,
            'order' => $this->order,
            'state' => $this->state,
            'total_price' => $this->total_price,

            'shipment' => $this->whenLoaded('shipment', function(){
                return new ShipmentResource('shipment');
            }),
            'address' => $this->whenLoaded('address', function(){
                return new AddressResource('address');
            }),
        ];
    }
}
