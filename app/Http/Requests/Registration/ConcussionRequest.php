<?php

namespace App\Http\Requests\Registration;

use App\Http\Requests\RegistrationRequest;

class ConcussionRequest extends RegistrationRequest
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
            'concussion_waiver' => 'accepted'
        ];
    }

    public function step()
    {
        return 'concussion';
    }
}
