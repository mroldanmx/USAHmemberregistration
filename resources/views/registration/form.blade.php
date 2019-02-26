@extends('layouts.registration')

@section('content')
    <form id="registrationForm" action="{{url("register/nextQuestion")}}" method="POST" autocomplete="off">
        @csrf

        @includeIf("registration.questions.$question")

    </form>
@endsection