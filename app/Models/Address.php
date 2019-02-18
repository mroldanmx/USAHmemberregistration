<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The member this address belongs to.
     */
    public function member()
    {
        return $this->belongsToMany(\App\Models\Member::class);
    }
}
