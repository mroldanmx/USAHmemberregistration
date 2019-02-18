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
                <input type="text" class="form-control input-lg" placeholder="e.g. John">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>LEGAL Last Name <span class="required">*</span></label>
                <input type="text" class="form-control input-lg" placeholder="e.g. Dee">
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">

            <label class="label-row">Birthdate <span class="required">*</span></label>

            <div class="birthdate">

                <div class="form-group">
                    <select name="dob-day" class="form-control input-lg" placeholder="MM">
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
                    <select name="dob-month" class="form-control input-lg" placeholder="MM">
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
                    <select name="dob-year" class="form-control input-lg" placeholder="MM">
                        @for($year = date('Y',strtotime('-100 year'));$year <= date('Y'); $year++)
                            <option value="{{$year}}">{{$year}}</option>
                        @endfor
                    </select>
                </div>

            </div><!-- birthdate -->

        </div>

        <div class="col-md-6" style="text-align: left;">

            <div class="horizontal-radio-group">
                <label>Gender <span class="required">*</span></label>
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

    <div class="row">

        <div class="col-md-12" style="text-align: left;">

            <div class="horizontal-radio-group">
                <label>Citizenship <span class="required">*</span></label>
                <label class="object radio">USA
                    <input type="radio" name="citizenship">
                    <span class="checkmark"></span>
                </label>
                <label class="object radio">Canada
                    <input type="radio" name="citizenship">
                    <span class="checkmark"></span>
                </label>
                <label class="object radio">Other
                    <input type="radio" name="citizenship">
                    <span class="checkmark"></span>
                </label>
            </div><!-- horizontal-radio-group -->

        </div>

    </div>


</div><!-- container -->