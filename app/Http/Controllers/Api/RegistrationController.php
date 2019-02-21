<?php

namespace App\Http\Controllers\Api;

use App\Models\Registration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Resources\RegistrationCollection;
use App\Http\Requests\Registration\AgeRequest;
use App\Http\Requests\Registration\PersonalInformationRequest;

class RegistrationController extends Controller
{

    public function age(AgeRequest $request)
    {
        $params = $request->input();
        $params['step'] = 'age';
        $this->saveRegistrationProgress($params, $request->input('reg_id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->input('length', 20);

        //$startPage = $request->input('start', 0);
        //$startPage = $startPage / $perPage;

        $registrations = Registration::with(['member.address', 'memberType'])
        					->orderBy('created_at', 'desc')
        					->paginate($perPage);
        return new RegistrationCollection($registrations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, $id)
    {
        $registration = Registration::with(['member.address', 'memberType'])->findOrFail($id);

        try {
            $input = $request->all();

            $registration->fill($input)->save();
            $registration->member->update($input);
            $registration->member->address->update($input);

            return response()->json(['success' => true, 'message' => 'Member data saved', 'data' => ['member' => $registration]]);
        }
        catch(Excception $e) {
            Log::info('Error updating member: '.$e->getMessage());
            return response()->json(['errors' => $e->getMessage(), 'message' => 'Could not update the member']);
        }
    }

}
