<?php
/** @var \App\Models\Registration $reg */
$member = $reg->member;

?>
<div id="personal" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
        <i class="fas fa-user"></i>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Participant's personal information</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{$errors->has('first_name')?'has-error':''}}">
                <label>LEGAL First Name <span class="required">*</span></label>
                <input autocomplete="off" type="hidden" name="id" class="form-control input-lg" value="{{old('id')}}">
                <input autocomplete="off" type="text" name="first_name" class="form-control input-lg"
                       value="{{old('first_name',$member->first_name)}}" placeholder="e.g. John" required>
                <small class="help-block">{{$errors->first('first_name')}}</small>

            </div>
        </div>

        <div class="col-md-6 {{$errors->has('last_name')?'has-error':''}}">
            <div class="form-group">
                <label>LEGAL Last Name <span class="required">*</span></label>
                <input autocomplete="off" type="text" name="last_name" class="form-control input-lg"
                       value="{{old('last_name',$member->last_name)}}" placeholder="e.g. Dee" required />
                <small class="help-block">{{$errors->first('last_name')}}</small>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 {{$errors->has('dob')?'has-error':''}}">

            <label class="label-row">Birthdate <span class="required">*</span></label>

            <div class="birthdate">

                <div class="form-group">
                    <input type="text" class="hidden" name="dob" value="{{old('dob')}}">
                    <select name="dob_month" class="form-control input-lg dob-month" placeholder="MM">
                        <option value="" selected disabled>Month</option>
                        @for($i = 1; $i <= 12; $i++)
                            @php
                                $month = str_pad($i,2,'0',STR_PAD_LEFT);
                                $selected = old('dob_month',$member->dobMonth) == $month?'selected':'';
                            @endphp
                            <option {{$selected}} value="{{$month}}">{{$month}}</option>
                        @endfor
                    </select>

                </div>

                <span>/</span>

                <div class="form-group">
                    <select name="dob_day" class="form-control input-lg dob-day" placeholder="DD">
                        <option value="" selected disabled>Day</option>
                        @for($i = 1; $i <= 31; $i++)
                            @php
                                $day = str_pad($i,2,'0',STR_PAD_LEFT);
                                $selected = old('dob_day',$member->dobDay) == $day?'selected':'';
                            @endphp
                            <option {{$selected}} value="{{$day}}">{{$day}}</option>
                        @endfor
                    </select>
                </div>

                <span>/</span>

                <div class="form-group">
                    <select name="dob_year" class="form-control input-lg dob-year" placeholder="YY">
                        <option value="" selected disabled>Year</option>
                        @for($year = date('Y',strtotime('-2 year'));$year > date('Y',strtotime('-100 year')); $year--)
                            @php
                                $selected = old('dob_year',$member->dobYear) == $year?'selected':'';
                            @endphp
                            <option {{$selected}} value="{{$year}}">{{$year}}</option>
                        @endfor
                    </select>
                </div>
                <div class="help-block"></div>
            </div><!-- birthdate -->
            <small class="help-block">{{$errors->first('dob')}}</small>
            <div class="clearfix"></div>
            <input type="date" class="datepicker form-control input-lg "/>
        </div>

        <div class="col-md-6 " style="text-align: left;">

            <div class="horizontal-radio-group {{$errors->has('gender')?'has-error':''}}">
                <label>Gender <span class="required">*</span></label>
                @foreach(config('constants.gender') as $gender => $id)
                    @php
                        $selected = old('citizenship',$member->gender) == $id ?'checked':'';
                    @endphp
                    <label class="object radio">{{$gender}}
                        <input type="radio" {{$selected}} value="{{$id}}" name="gender">
                        <span class="checkmark"></span>
                    </label>
                @endforeach

            </div><!-- horizontal-radio-group -->

        </div>

    </div>

    <div class="row">

        <div class="col-md-12" style="text-align: left;">

            <div class="horizontal-radio-group {{$errors->has('citizenship')?'has-error':''}}">
                <label>Citizenship <span class="required">*</span></label>
                @foreach(config('constants.citizenship') as $country => $id)
                    @php
                        $selected = old('citizenship',$member->citizenship) == $id ?'checked':'';
                    @endphp
                    <label class="object radio">{{$country}}
                        <input type="radio" {{$selected}} value="{{$id}}" name="citizenship">
                        <span class="checkmark"></span>
                    </label>
                @endforeach
            </div><!-- horizontal-radio-group -->

        </div>

    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>

</div><!-- container -->