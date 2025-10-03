<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'street' => $this->street,
            'number' => $this->number,
            'city' => $this->city,
            'country' => $this->country,
            'postal_code' => $this->postal_code,
            'is_billing' => $this->is_billing,
            'is_shipping' => $this->is_shipping,

            'users' => $this->whenLoaded('users', function(){
                return UserResource::collection('users');
            }),
        ];
    }
}
