<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'member_first_name' => 'required',
            'member_last_name' => 'required',
            'member_email' => 'required',
            'member_phone_1' => 'required',
            'address_line_1' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ];
    }
}
