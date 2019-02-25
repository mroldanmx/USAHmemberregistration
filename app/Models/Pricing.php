<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{

    static function getMemberPricing($member_type)
    {
        return config('constants.member_pricing.'.$member_type.'.Regular');
    }

    static function getAffiliatePricing($affiliate)
    {
        return config('constants.affiliate_pricing')[$affiliate]['Regular'];
    }
}
