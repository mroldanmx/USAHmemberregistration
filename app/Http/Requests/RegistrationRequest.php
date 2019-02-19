<?php

namespace App\Http\Requests;

use App\Models\Cart;
use App\Models\Registration;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    /**
     * @return Cart
     */
    public function getCartBySession()
    {
        //create or load a cart
        $cart = Cart::firstOrCreate([
            "session" => session()->getId(),
            "status" => 'CREATED',
        ]);

        return $cart;
    }

    public function saveRegistrationProgress($fields, $registrationID)
    {
        $registration = Registration::findOrFail($registrationID);
        $registration->fill($fields);
        $registration->save();
        $registration->refresh();
        return $registration;
    }

    public function step(){

    }

}
