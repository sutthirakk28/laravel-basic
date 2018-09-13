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
            'id_per' => $this->id_per,
            'surname' => $this->surname,        
            'nickname' => $this->nickname,
            'type_leave' => $this->type_leave,
            'nstart_day' => $this->nstart_day,
            'nend_day' => $this->nend_day,
        ];    
        //return parent::toArray($request);
    }    
}
