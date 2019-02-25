<?php

namespace App\Rules;

use App\Http\Requests\RegistrationRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class Birthdate implements Rule
{
    protected $request;
    private $_message;

    /**
     * Create a new rule instance.
     *
     * @param RegistrationRequest $request
     */
    public function __construct(RegistrationRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        try {
            $age = (new Carbon($value))->age;

            if ($this->request->currentRegistration()->registration_type_id == config('constants.registration_type.Child')) {
                $this->_message = trans('registration.17_or_younger');
                $validation = $age < config('constants.age_for_adults');
            } else {
                $this->_message = trans('registration.18_or_older');
                $validation = $age >= config('constants.age_for_adults');
            }

            return $validation;
        } catch (\Exception $exception) {
            return false;
        }


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->_message;
    }
}
