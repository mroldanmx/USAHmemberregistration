@php
    $prev = old('member_type_id',$reg->member_type_id);
    $playerPrice = \App\Models\Pricing::getMemberPricing('Player')
@endphp
    <div id="member_type" data-order="{{$order}}" class="question-wrapper">
    <span id="player-price" class="hidden">{{$playerPrice}}</span>

    <form action="/register/member_type" method="POST">
        @csrf
        <div class="row question-icon">
            <i class="fas fa-hockey-puck"></i>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>What type of person are you registering?</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6 {{$errors->has('member_type_id')?'has-error':''}}" style="text-align: left;">

                @foreach($terms as $term)
                    @php
                    $checked = '';

                    if($prev && $prev == $term->member->id){
                        $checked = 'checked';
                    }
                    @endphp

                    <label class="object radio ">{{$term->member->type}}
                        <input class="js-registration-control"
                               type="radio"
                               name="member_type_id"
                               {{$checked}}
                               value="{{$term->member->id}}"
                               data-required-message="{{trans('validation.custom.member_type.required')}}">
                        <span class="checkmark"></span>
                    </label><br>
                @endforeach
                    <small style="position: absolute" class="help-block">{{$errors->has('member_type_id')?$errors->first('member_type_id'):''}}</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-0 col-md-12" style="text-align: center;">

                @foreach($terms as $term)
                    <div data-term-id="{{$term->member->id}}" class="note js-membership-requirement">
                        {!! $term->html !!}
                    </div>
                @endforeach
                <div id="membership-requirements-checkbox" class="object checkbox {{$errors->has('member_type_checkbox')?'has-error':''}}">
                    <label>
                        <input
                                name="member_type_checkbox"
                                type="checkbox"
                                data-required-message="{{trans('validation.custom.member_type.accepted')}}">
                        <span class="checkmark"></span>
                        I have read the requirements for this membership type <span class="required">*</span>
                    </label>
                    <small style="position: absolute" class="help-block">{{$errors->has('member_type_checkbox')?$errors->first('member_type_checkbox'):''}}</small>
                </div>

            </div>
        </div>

        <div class="row">

            <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
            <input type="submit" class="btn btn-primary" value="Next">

        </div>
    </form>

</div>