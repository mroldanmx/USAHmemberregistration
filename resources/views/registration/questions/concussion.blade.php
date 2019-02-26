<div id="concussion" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
          <span class="icon-wrapper">
            <i class="fas fa-file-signature"></i>
          </span>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>USA Hockey Concussion Information and Acknowledgement</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-justify scrollable">
                {{$concussion->html}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-0 col-md-12" style="text-align: center;">

            <div class="object checkbox">
                <input
                        class="sign-with-initials {{$errors->has('concussion_waiver')?"has-error":""}}"
                        value="{{old('concussion_waiver',$reg->concussion_waiver)}}"
                        name="concussion_waiver"
                        type="text" maxlength="2">
                <label>
                    <input value="1" name="concussion_check" type="checkbox"
                           class="{{$errors->has('concussion_check')?"has-error":""}}">

                    <span class="checkmark"></span>


                    I have read and accept the USA Hockey
                    Concussion Information and Acknowledgement <span class="required">*</span>
                </label>

            </div>

        </div>
    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>


</div><!-- container -->