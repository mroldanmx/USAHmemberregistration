<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\RegistrationRequest;

class AddressRequest extends RegistrationRequest
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
            'line_1'=>'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
        ];
    }

    public function step()
    {
      return 'address';
    }
}
