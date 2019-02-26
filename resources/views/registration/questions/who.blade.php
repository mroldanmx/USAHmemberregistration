<?php
/**
 * @var \App\Models\RegistrationType $registrationType
 */
?>
<div id="who" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
        <i class="fas fa-user-friends"></i>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Who are you registering?</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-8 {{$errors->has('registration_type_id')?'has-error':''}}" style="text-align: left;" >

            @foreach($registrationTypes as $registrationType)
                @php
                    $checked = $registrationType->id == $cart->activeRegistration()->registration_type_id ? 'checked':'';
                @endphp

                <label class="object radio">{{$registrationType->type}}
                    <input {{$checked}}
                           type="radio"
                           value="{{$registrationType->id}}"
                           name="registration_type_id">
                    <span class="checkmark"></span>
                </label><br>
            @endforeach
                <small style="position: absolute" class="help-block">{{$errors->has('registration_type_id')?$errors->first('registration_type_id'):''}}</small>
        </div>
    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>

</div><!-- container -->