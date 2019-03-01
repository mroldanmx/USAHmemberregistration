<div id="referee" data-order="{{$order}}" class="question-wrapper">

    <div class="row question-icon">
        <i class="fas fa-undo" style="padding-left: 3px;"></i>
        <h2>Are you a returning official?</h2>
    </div>

    <div class="row ">
        <div class="col-md-offset-4 col-md-4" style="text-align: left;">

            <label class="object radio">Yes
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label><br>
            <label class="object radio">No
                <input type="radio" name="radio">
                <span class="checkmark"></span>
            </label>

        </div>
    </div>

    <div id="referee-video" class="row">
        <div class="iframe-container">
            <iframe src="https://www.youtube.com/embed/tfwwLQdoZwY" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>

    <div class="block-container">

        <div id="referee-yes">
            <h3>Enter USAH Official's Number</h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>USAH Official's Number<span class="required">*</span></label>
                        <input type="text" class="form-control input-lg" placeholder="e.g. John">
                    </div>
                </div>
            </div>

            <hr style="margin-top: 8px;">

            <h3>Or</h3>
        </div><!-- yes -->

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Legal First Name <span class="required">*</span></label>
                    <input type="text" class="form-control input-lg" placeholder="e.g. John">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Legal Last Name <span class="required">*</span></label>
                    <input type="text" class="form-control input-lg" placeholder="e.g. Dee">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-8 col-md-8">

                <label class="label-row">Birthdate <span class="required">*</span></label>

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

                </div><!-- birthdate -->
                <div class="clearfix"></div>
                <input type="date" class="datepicker form-control input-lg "/>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Zip code <span class="required">*</span></label>
                    <input type="text" class="form-control input-lg" placeholder="e.g. Dee">
                </div>
            </div>

        </div>

    </div>

    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>

</div><!-- container -->