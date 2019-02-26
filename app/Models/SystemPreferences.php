<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemPreferences extends Model
{
    static function get($application)
    {
        return self::where(compact('application'))->get();
    }
}
