<?php

/** @var \App\Models\Registration $reg */

//TODO refactor countries section

$address = $reg->member->address;
?>
<div id="address" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
        <i class="fas fa-home"></i>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>What is the participant's mailing address?</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 {{$errors->has('line_1')?'has-error':''}}">
            <div class="form-group">
                <label for="exampleInputPassword1">Mailing Address  <span class="required">*</span></label>
                <input type="hidden" name="id" value="{{old('id')}}" >
                <input type="text" name="line_1" value="{{old('line_1',$address->line_1)}}" class="form-control input-lg" placeholder="e.g. 580 Whiff Oaf Lane">
            </div>
        </div>

        <div class="col-md-6 {{$errors->has('zip')?'has-error':''}}">
            <div class="form-group">
                <label for="exampleInputPassword1">Zip Code <span class="required">*</span></label>
                <input type="text" name="zip" value="{{old('zip',$address->zip)}}" class="form-control input-lg js-zipcode" placeholder="e.g. Zip Code">
            </div>
        </div>

        <div class="col-md-6 {{$errors->has('city')?'has-error':''}}">
            <div class="form-group">
                <label for="exampleInputPassword1">City <span class="required">*</span></label>
                <input type="text" name="city" value="{{old('city',$address->city)}}" class="form-control input-lg" placeholder="e.g. Orlando">
            </div>
        </div>

        <div class="col-md-6 {{$errors->has('state')?'has-error':''}}">
            <div class="form-group">
                <label for="exampleInputPassword1">State <span class="required">*</span></label>
                <input type="text" name="state" value="{{old('state',$address->state)}}" class="form-control input-lg" placeholder="e.g. Florida">
            </div>
        </div>

        <div class="col-md-6 {{$errors->has('country')?'has-error':''}}">
            <div class="form-group">
                <label for="exampleInputPassword1">Country <span class="required">*</span></label>
                <select class="form-control input-lg" name="country" value="{{old('country',$address->country)}}" placeholder="e.g. USA">
                    <option>e.g. United States</option>
                    <option {{$address->country == 'US'?'selected':''}} value="US">United States</option>
                    <option {{$address->country == 'CA'?'selected':''}} value="CA">Canada</option>
                </select>
            </div>
        </div>


    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>

</div><!-- container -->