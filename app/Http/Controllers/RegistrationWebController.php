<?php

namespace App\Http\Controllers;

use App\DonationType;
use App\Http\Requests\RegistrationRequest;
use App\Mail\MemberRegistration;
use App\Mail\Support;
use App\Models\Cart;
use App\Models\Concussion;
use App\Models\Pricing;
use App\Models\Registration;
use App\Models\RegistrationType;
use App\Models\Terms;
use App\Models\Waiver;
use App\Rules\Birthdate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;

class RegistrationWebController extends Controller
{
    /* @var Cart $cart */
    protected $cart;

    /**
     * Display a listing of the resource.
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        $questions = $this->questions();
        $step = array_shift($questions);
        return $this->redirectToStep($step);
    }

    protected function getQuestionsForAll()
    {
        return [
            'age',
            'member_type',
            'who',
            'referee',
            'personal',
            'address',
            'contact',
            'diversity',
            'donation',
            'waiver',
            'concussion',
            'verify',
            'payment',
            'confirmation',
        ];
    }

    protected function getQuestionsForAdults()
    {
        return [
            'age',
            'member_type',
            'who',
            'personal',
            'address',
            'contact',
            'diversity',
            'donation',
            'waiver',
            'concussion',
            'verify',
            'payment',
            'confirmation',
        ];
    }

    protected function getQuestionsForChildren()
    {
        return [
            'age',
            'member_type',
            'who',
            'personal',
            'parents',
            'address',
            'contact',
            'diversity',
            'donation',
            'waiver',
            'concussion',
            'verify',
            'payment',
            'confirmation',
        ];
    }

    public function questions()
    {
        $questions = $this->getQuestionsForAll();


        if ($this->cart && $registration = $this->cart->activeRegistration()) {
            if ($registration->memberType) {
                switch ($registration->memberType->id) {
                    case config('constants.member_types.Player'):
                    case config('constants.member_types.Official'):
                        $questions = $this->getQuestionsForAdults();
                        break;
                }
            }

            if ($registration->registrationType) {

                switch ($registration->registrationType->id) {
                    case config('constants.registration_type.Child'):
                        $questions = $this->getQuestionsForChildren();
                        break;
                }

            }
        }

        return $questions;
    }

    /**
     * @param $step
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function redirectToStep($step)
    {
        $to = '/register/' . $step;
        return redirect($to);
    }

    /**
     * Call a view matching $step
     *
     * @param RegistrationRequest $request
     * @param                     $step
     * i.e age
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getStep(RegistrationRequest $request, $step)
    {
        try {
            $step = $this->loadQuestion($step, true, $request);
            return $this->loadView($step['view'], $step['order'], $request);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    /**
     * Load next or previous question, depending on the $prev flag
     *
     * @param bool $currentStep
     * @param bool $same
     * @param bool $prev
     *
     * @return array
     */
    protected function loadQuestion($currentStep = false, $same = false, $prev = false)
    {
        $questions = $this->questions();
        $question = $questions[0];

        if (!$currentStep) {
            $currentStep = -1;
        }

        $currentIndex = array_search($currentStep, $questions);
        $nextIndex = $currentIndex;

        //load next or previous step from $questions.
        if (!$prev) {
            if (!$same && isset($questions[$currentIndex + 1])) {
                $nextIndex = $currentIndex + 1;
            }
        } else {
            if (!$same && isset($questions[$currentIndex - 1])) {
                $nextIndex = $currentIndex - 1;
            }
        }

        //if step exists, set it.
        if (!empty($questions[$nextIndex])) {
            $question = $questions[$nextIndex];
        }

        return [
            "view" => $question,
            "order" => $nextIndex,
        ];
    }

    protected function loadView($question, $order, RegistrationRequest $request)
    {
        try {
            $cart = $request->getCartBySession();
            $reg = $cart->activeRegistration();

            $params = compact('question', 'order', 'cart', 'reg');

            $request->saveRegistrationProgress([
                'step' => $question,
            ]);
            $method = Str::camel($question);
            if (method_exists($this, $method . "View")) {
                return $this->{$method . "View"}($params);
            }

            return view('registration.form', $params);
        } catch (\Exception $exception) {
            error_log($exception->getMessage());
            return $this->index();
        }
    }

    public function prevQuestion(RegistrationRequest $request)
    {
        $currentStep = $request->currentRegistration()->step;
        $prevQuestion = $this->loadQuestion($currentStep, false, true)['view'];
        return $this->redirectToStep($prevQuestion);
    }

