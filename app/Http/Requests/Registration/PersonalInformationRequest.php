<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\RegistrationRequest;

class PersonalInformationRequest extends RegistrationRequest
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
            'first_name' => 'required',
            'middle_name' => 'optional',
            'last_name' => 'required',
            'dob_day' => 'required',
            'dob_month' => 'required',
            'dob_year' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'citizenship' => 'required',
        ];
    }

    public function step()
    {
        return 'personal';
    }
}
