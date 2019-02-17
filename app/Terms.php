<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    //protected $table = 'terms';

    protected $fillable = [
        'html',
    ];

    public function member()
    {
        return $this->belongsTo('App\MemberType','member_type_id','id');
    }



}
