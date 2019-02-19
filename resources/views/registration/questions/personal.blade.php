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
            <div class="form-group">
                <label>LEGAL First Name <span class="required">*</span></label>
                <input autocomplete="off" type="hidden" name="id" class="form-control input-lg" value="{{old('id')}}">
                <input required autocomplete="off" type="text" name="first_name" class="form-control input-lg" value="{{old('first_name')}}" placeholder="e.g. John">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>LEGAL Last Name <span class="required">*</span></label>
                <input required autocomplete="off" type="text" name="last_name" class="form-control input-lg" value="{{old('last_name')}}" placeholder="e.g. Dee">
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">

            <label class="label-row">Birthdate <span class="required">*</span></label>

            <div class="birthdate">

                <div class="form-group">
                    <input type="text" class="hidden" name="dob" value="{{old('dob')}}">
                    <select required name="dob_month" class="form-control input-lg dob-month" placeholder="MM">
                        <option value="" selected disabled>Month</option>
                        @for($i = 1; $i <= 12; $i++)
                            @php
                                $month = str_pad($i,2,'0',STR_PAD_LEFT);
                                $selected = old('dob_month') == $month?'selected':'';
                            @endphp
                            <option {{$selected}} value="{{$month}}">{{$month}}</option>
                        @endfor
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>

                <span>/</span>

                <div class="form-group">
                    <select required name="dob_day"  class="form-control input-lg dob-day" placeholder="DD">
                        <option value="" selected disabled>Day</option>
                        @for($i = 1; $i <= 31; $i++)
                            @php
                                $day = str_pad($i,2,'0',STR_PAD_LEFT);
                                $selected = old('dob_day') == $day?'selected':'';
                            @endphp
                            <option {{$selected}} value="{{$day}}">{{$day}}</option>
                        @endfor
                    </select>
                </div>

                <span>/</span>

                <div class="form-group">
                    <select required name="dob_year" class="form-control input-lg dob-year" placeholder="YY">
                        <option value="" selected disabled>Year</option>
                        @for($year = date('Y',strtotime('-100 year'));$year <= date('Y'); $year++)
                            @php
                                $selected = old('dob_year') == $year?'selected':'';
                            @endphp
                            <option {{$selected}} value="{{$year}}">{{$year}}</option>
                        @endfor
                    </select>
                </div>
                <div class="help-block"></div>
            </div><!-- birthdate -->

        </div>

        <div class="col-md-6" style="text-align: left;">

            <div class="horizontal-radio-group">
                <label>Gender <span class="required">*</span></label>
                <label class="object radio">Male
                    <input required type="radio" value="M" name="gender">
                    <span class="checkmark"></span>
                </label>
                <label class="object radio">Female
                    <input type="radio" value="F" name="gender">
                    <span class="checkmark"></span>
                </label>
            </div><!-- horizontal-radio-group -->

        </div>

    </div>

    <div class="row">

        <div class="col-md-12" style="text-align: left;">

            <div class="horizontal-radio-group">
                <label>Citizenship <span class="required">*</span></label>
                <label class="object radio">USA
                    <input required type="radio" value="{{config('constants.citizenship.USA')}}" name="citizenship">
                    <span class="checkmark"></span>
                </label>
                <label class="object radio">Canada
                    <input type="radio" value="{{config('constants.citizenship.Canada')}}" name="citizenship">
                    <span class="checkmark"></span>
                </label>
                <label class="object radio">Other
                    <input type="radio" value="{{config('constants.citizenship.Other')}}" name="citizenship">
                    <span class="checkmark"></span>
                </label>
            </div><!-- horizontal-radio-group -->

        </div>

    </div>

    <div class="row">

        <a href="#" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>


</div><!-- container -->