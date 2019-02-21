<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Registration extends JsonResource
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
            'member_id' => $this->member->id,
            'name' => $this->member->first_name . ' ' . $this->member->last_name,
            'type' => $this->memberType->type,
            'gender' => $this->member->gender,
            'age'   => $this->member->age,
            'country' => $this->member->address->country,
            'registered_date' => $this->created_at->format('Y-m-d'),
        ];
    }
}
