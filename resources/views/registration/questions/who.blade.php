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
        <div class="col-md-offset-2 col-md-8" style="text-align: left;">

            @foreach($registrationTypes as $registrationType)
                <label class="object radio">{{$registrationType->type}}
                    <input type="radio" value="{{$registrationType->id}}" name="registration_type_id">
                    <span class="checkmark"></span>
                </label><br>
            @endforeach

        </div>
    </div>

    <div class="row">

        <a href="#" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>

</div><!-- container -->