<?php
/** @var \App\Models\Registration $reg */
$member = $reg->member;

?>
<div id="contact" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
        <i class="fas fa-phone"></i>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>What is the participant's contact?</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group {{$errors->has('email')?'has-error':''}}">
                <label for="exampleInputPassword1">Email Address <span class="required">*</span></label>
                <input name="email" value="{{old('email',$member->email)}}" required type="email" class="form-control input-lg"
                       placeholder="e.g. john.dee@mail.com">
                <small class="help-block">{{$errors->first('email')}}</small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{$errors->has('email_confirmation')?'has-error':''}}">
                <label for="exampleInputPassword1">Re-type Email Address <span class="required">*</span></label>
                <input name="email_confirmation" type="email" required class="form-control input-lg"
                       placeholder="e.g. john.dee@mail.com">
                <small class="help-block">{{$errors->first('email_confirmation')}}</small>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group {{$errors->has('phone_1')?'has-error':''}}">
                <label for="exampleInputPassword1">Mobile Number <span>*</span></label>
                <input maxlength="14" name="phone_1" type="text" required  value="{{old('phone_1',$member->phone_1)}}"
                       class="form-control input-lg phone-fm" placeholder="e.g. 213 456 7890">
                <small class="help-block">{{$errors->first('phone_1')}}</small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group {{$errors->has('phone_2')?'has-error':''}}">
                <label for="exampleInputPassword1">Phone Number (optional)</label>
                <input maxlength="14" name="phone_2" type="text" value="{{old('phone_2',$member->phone_2)}}"
                       class="form-control input-lg phone-fm" placeholder="e.g. 213 456 7890">

            </div>
        </div>

    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>


</div><!-- container -->