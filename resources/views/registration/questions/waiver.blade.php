<div id="waiver" data-order="{{$order}}" class="question-wrapper">

<div class="row question-icon">
          <span class="icon-wrapper">
          	<i class="fas fa-file-signature"></i>
          </span>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Waiver Of Liability</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-justify">
                {{$waiver->html}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-0 col-md-12" style="text-align: center;">

            <div class="object checkbox">
                <input
                        class="sign-with-initials"
                        value="{{old('waiver_agree',$reg->waiver_agree)}}"
                        name="waiver_agree"
                        type="text" maxlength="2">
                <label>
                    <input value="1" name="waiver_check" type="checkbox">

                    <span class="checkmark"></span>


                    I have read and accept the USA Hockey Waiver of Liability <span class="required">*</span>
                </label>

            </div>

        </div>
    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>


</div><!-- container -->