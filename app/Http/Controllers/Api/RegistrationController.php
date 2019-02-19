<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registration\AgeRequest;
use App\Http\Requests\Registration\PersonalInformationRequest;
use App\Traits\RegistrationTrait;

class RegistrationController extends Controller
{
    use RegistrationTrait;


    public function age(AgeRequest $request)
    {
        $params = $request->input();
        $params['step'] = 'age';
        $this->saveRegistrationProgress($params, $request->input('reg_id'));
    }

}
