<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\RegistrationRequest;
use App\Rules\Registration\DonationRule;

class DonationRequest extends RegistrationRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'donation_cost' => ['required_if:will_donate,true', new DonationRule()],
            'will_donate' => 'required'
        ];
    }

    public function step()
    {
        return 'donation';
    }
}
