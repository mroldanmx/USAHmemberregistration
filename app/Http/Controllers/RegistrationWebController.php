<?php

namespace App\Http\Controllers;

use App\DonationType;
use App\Http\Requests\Registration\AddressRequest;
use App\Http\Requests\Registration\AgeRequest;
use App\Http\Requests\Registration\ConcussionRequest;
use App\Http\Requests\Registration\ContactRequest;
use App\Http\Requests\Registration\DiversityRequest;
use App\Http\Requests\Registration\DonationRequest;
use App\Http\Requests\Registration\MemberTypeRequest;
use App\Http\Requests\Registration\PaymentRequest;
use App\Http\Requests\Registration\PersonalInformationRequest;
use App\Http\Requests\Registration\VerifyRequest;
use App\Http\Requests\Registration\WaiverRequest;
use App\Http\Requests\Registration\WhoRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Concussion;
use App\Models\Member;
use App\Models\RegistrationType;
use App\Models\Terms;
use App\Models\Waiver;

class RegistrationWebController extends Controller
{
    /* @var Cart $cart */
    protected $cart;

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = $this->questions();
        $step = array_shift($questions);
        return redirect('register/' . $step);
    }

    public function questions()
    {
        //TODO refactor the questions array for each member type, avoid duplicating code.
        $questions = [
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


        if ($this->cart && $registration = $this->cart->activeRegistration()) {
            if ($registration->memberType) {
                switch ($registration->memberType->id) {
                    case config('constants.member_types.Player'):
                    case config('constants.member_types.Manager'):
                        $questions = [
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
                        break;
                }
            }

            if ($registration->registrationType) {

                switch ($registration->registrationType->id) {
                    case config('constants.registration_type.Child'):
                        $questions = [
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
                        break;
                }

            }
        }

        return $questions;
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
    public function loadStep(RegistrationRequest $request, $step)
    {
        $step = $this->nextQuestion($step, true);
        return $this->loadView($step['view'], $step['order'], $request);
    }


    protected function nextQuestion($currentStep = false, $same = false)
    {
        $nextQuestion = 'age';

        if (!$currentStep) {
            $currentStep = -1;
        }

        $questions = $this->questions();

        $currentIndex = array_search($currentStep, $questions);
        $nextIndex = $currentIndex;

        if (!$same && isset($questions[$currentIndex + 1])) {
            $nextIndex = $currentIndex + 1;
        }

        if (!empty($questions[$nextIndex])) {
            $nextQuestion = $questions[$nextIndex];
        }

        return [
            "view" => $nextQuestion,
            "order" => $nextIndex,
        ];
    }

    protected function loadView($question, $order, RegistrationRequest $request)
    {
        $terms = Terms::with('member')->get();
        $cart = $request->getCartBySession();

        $params = compact('question', 'order', 'terms', 'cart');

        if (method_exists($this, $question . "View")) {
            return $this->{$question . "View"}($params);
        }

        return view('registration.form', $params);
    }

    //region Process POST for each question/step

    public function ageStep(AgeRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    /**
     * @param RegistrationRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function saveAndRedirect(RegistrationRequest $request, $extra = [])
    {
        $this->cart = $request->getCartBySession();
        $params = $request->input();
        $params['step'] = $request->step();
        $params = array_merge($params, $extra);

        $request->saveRegistrationProgress($params, $request->input('reg_id'));

        $next = $this->nextQuestion($params['step']);
        $to = '/register/' . $next['view'];
        return redirect($to);
    }

    public function memberTypeStep(MemberTypeRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    public function whoStep(WhoRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    public function personalInformationStep(PersonalInformationRequest $request)
    {
        $member = Member::find($request->input('id'));

        if (!$member) {
            $member = new Member();
        }

        $member->fill($request->input());
        $member->save();
        $member->refresh();

        $extra['member_id'] = $member->id;

        return $this->saveAndRedirect($request, $extra);
    }

    public function addressStep(AddressRequest $request)
    {
        $address = Address::find($request->input('id'));

        if (!$address) {
            $address = new Address();
        }

        $memberId = $request->getCartBySession()->activeRegistration()->member_id;
        $address->fill($request->input());
        $address->member_id = $memberId;
        $address->save();
        $address->refresh();

        $extra['address_id'] = $address->id;

        return $this->saveAndRedirect($request, $extra);
    }

    public function contactStep(ContactRequest $request)
    {

        $member = $request->getCartBySession()->activeRegistration()->member;
        $member->fill($request->input());
        $member->save();
        $member->refresh();

        return $this->saveAndRedirect($request);
    }

    public function diversityStep(DiversityRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    public function donationStep(DonationRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    public function waiverStep(WaiverRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    public function concussionStep(ConcussionRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    public function verifyStep(VerifyRequest $request)
    {
        return $this->saveAndRedirect($request);
    }

    public function paymentStep(PaymentRequest $request)
    {
        return $this->saveAndRedirect($request);
    }
    //endregion

    //region Pre-Process for each question/step

    protected function waiverView($params)
    {
        $params['waiver'] = Waiver::where(['status' => true])->first();
        return view('registration.form', $params);
    }

    protected function concussionView($params)
    {
        $params['waiver'] = Concussion::where(['status' => true])->first();
        return view('registration.form', $params);
    }

    protected function whoView($params)
    {
        $params['registrationTypes'] = RegistrationType::all();
        return view('registration.form', $params);
    }

    protected function donationView($params)
    {
        $params['donationTypes'] = DonationType::where(['status'=>true])->get();
        return view('registration.form', $params);
    }
    //endregion

}
