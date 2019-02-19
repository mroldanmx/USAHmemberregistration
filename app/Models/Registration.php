<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'cart_id',
        'status',
        'step',
        'member_type_id',
        'registration_type_id',
        'member_id',
        'citizenship',
    ];

    public function cart()
    {
        $this->belongsTo(Cart::class);
    }

    public function memberType()
    {
        return $this->belongsTo(MemberType::class);
    }

    public function registrationType()
    {
        return $this->belongsTo(RegistrationType::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
