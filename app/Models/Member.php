<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    const PLAYER_TYPE = 1;
    // const COACH_TYPE = 1;
    const MANAGER_TYPE = 2;
    //const VOLUNTEER_TYPE = 2;
    const OFFICIAL_TYPE = 3;
    //const REFEREE_TYPE = 3;
    const PARENT_TYPE = 99;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'member_id';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'member_created_at';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'member_updated_at';

    /**
     * The address of this member.
     */
    public function address()
    {
        return $this->hasOne(\App\Models\Address::class, 'address_id', 'member_address_id');
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['member_dob'])->age;
    }
}
