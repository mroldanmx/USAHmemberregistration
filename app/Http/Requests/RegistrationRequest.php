<?php

namespace App\Http\Requests;

use App\Models\Cart;
use App\Models\Registration;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{

    public $step = 'none';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    /**
     * @param string $status
     *
     * @return Cart
     */
    public function getCartBySession($status = 'CREATED')
    {
        //create or load a cart
        $cart = Cart::firstOrCreate([
            "session" => session()->getId(),
            "status" => $status,
        ]);

        return $cart;
    }

    /**
     * Returns current, active Registration.
     * @return Registration
     */
    public function currentRegistration()
    {
        return $this->getCartBySession()->activeRegistration();
    }

    public function saveRegistrationProgress($fields)
    {
        $registration = $this->currentRegistration();
        $registration->fill($fields);
        $registration->save();
        $registration->refresh();
        return $registration;
    }


}
