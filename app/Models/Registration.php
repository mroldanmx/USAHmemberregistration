<?php

namespace App\Models;

use App\DonationType;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Member member
 */
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
        'diversity_type_id',
        'waiver_agree',
        'concussion_waiver',
        'donation_type_id',
        'usah_cost',
        'affiliate_cost',
        'donation_cost',
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

    public function donation()
    {
        return $this->belongsTo(DonationType::class);
    }

    public function subtotal()
    {
        return $this->usah_cost + $this->affiliate_cost + $this->donation_cost;
    }

    public function total()
    {
        return $this->subtotal();
    }
}
