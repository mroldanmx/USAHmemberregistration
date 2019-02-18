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
            'id' => $this->member_id,
            'name' => $this->member_first_name . ' ' . $this->member_last_name,
            'type' => '',
            'gender' => $this->member_gender,
            'age'   => $this->age,
            'country' => 'USA',
            'registered_date' => $this->member_created_at->format('Y-m-d'),
        ];
    }
}
