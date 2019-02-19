@extends('layouts.registration')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <form id="registrationForm" action="{{url("register/$question")}}" method="POST" autocomplete="off">
        @csrf
        <input type="hidden" name="reg_id" value="{{$cart->activeRegistration()->id}}">
        @includeIf("registration.questions.$question")
    </form>
@endsection