@php
    $registration = $user->activeRegistration();
@endphp
<p>
Welcome, {{$registration->memberType->type}} {{$registration->member->fullName}}.
</p>

<p>
    Your MemberID is {{$registration->member->member_id}}.
</p>

<p>
    Your email is {{$registration->member->email}}.
</p>

<p>
    Your password is {{$registration->clearPass}}.
</p>

<p>
    <a href="http://dev.usahmemberreg.integrass.com/login/{{encrypt($user->clearPass)}}/{{$user->clearPass}}" >
        Click here to login
    </a>.
</p>



