<footer>

    <div class="info-bar">
        <div><img class="usa-hokey-logo" src="{{@asset("img/usa-hockey-logo.png")}}"></div>

        <h3>Follow us</h3>
        <ul class="social-media">
            <li><i class="fab fa-facebook-f"></i></li>
            <li><i class="fab fa-twitter"></i></li>
            <li><i class="fab fa-instagram"></i></li>
            <li><i class="fab fa-youtube"></i></li>
            <li><i class="fas fa-shopping-cart"></i></li>
        </ul>

        <div class="contact">

            <h3>Contact us</h3>

            <div class="item">
                <i class="fas fa-phone"></i>
                <a href="tel:{{config('constants.contact.tel.number')}}">{{config('constants.contact.tel.label')}}</a>
            </div>

            <div class="item">
                <i class="fas fa-envelope"></i>
                <a href="mailto:{{config('constants.contact.email')}}">{{config('constants.contact.email')}}</a>
            </div>
        </div>

    </div><!-- info -->

    <div class="rights-bar">
        <span>©{{date('Y')}} USA Hockey All Rights Reserved.</span>
        <span><a>Terms of Use</a> <a>Privacy Policy Login</a></span>
    </div>

</footer>