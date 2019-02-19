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
        return Registration::firstOrCreate([
            "cart_id" => $this->id,
            "status" => "CREATED",
        ]);
    }
}
