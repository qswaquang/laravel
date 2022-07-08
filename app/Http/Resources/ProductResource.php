<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'stock' => $this->stock,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'category' => $this->category,
            'main_image' => $this->images->first,
            'images' => $this->images,
            'created_at' => $this->created_at,
            'updated_at' => $this->update_at,
        ];
    }
}
