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
                <input type="radio" value="1" {{$selected = old('donation_type_id',$reg->donation_type_id) ? 'checked':''}} name="will_donate">
                <span class="checkmark"></span>
            </label>

            <div id="donations" style="display: none">
                @foreach($donationTypes as $donationType)
                    @php
                        $selected = old('donation_type_id',$reg->donation_type_id) == $donationType->id?'checked':'';
                    @endphp
                    <label class="object radio"><span>${{number_format($donationType->cost,2)}}</span>
                        <input type="radio" {{$selected}} name="donation_type_id" value="{{$donationType->id}}">
                        <span class="checkmark"></span>
                        @if($donationType->description)
                            <div>{{$donationType->description}}</div>
                        @endif
                    </label>
                @endforeach
            </div><!-- donations -->

            <br>
            <label class="object radio">No Thanks
                <input type="radio" value=0 name="will_donate">
                <span class="checkmark"></span>
            </label>
        </div>
    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>


</div><!-- container -->