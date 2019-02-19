<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
    //protected $table = 'terms';

    protected $fillable = [
        'html',
    ];

    /**
     * The member this terms belongs to.
     */
    public function member()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id', 'id');
    }



}
