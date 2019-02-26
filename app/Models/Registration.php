<?php

namespace App\Models;

use App\DonationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;

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

    /**
     * @return bool
     */
    public function createUserForMember()
    {
        try {
            $clearPass = str_random(10);

            $memberRole = Role::where('slug', 'member')->firstOrFail();
            $member = User::create([
                'name' => 'Member',
                'email' => $this->member->email,
                'email_verified_at' => null,
                'password' => Hash::make($clearPass),
            ]);
            $member->clearPass = $clearPass;// intended to be shown only once in the email
            $member->roles()->save($memberRole);
            $member->refresh();

            //tie this registration to the newly created user

            if (!$this->user_id) {
                $this->user_id = $member->id;
                $this->save();
            }
            return User::find($this->user_id);
        }
        catch(QueryException $q ){ //email exists
            return User::find($this->user_id);
        }
        catch (\Exception $exception) {
            error_log($exception->getMessage());
            return false;
        }
    }
}
