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

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'citizenship',
        'email',
        'phone_1',
        'phone_2',
    ];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member';


    /**
     * The address of this member.
     */
    public function address()
    {
        return $this->hasOne(\App\Models\Address::class);
    }

    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }
}
