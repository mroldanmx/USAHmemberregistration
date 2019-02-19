@extends('layouts.registration')

@section('content')
        {{$cart->id}}
    @foreach($questions as $order => $question)
        @includeIf("registration.questions.$question",compact('order'))
    @endforeach
@endsection