    public function nextQuestion(RegistrationRequest $request)
    {
        $currentStep = $request->currentRegistration()->step;

        //TODO refactor $rules.
        $rules = [];
        switch ($currentStep) {
            case 'age':
                $rules = [
                    'age' => 'accepted',
                ];
                break;
            case 'who':
                $rules = [
                    "registration_type_id" => "required",
                ];
                break;
            case 'member_type':
                $rules = [
                    'member_type_id' => 'required',
                    'member_type_checkbox' => 'accepted',
                ];
                break;
            case 'personal':
                $rules = [
                    'first_name' => 'required',
                    'middle_name' => 'optional',
                    'last_name' => 'required',
                    'dob_day' => 'required',
                    'dob_month' => 'required',
                    'dob_year' => 'required',
                    'dob' => [new Birthdate($request)],
                    'gender' => 'required',
                    'citizenship' => 'required',
                ];
                break;
            case 'address':
                $rules = [
                    'line_1' => 'required',
                    'zip' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'country' => 'required',
                ];
                break;
            case 'contact':
                $rules = [
                    'email' => 'required|confirmed|email|unique:member,email,' . $request->currentRegistration()->member->id,
                    'phone_1' => 'required|',
                    'phone_2' => 'nullable',
                ];
                break;
            case 'diversity':
                $rules = [
                    'diversity_type_id' => 'required',
                ];
                break;
            case 'waiver':
                $rules = [
                    'waiver_check' => 'accepted',
                    'waiver_agree' => 'required',
                ];
                break;
            case 'concussion':
                $rules = [
                    'concussion_check' => 'accepted',
                    'concussion_waiver' => 'required',
                ];
                break;
            case 'donation':
                $rules = [
                    'will_donate' => 'required',
                    'donation_type_id' => 'required_if:will_donate,1|exists:donation_types,id',
                ];
                break;
            case 'verify':
                $rules = [
                    'confirm' => 'accepted',
                ];
                break;

        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $request->step = $currentStep;
        return $this->postStep($request, $currentStep);
    }

    //region Process POST for each question/step

    /**
     * Call a view matching $step
     *
     * @param RegistrationRequest $request
     * @param                     $step
     * i.e age
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postStep(RegistrationRequest $request, $step)
    {

        $method = Str::camel($step);
        $request->step = $step;

        if (method_exists($this, $method . "Step")) {
            return $this->{$method . "Step"}($request);
        }

        return $this->genericStep($request);
    }

    protected function memberTypeStep(RegistrationRequest $request)
    {
        $params['usah_cost'] = Pricing::getMemberPricing($request->input('member_type_id'));
        $params['affiliate_cost'] = Pricing::getAffiliatePricing('Mid-American District');
        return $this->saveAndRedirect($request, $params);
    }

    public function registerAnotherStep(RegistrationRequest $request)
    {
        //stash current registration
        $reg = $request->currentRegistration();
        $reg->status = config('constants.registration.IN-CART');
        $reg->save();
        //start over
        return redirect('registration');

    }


    public function confirmationStep(RegistrationRequest $request)
    {

        foreach ($request->getCartBySession()->registrations as $registration) {

            /** @var Registration $registration */
            $user = $registration->createUserForMember();

            //TODO Security check, validate actual payment [enhancement]
            $registration->status = config('constants.registration.PAID');
            $registration->save();

            //user created? send email.
            if ($user) {
                Mail::to($user->email)
                    ->send(new MemberRegistration($user));

            } else {
                //something went wrong, notify support

                $support_email = config('constants.support_email');
                if ($support_email) {
                    Mail::to($support_email)
                        ->send(new Support($registration));
                }
            }
        }

        return redirect('/login');
    }

    /**
     * @param RegistrationRequest $request
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function genericStep(RegistrationRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    /**
     * @param RegistrationRequest $request
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function saveAndRedirect(RegistrationRequest $request, $extra = [])
    {
        $this->cart = $request->getCartBySession();
        $params = $request->input();
        $params['step'] = $request->step;
        $params = array_merge($params, $extra);

        $request->saveRegistrationProgress($params);

        $next = $this->loadQuestion($params['step'])['view'];
        return $this->redirectToStep($next);
    }

    /**
     * @param RegistrationRequest $request
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function personalStep($request)
    {
        $member = $request->getCartBySession()->activeRegistration()->member;
        $member->fill($request->input());
        $member->save();
        $member->refresh();

        $extra['member_id'] = $member->id;

        return $this->saveAndRedirect($request, $extra);
    }

    /**
     * @param RegistrationRequest $request
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function addressStep($request)
    {

        $address = $request->currentRegistration()->member->address;
        $address->fill($request->input());
        $address->save();
        $address->refresh();

        $extra['address_id'] = $address->id;

        return $this->saveAndRedirect($request, $extra);
    }

    //endregion

    //region Pre-Process for each question/step

    /**
     * @param RegistrationRequest $request
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function contactStep($request)
    {

        $member = $request->currentRegistration()->member;
        $member->fill($request->input());
        $member->save();
        $member->refresh();

        return $this->saveAndRedirect($request);
    }

    /**
     * @param RegistrationRequest $request
     *
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function donationStep($request)
    {

        $reg = $request->currentRegistration();

        $donation_type_id = $request->input('donation_type_id');
        if ($donation_type_id) {
            $donation = DonationType::find($donation_type_id);

            if ($donation) {
                $reg->donation_cost = $donation->cost;
                $reg->donation_type_id = $donation_type_id;
            }
        } else {
            $reg->donation_cost = 0;
            $reg->donation_type_id = 0;
        }

        $reg->save();
        $reg->refresh();

        return $this->saveAndRedirect($request);
    }

    protected function memberTypeView($params)
    {
        $params['terms'] = Terms::with('member')->get();

        return view('registration.form', $params);
    }

    protected function waiverView($params)
    {
        $params['waiver'] = Waiver::where(['status' => true])->first();
        return view('registration.form', $params);
    }

    protected function concussionView($params)
    {
        $params['concussion'] = Concussion::where(['status' => true])->first();
        return view('registration.form', $params);
    }

    protected function whoView($params)
    {
        $params['registrationTypes'] = RegistrationType::all();
        return view('registration.form', $params);
    }

    protected function personalView($params)
    {
        //$params['hideErrorSummary'] = true;
        return view('registration.form', $params);
    }

    protected function donationView($params)
    {
        $params['donationTypes'] = DonationType::where(['status' => true])->get();
        return view('registration.form', $params);
    }

    protected function diversityView($params)
    {
        $params['diversityTypes'] = config('constants.diversityTypes');
        return view('registration.form', $params);
    }
    //endregion

}
