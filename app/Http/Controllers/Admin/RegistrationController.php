<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Registration;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('admin.registration.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $registration = Registration::with(['member.address', 'memberType'])->findOrFail($id);
        $states = [
            'US' => json_decode(file_get_contents(storage_path('app/data/us_states_titlecase.json'))),
            'CA' => json_decode(file_get_contents(storage_path('app/data/canada_states_titlecase.json'))),
        ];
        $memberTypes = \App\Models\MemberType::pluck('type', 'id')->all();
        return view('admin.registration.view', compact('registration', 'states', 'memberTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registration = Registration::with(['member.address', 'memberType'])->findOrFail($id);
        $states = [
            'US' => json_decode(file_get_contents(storage_path('app/data/us_states_titlecase.json'))),
            'CA' => json_decode(file_get_contents(storage_path('app/data/canada_states_titlecase.json'))),
        ];
        $memberTypes = \App\Models\MemberType::pluck('type', 'id')->all();
        return view('admin.registration.edit', compact('registration', 'states', 'memberTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\UpdateMemberRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
