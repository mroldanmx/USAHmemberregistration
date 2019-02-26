<div id="age" data-order="{{$order}}" class="question-wrapper">
    <div class="row question-icon">
        <i class="fas fa-user-tie"></i>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Are you 18 years of age or older?</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-1 col-md-10">

            <p>You must be 18 or older to complete an online registration for yourself or your child.</p>
            <p>If you are not, a parent or guardian must complete this registration for you.</p>

            <div class="object checkbox {{$errors->has('age')?'has-error':''}}">
                <label>
                    <input

                            data-required-message="{{
                            trans('validation.custom.age_requirement.accepted')
                            }}"
                            name="age"
                            type="checkbox"
                            value="1"
                            {{old('age')?'checked':''}}
                    > <span class="checkmark"></span> I am 18 years old or greater <span
                            class="required">*</span>
                </label>
                <small style="position: absolute" class="help-block">{{$errors->has('age')?$errors->first('age'):''}}</small>
            </div>

        </div>
    </div>

    <div class="row">

        <input type="submit" class="btn btn-primary" value="Next">

    </div>

</div>