<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DWResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Map Domain User model values
        return [
            'data' => [
                'name' => $this->name()->value(),
                'time' => $this->time()->value(),
                'weather' => $this->weather()->value(),
            ]
        ];
    }
}