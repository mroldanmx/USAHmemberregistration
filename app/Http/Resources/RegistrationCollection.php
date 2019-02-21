<?php

namespace App\Http\Resources;

use App\Models\Registration;
use App\Http\Resources\Registration as RegistrationResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegistrationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
