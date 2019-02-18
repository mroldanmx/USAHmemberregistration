<?php

namespace App\Http\Resources;

use App\Models\Member;
use App\Http\Resources\Member as MemberResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MembersCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Member $member) {
            return (new MemberResource($member));
        });
        return parent::toArray($request);
    }
}
