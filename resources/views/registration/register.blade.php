@extends('layouts.registration')

@section('content')

    @foreach($questions as $order => $question)
        @includeIf("registration.questions.$question",compact('order'))
    @endforeach

    <div id="form-buttons" class="row js-form-buttons">

        <div class="btn btn-link js-prev-btn">Previous</div>
        <div class="btn btn-primary js-next-btn">Next</div>
        <div class="btn btn-primary js-last-btn">Continue to Next Step</div>

    </div>
@endsection