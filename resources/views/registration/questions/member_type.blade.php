<div id="member_type" data-order="{{$order}}" class="question-wrapper">

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
            <div class="col-md-offset-3 col-md-6" style="text-align: left;">

                @foreach($terms as $term)
                    <label class="object radio">{{$term->member->type}}
                        <input class="js-registration-control"
                               type="radio"
                               name="member_type_id"
                               required
                               value="{{$term->member->id}}"
                               data-required-message="{{trans('validation.custom.member_type.required')}}">
                        <span class="checkmark"></span>
                    </label><br>
                @endforeach

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                @foreach($terms as $term)
                    <div data-term-id="{{$term->member->id}}" class="note js-membership-requirement">
                        {!! $term->html !!}
                    </div>
                @endforeach
                <div id="membership-requirements-checkbox" class="object checkbox">
                    <label>
                        <input
                                name="member_type_checkbox"
                                type="checkbox"
                                required
                                data-required-message="{{trans('validation.custom.member_type.accepted')}}">
                        <span class="checkmark"></span>
                        I have read the requirements for this membership type <span class="required">*</span>
                    </label>
                </div>

            </div>
        </div>

        <div class="row">

            <a href="#" class="btn btn-link js-go-back">Previous</a>
            <input type="submit" class="btn btn-primary" value="Next">

        </div>
    </form>

</div>