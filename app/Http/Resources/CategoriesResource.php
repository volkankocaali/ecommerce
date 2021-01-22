<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'category_name' => $this->name,
            'category_description' => $this->description,
            'category_slug' => $this->slug,
            'publish_at' => $this->created_at,
        ];
    }
}
