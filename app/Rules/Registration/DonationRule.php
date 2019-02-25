<?php

namespace App\Rules\Registration;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class DonationRule implements Rule
{
    /**
     * Create a new rule instance.
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $validator = Validator::make([
            'donation_cost' => $value,
        ], [
            'donation_cost' => [
                'required_if:will_donate,true',
                \Illuminate\Validation\Rule::exists('donation_types')->where(function ($query) use (
                    $value
                ) {
                    $query->where([
                        'costed' => $value,
                        'status' => true,
                    ]);
                }),
            ],
        ]);

        return $validator->passes();
    }

    /**
     * Get the validation error message.
     * @return string
     */
    public function message()
    {
        return trans('validation.custom.donation_cost.invalid');
    }
}
