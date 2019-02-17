<?php

namespace App;

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
}
