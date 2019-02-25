<div id="confirmation" class=" medium">

    <div class="row question-icon">
        <i class="fas fa-shopping-cart"></i>
        <h2>Payment Receipt</h2>
        <p>You have accomplished the 2019-2020 registration successfully</p>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="block-container">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Registration</label>
                            <div class="data">May 25, 1985</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirmation Number</label>
                            <div class="data">182500938HORNK</div>
                        </div>
                    </div>

                </div>

            </div><!-- block-container -->
        </div>

        <div class="col-md-12">
            <div class="block-container">

                <div class="row">
                    <div class="col-md-6">
                        <h3>Member Details</h3>
                    </div>

                    <div class="col-md-6">
                        <h3>Total Pay Amount</h3>
                    </div>
                </div><!-- header -->

                @foreach($cart->registrations as $registration)
                <div class="row person">
                    <div class="col-md-6">

                        <div class="row white-row">

                            <div class="col-md-12">
                                <h3>Member Details</h3>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Legal Name</label>
                                    <div class="data">{{$registration->member->fullName}}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="data">{{$registration->member->friendlyDob}}</div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Type</label>
                                    <div class="data">{{$registration->memberType->type}}</div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Affilliate</label>
                                    <div class="data">Statewide Amateur Hockey Association of Florida</div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="row white-row">

                            <div class="col-md-12">
                                <h3>Total Pay Amount</h3>
                            </div>

                            <p class="col-md-12">USA Hockey <span class="pull-right">${{$registration->usah_cost}}</span></p>

                            <p class="col-md-12">Affiliate <span class="pull-right">${{$registration->affiliate_cost}}</span></p>

                            <p class="col-md-12">USA Hockey Foundation <span class="pull-right">${{$registration->donation_cost}}</span></p>
                            <p class="col-md-12">
                                <b>Subtotal</b> <span class="pull-right">${{$registration->subtotal()}}</span></p>

                        </div><!-- white-row -->

                    </div>
                </div> <!-- person -->
                @endforeach
                <div id="gran-total" class="row">

                    <div class="col-md-6 col-md-offset-6">
                        <p><b>Gran Total</b> <span class="pull-right red">${{$cart->total()}}</span></p>
                    </div>

                </div>


            </div><!-- block-container -->
        </div>

        <div class="col-md-12">
            <div class="block-container">

                <p><b>This confirms that you have paid you 2014-15 USA Hockey & Affillate fee (if applicable)</b></p>

                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean
                    massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

                <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut,
                    imperdiet a, venenatis vitae, justo.</p>

                <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

            </div><!-- block-container -->
        </div>

    </div>

    <div class="row">

        <div class="col-xs-4 col-sm-offset-3 col-sm-2 col-md-offset-3 col-md-2">
            <button onclick="window.print()" class="btn btn-link vertical-icon"><i class="fas fa-print"></i>Print</button>
        </div>
        <div class="col-xs-4 col-sm-2 col-md-2">
            <button  class="btn btn-link vertical-icon"><i class="fas fa-share-square"></i>Share</button>
        </div>
        <div class="col-xs-4 col-sm-2 col-md-2">
            <button class="btn btn-link vertical-icon"><i class="fas fa-file-download"></i>Download</button>
        </div>
    </div>

    <div class="row">

        <input type="submit" class="btn btn-primary">Continue to Login</input>

    </div>


</div><!-- container -->