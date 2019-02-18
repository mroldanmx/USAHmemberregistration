<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    const MYSELF = 1;
    const CHILD = 2;
    const ADULT_FAMILY = 3;
    const ADULT_NON_FAMILY = 4;

    protected $table = 'registration';

}
