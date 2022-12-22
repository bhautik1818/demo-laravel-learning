<?php

namespace App\Http\Resources\v2;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'firstname' => $this->firstname .' '. $this->lastname,
            'mobile_number' => $this->phone,
        ];
    }
}