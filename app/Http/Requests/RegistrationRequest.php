<?php

namespace App\Http\Requests;

use App\Member;
use App\Registration;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'age_requirement' => 'accepted',
            'member_type' => [
                'required',
                Rule::in([
                    Member::PLAYER_TYPE,
                    Member::MANAGER_TYPE,
                    Member::OFFICIAL_TYPE,
                ]),
            ],

            //Official's
            'is_returning_official' => ['required', 'boolean'],
            'official_number' => 'required_if:is_returning_official,true',
            'fist_name' => 'required',
            'last_name' => 'required',
            'dob_day' => 'required',
            'dob_month' => 'required',
            'dob_year' => 'required',
            'zip_code' => 'required',

            'registration_type' => [
                'required',
                Rule::in([
                    Registration::MYSELF,
                    Registration::CHILD,
                    Registration::ADULT_FAMILY,
                    Registration::ADULT_NON_FAMILY,
                ]),
            ],


        ];
    }

}
