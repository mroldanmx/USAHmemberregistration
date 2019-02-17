<div id="member_type" data-order="{{$order}}" class="question-wrapper">

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
                    <input type="radio" name="radio">
                    <span class="checkmark"></span>
                </label><br>
            @endforeach

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            @foreach($terms as $term)
                <div data-term-id="{{$term->member_type_id}}" class="note">
                    {!! $term->html !!}
                </div>
            @endforeach
                <div class="object checkbox">
                    <label>
                        <input type="checkbox">  <span class="checkmark"></span>
                        I accept this<span class="required">*</span>
                    </label>
                </div>

        </div>
    </div>


</div>