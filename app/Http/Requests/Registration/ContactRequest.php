<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\RegistrationRequest;

class ContactRequest extends RegistrationRequest
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
            'email' => 'required|confirmed|email',
            'phone_1' => 'required',
            'phone_2' => 'nullable',
        ];
    }

    public function step()
    {
        return 'contact';
    }
}
