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
        $firstName = data_get($this, 'member.first_name', '');
        $lastName = data_get($this, 'member.last_name', '');

        return [
            'id' => $this->id,
            'member_id' => data_get($this, 'member.id', 'NA'),    //$this->member->id
            'name' => $firstName . ' ' . $lastName,
            'type' => data_get($this, 'memberType.type', 'NA'),
            'gender' => data_get($this, 'member.gender', 'NA'),
            'age'   => data_get($this, 'member.age', 'NA'),
            'country' => data_get($this, 'member.address.country', 'NA'),
            'registered_date' => $this->created_at->format('Y-m-d'),
        ];
    }
}
