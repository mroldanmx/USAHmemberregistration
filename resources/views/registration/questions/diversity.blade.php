<div id="diversity" data-order="{{$order}}" class="question-wrapper">

<div class="row question-icon">
        <i class="fas fa-globe-americas"></i>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>What's the participant's racial or ethnic heritage?</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p>As the National Governing Body of ice hockey, our mission is to promote a "fun and learning" environment for the growth of the sport and all its participants. USA Hockey believes that hockey is for everyone and the more diverse our sport is, the better off we'll be.</p>
            <p>To help us more fully understand the make-up of our sport, please share with us which of the following best represents it <span class="required">*</span></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10" style="text-align: left;">
            @foreach($diversityTypes as $id => $diversity)
                @php
                    $selected = old('diversity_type_id',$reg->diversity_type_id) === $id ?'checked':'';
                @endphp

                <label class="object radio">{{$diversity}}
                    <input type="radio" {{$selected}} value="{{$id}}" name="diversity_type_id">
                    <span class="checkmark"></span>
                </label><br>
            @endforeach

        </div>
    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>


</div><!-- container -->