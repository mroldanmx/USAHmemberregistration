<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Member extends JsonResource
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
            'name' => $this->first_name . ' ' . $this->last_name,
            'type' => '',
            'gender' => $this->gender,
            'age'   => $this->age,
            'country' => 'USA',
            'registered_date' => $this->created_at->format('Y-m-d'),
        ];
    }
}
