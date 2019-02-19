<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\RegistrationRequest;

class MemberTypeRequest extends RegistrationRequest
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
            'member_type_id' => 'required',
            'member_type_checkbox' => 'accepted'
        ];
    }

    public function step()
    {
        return 'member_type';
    }
}
