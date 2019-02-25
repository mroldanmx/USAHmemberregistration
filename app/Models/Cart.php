<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'session',
        'cost',
        'status',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    /**
     * @return Registration
     */
    public function activeRegistration()
    {
        return $this->bootstrapRelatedModels();
    }

    /**
     * Creates needed records for a Registration.
     *
     * @param string $status of the required Registration
     *
     * @return
     */
    protected function bootstrapRelatedModels($status = "CREATED")
    {
        $reg = Registration::firstOrCreate([
            "cart_id" => $this->id,
            "status" => $status,
        ]);

        if (!$reg->member) {
            $member = new Member();
            $member->save();
            $reg->member_id = $member->id;
            $reg->save();
            $reg->refresh();
        }


        if (!$reg->member->address) {

            $address = new Address();
            $address->member_id = $reg->member_id;
            $address->save();
            $reg->address_id = $address->id;
            $reg->save();
            $reg->refresh();
        }

        return $reg;
    }

    public function usah_total_cost()
    {
        return $this->registrations()->sum('usah_cost');
    }

    public function affiliate_total_cost()
    {
        return $this->registrations()->sum('affiliate_cost');
    }

    public function donation_total_cost()
    {
        return $this->registrations()->sum('donation_cost');
    }

    public function subtotal()
    {
        return $this->usah_total_cost() + $this->affiliate_total_cost() + $this->donation_total_cost();
    }

    public function total()
    {
        return $this->subtotal();
    }
}
