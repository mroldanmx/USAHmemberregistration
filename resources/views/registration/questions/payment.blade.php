@php
    $member = $reg->member;
    $address = $member->address;
    $billingFees = \App\Models\SystemPreferences::get('billing')
@endphp

<script>
    const address = @json($address);
</script>
<div id="payment" class="question-wrapper container medium">

    <div class="row question-icon">
        <i class="far fa-credit-card"></i>
        <h2>Payment Information</h2>
        <p>Enter your billing information to complete registration</p>
    </div>

    <div class="row">

        <div class="col-md-5">

            <div class="block-container">

                <h3>Bill Information</h3>

                @foreach($billingFees as $billingFee)
                    @php
                        switch($billingFee->keyword){
                            case "USA Hockey":
                            $amount = $cart->usah_total_cost();
                            break;
                            case "Affiliate":
                            $amount = $cart->affiliate_total_cost();
                            break;
                            default:
                            $amount = $cart->donation_total_cost();
                            break;
                        }
                    @endphp
                    <p>{{$billingFee->keyword}}
                        <i class="fas fa-info-circle" data-toggle="tooltip" data-trigger="click"
                             data-placement="top" title="{{$billingFee->value}}"></i> <span
                        class="pull-right">${{$amount}}</span></p>
                @endforeach
                <hr>

                <p><b>Sub total</b> <span class="pull-right">${{$cart->subtotal()}}</span></p>

                <hr>

                <p><b>Grand Total</b> <span class="pull-right red">${{$cart->total()}}</span></p>


            </div><!-- block-container -->

        </div>

        <div class="col-md-7">

            <h3 class="text-left" style="margin-top: 0">Card Information</h3>

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name on Card <span class="required">*</span></label>
                        <input type="text" class="form-control input-lg" placeholder="e.g. John Ricado">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Card Number <span class="required">*</span></label>
                        <input type="number" class="form-control input-lg" placeholder="e.g. 1234 5678 9012 3456">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label>Expiration Date <span class="required">*</span></label>
                        <input type="text" class="form-control input-lg" placeholder="Month">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-4">
                    <div class="form-group">
                        <label></label>
                        <input type="text" class="form-control input-lg" placeholder="Year">
                    </div>
                </div>

                <div class="col-xs-6 col-sm-offset-1 col-sm-3 col-md-offset-1 col-md-3">
                    <div class="form-group">
                        <label>CVV/CVC <span class="required">*</span></label>
                        <input type="text" class="form-control input-lg" placeholder="e.g. 123">
                    </div>
                </div>

            </div>


            <h3 class="text-left">Billing Address</h3>

            <div class="row">

                <div class="col-md-12 text-left">
                    <div class="object checkbox" style="margin-bottom: 25px">
                        <label>
                            <input class="use-same-address" value="1" type="checkbox"> <span class="checkmark"></span> Use the same as registration
                        </label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address <span class="required">*</span></label>
                        <input id="line_1" type="text" class="form-control input-lg" placeholder="e.g. 580 Whiff Oaf Lane">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">City <span class="required">*</span></label>
                        <input id="city" type="text" class="form-control input-lg" placeholder="e.g. Orlando">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">State <span class="required">*</span></label>
                        <input id="state" type="text" class="form-control input-lg" placeholder="e.g. Florida">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Country <span class="required">*</span></label>
                        <select id="country" class="form-control input-lg" placeholder="e.g. USA">
                            <option>e.g. United States</option>
                            <option>United States</option>
                            <option>Canada</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Zip Code <span class="required">*</span></label>
                        <input type="text" id="zip" class="form-control input-lg js-zipcode" placeholder="e.g. Zip Code">
                    </div>
                </div>

            </div>

            <h3 class="text-left">Confirm</h3>

            <div class="row">
                <div class="col-md-12">
                    <p>By Submiting this information you agree to the terms of the USA Hockey privacy Statement which
                        can be reviewed here.</p>
                    <p>If you do not agree the terms, Please click on Cancel bellow</p>
                </div>

                <div class="col-md-12 text-left">
                    <div class="object checkbox">
                        <label>
                            <input type="checkbox"><span class="checkmark"></span> I understand that USA Hockey has a NO
                            REFUND Policy <span class="required">*</span>
                        </label>
                    </div>
                </div>

            </div>


        </div>

    </div>


    <div class="row">

        <a href="{{url('register/prevQuestion')}}" class="btn btn-link js-go-back">Previous</a>
        <input type="submit" class="btn btn-primary" value="Next">

    </div>

</div><!-- container -->