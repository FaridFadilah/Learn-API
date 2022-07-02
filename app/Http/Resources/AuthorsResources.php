<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorsResources extends JsonResource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request){
        return [
            "id" => (string)$this->id,
            "type" => "authors",
            "attributes" => [
                "name" => $this->name,
                "create_at" => $this->created_at,
                "update_at" => $this->updated_at,
            ]
        ];
    }
}