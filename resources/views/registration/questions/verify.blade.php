@php
$member = $reg->member;
$address = $member->address;

@endphp

<script>
    const address = @json($address);

    const use_same_address = ()=>{
      for(let key in address){
          $(`input#${key}`).val(address[key]);
      }
    };
</script>
<div id="verify" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
        <i class="fas fa-check"></i>
        <h2>Verify</h2>
        <p>Please verify the personal information</p>
    </div>

    <div class="wrapper">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Legal First Name</label>
                    <input type="text" class="form-control input-lg">
                    <div class="data">{{$member->first_name}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Legal Last Name</label>
                    <input type="text" class="form-control input-lg">
                    <div class="data">{{$member->last_name}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group" style="margin-bottom: 0;">
                    <label>Birthdate</label>
                    <div class="data">{{$member->dob}}</div>

                    <div class="birthdate">

                        <div class="form-group">
                            <select class="form-control input-lg" placeholder="MM">
                                <option>Month</option>
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
                            <select class="form-control input-lg" placeholder="MM">
                                <option>Day</option>
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
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                                <option>17</option>
                                <option>18</option>
                                <option>19</option>
                                <option>20</option>
                                <option>21</option>
                                <option>22</option>
                                <option>23</option>
                                <option>24</option>
                                <option>25</option>
                                <option>26</option>
                                <option>27</option>
                                <option>28</option>
                                <option>29</option>
                                <option>30</option>
                                <option>31</option>
                            </select>
                        </div>

                        <span>/</span>

                        <div class="form-group">
                            <select class="form-control input-lg" placeholder="MM">
                                <option>Year</option>
                                <option>2019</option>
                                <option>2018</option>
                                <option>2017</option>
                                <option>2016</option>
                            </select>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Gender</label>
                    <div class="data">Male</div>

                    <div class="horizontal-radio-group">
                        <label class="object radio">Male
                            <input type="radio" name="gender">
                            <span class="checkmark"></span>
                        </label>
                        <label class="object radio">Female
                            <input type="radio" name="gender">
                            <span class="checkmark"></span>
                        </label>
                    </div><!-- horizontal-radio-group -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Citizenship</label>
                    <div class="data">{{array_flip(config('constants.citizenship'))[$reg->citizenship]}}</div>

                    <div class="horizontal-radio-group">
                        <label class="object radio">USA
                            <input type="radio" name="gender">
                            <span class="checkmark"></span>
                        </label>
                        <label class="object radio">Canada
                            <input type="radio" name="gender">
                            <span class="checkmark"></span>
                        </label>
                        <label class="object radio">Other
                            <input type="radio" name="gender">
                            <span class="checkmark"></span>
                        </label>
                    </div><!-- horizontal-radio-group -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Ethnic Heritage</label>
                    <div class="data">{{config('constants.diversityTypes')[$reg->diversity_type_id]}}</div>

                    <select class="form-control input-lg">
                        <option>American Indian or Alaska Native</option>
                        <option>Asian</option>
                        <option>Black or African American</option>
                        <option>Native Hawaiian or Other Pacific Islander</option>
                        <option>Hispanic or Latino</option>
                        <option>White (not of Hispanic origin)</option>
                        <option>Two or more races</option>
                        <option>Other</option>
                        <option>I would prefer not to share this information</option>
                    </select>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control input-lg">
                    <div class="data">{{$address->line_1}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>City</label>
                    <input type="text" class="form-control input-lg">
                    <div class="data">{{$address->city}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>State</label>
                    <input type="text" class="form-control input-lg">
                    <div class="data">{{$address->state}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Country</label>
                    <select class="form-control input-lg">
                        <option>United States</option>
                        <option>Canada</option>
                    </select>
                    <div class="data">{{$address->country}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Zip Code</label>
                    <input type="number" class="form-control input-lg">
                    <div class="data">{{$address->zip}}</div>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>E-mail Address</label>
                    <input type="email" class="form-control input-lg">
                    <div class="data">{{$member->email}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="tel" class="form-control input-lg">
                    <div class="data">{{$member->phone_1}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control input-lg">
                    <div class="data">{{$member->phone_2}}</div>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" class="form-control input-lg">
                    <div class="data">{{$reg->memberType->type}}</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Affilliate</label>
                    <input type="text" class="form-control input-lg">
                    <div class="data">Statewide Amateur Hockey Association of Florida</div>
                </div>
            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-12 no-edit">
                <div class="object checkbox">
                    <label>
                        <input name="confirm" value="1" type="checkbox"> <span class="checkmark"></span> I confim that the legal name and
                        birthday are correct <span class="required">*</span>
                    </label>
                </div>
            </div>
            <div class="col-md-12 no-edit">
                Or click below to edit or delete this information
            </div>
            <div class="col-md-12">
                <button class="btn btn-link action edit"><i class="fas fa-edit"></i> Edit</button>

                <button class="btn btn-link action cancel"><i class="fas fa-ban"></i> Cancel</button>
                <button class="btn btn-link action save"><i class="fas fa-folder"></i> Save</button>

            </div>

        </div>


    </div><!-- wrapper -->

    <div class="text-center" style="margin: 25px 0 -2px;">
        <a href="{{url('registration/another')}}" class="btn btn-link vertical-icon"><i class="fas fa-user-plus"></i> Register Another Person</a>
    </div>

    <div class="row">
        <input type="submit" class="btn btn-primary" value="Confirm and Continue">
    </div>


</div><!-- container -->
