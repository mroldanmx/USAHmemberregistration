<div id="donation" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
        <i class="fas fa-money-bill-wave"></i>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Would you like to make a donation to The USA Hockey Foundation?</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>This to support the growth and development of the game in America? <span class="required">*</span> <a>Learn
                    more</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-2 col-md-8" style="text-align: left;">

            <label class="object radio">Yes
                <input type="radio" value="true" name="will_donate">
                <span class="checkmark"></span>
            </label>

            <div id="donations">
                @foreach($donationTypes as $donationType)
                    <label class="object radio"><span>${{number_format($donationType->cost,2)}}</span>
                        <input type="radio" name="donation_cost" value="{{$donationType->cost}}">
                        <span class="checkmark"></span>
                        @if($donationType->description)
                            <div>{{$donationType->description}}</div>
                        @endif
                    </label>
                @endforeach
            </div><!-- donations -->

            <br>
            <label class="object radio">No Thanks
                <input type="radio" name="will_donate">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="row">

        <a href="#" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>


</div><!-- container -->