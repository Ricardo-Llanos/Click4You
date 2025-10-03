<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PreferenceResource extends JsonResource
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
            'id' => $this->user_id,
            'currency' => $this->currency,
            'language_code' => $this->language_code,
            
            'user' => $this->whenLoaded('user', function(){
                return new UserResource('user');
            }),
        ];
    }
}
