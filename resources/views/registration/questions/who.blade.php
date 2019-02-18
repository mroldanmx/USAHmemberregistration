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

            <label class="object radio">Myself
                <input required value="1" type="radio" name="who" class="">
                <span class="checkmark"></span>
            </label><br>

            <div class="js-child">
                <label class="object radio">Child Family Member (Under 18)
                    <input type="radio" value="2" name="who">
                    <span class="checkmark"></span>
                </label><br>
            </div>
            <label class="object radio">Adult Family Member (18 and over)
                <input type="radio" value="3" name="who">
                <span class="checkmark"></span>
            </label><br>
            <label class="object radio">Adult Non-family Member
                <input type="radio" value="4" name="who">
                <span class="checkmark"></span>
            </label>

        </div>
    </div>

</div><!-- container -->