@extends('layouts.registration')

@section('content')
    @if ($errors->any() && !isset($hideErrorSummary))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <form id="registrationForm" action="{{url("register/nextQuestion")}}" method="POST" autocomplete="off">
        @csrf

        @includeIf("registration.questions.$question")

    </form>
@endsection