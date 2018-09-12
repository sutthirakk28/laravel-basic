<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
        'id' => $this->id,
        'surname' => $this->surname,
        'id_employ' => $this->id_employ,
        'test' => 'This is just a test',
        // 'created_at' => $this->created_at,
        // 'updated_at' => $this->updated_at,
        'created_at' => (string)$this->created_at,
        'updated_at' => (string)$this->updated_at,
    ];
    }
}
