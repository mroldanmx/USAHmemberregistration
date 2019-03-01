<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration Form</title>

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="{{@asset("css/bootstrap.css")}}">
    <link rel="stylesheet" type="text/css" href="{{@asset("css/fontawesome-5.css")}}">

    <link rel="stylesheet" type="text/css" href="{{@asset("css/templates.css")}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="landing-page">


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <img src="{{@asset("img/usa-hockey-logo.png")}}">
        </div>

        <div class="pull-right">

            <a class="icon-with-text hide" href="#"><i class="fas fa-sign-in-alt"></i> Login</a>
            <a class="icon-with-text" href="#"><i class="fas fa-question"></i> FAQ</a>

        </div>

    </div><!-- /.container-fluid -->
</nav><!-- navbar -->

<div id="banner">

    <div class="content">
        <h1>
            <div>2019-2020 <span>Season</span></div>
            Member Registration
            <small>Join as a player, coach, referee or volunteer</small>
        </h1>

        <div class="buttons">
            <a href="{{url('/registration')}}" class="btn btn-primary btn-lg">Register Now</a>
        </div><!-- buttons -->

    </div><!-- title-wrapper -->

    <div id="mobile-image"></div>

    <video src="img/landing-video.mp4" autoplay loop muted>
    </video>

</div><!-- banner -->

<div class="container">

    <section id="welcome" class="row">

        <div class="col-md-12">
            <h2>About USA Hockey</h2>
        </div>

        <div class="col-md-offset-3 col-md-6">
            <p>USA Hockey provides the foundation for the sport of ice hockey in America; helps young people become
                leaders, even Olympic heroes; and connects the game at every level while promoting a lifelong love of
                the sport.</p>
        </div>

    </section>

    <section id="register-now" class="row hide">

        <div class="col-md-12">
            <h2>Introducing Member Login</h2>
        </div>

        <div class="col-md-12">
            <p>Sign in to manage your existing USA Hockey membership</p>
        </div>

        <div class="col-md-12">
            <button class="btn btn-primary btn-lg">Login or Create Account</button>
        </div>

    </section>

    <section id="benefits" class="row">

        <h2>Membership Benefits</h2>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">All
                    <span>Members</span></a></li>
            <li role="presentation"><a href="#adults" aria-controls="adults" role="tab" data-toggle="tab">Adults</a>
            </li>
            <li role="presentation"><a href="#youth" aria-controls="youth" role="tab" data-toggle="tab">Youth</a></li>
            <li role="presentation"><a href="#parents" aria-controls="parents" role="tab" data-toggle="tab">Parents</a>
            </li>
            <li role="presentation"><a href="#officiating" aria-controls="officiating" role="tab" data-toggle="tab">Officiating</a>
            </li>
            <li role="presentation"><a href="#coaching" aria-controls="coaching" role="tab"
                                       data-toggle="tab">Coaching</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="all">

                <div class="col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-3 col-lg-3">
                    <img src="img/benefits.jpg">
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 right-col">

                    <ul class="benefits-list">
                        <li>
                            <h4><i class="fas fa-book-open"></i> Subscription to USA Hockey Magazine</h4>
                            <p>The most widely distributed hockey publication in the world</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-medkit"></i> World-class insurance coverage</h4>
                            <p>To provide peace-of-mind for all involved in the sport</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-flag-usa"></i> Participation in events as Team USA like</h4>
                            <ul>
                                <li>Olympic and Paralympic Winter Games</li>
                                <li>World Championships at all levels</li>
                                <li>Other international events</li>
                            </ul>
                        </li>
                        <li>
                            <h4><i class="fas fa-clipboard-list"></i> Official Playing Rules</h4>
                            <p>To provide consistency for all participants.</p>
                        </li>
                        <li>
                            <h4><i class="far fa-life-ring"></i></i> Comprehensive safety program</h4> including:
                            <ul>
                                <li>Commitment to research and education</li>
                                <li>USA Hockey SafeSport, an initiative dedicated to off-ice safety, which includes an
                                    online education course
                                </li>
                                <li>Commitment to concussion research, awareness and education program</li>
                                <li>Extensive risk management program</li>
                            </ul>
                        </li>
                        <li>
                            <h4><i class="fas fa-hockey-puck"></i></i> Exclusive offers</h4> from:
                            <ul>
                                <li>Professional hockey teams</li>
                                <li>Equipment manufacturers</li>
                                <li>Official partners of USA Hockey</li>
                            </ul>
                        </li>
                    </ul>

                </div>


            </div><!-- all -->
            <div role="tabpanel" class="tab-pane" id="adults">

                <div class="col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-3 col-lg-3">
                    <img src="img/adults.jpg">
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 right-col">

                    <ul class="benefits-list">
                        <li>
                            <h4><i class="fas fa-book-open"></i> Unique playing opportunities</h4>
                            <p>Not available anywhere else, including state championships, classic tournaments, NHL
                                tournaments, and a series of worldrenowned pond hockey championships</p>
                        </li>
                        <li>
                            <h4><i class="fab fa-accessible-icon"></i> Disabled athletes opportunities </h4>
                            <p>Growing opportunities for disabled athletes through six disciplines of disabled
                                hockey</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-skating"></i> Adult equipment program </h4>
                            <p>A First Goal adult equipment program to assist those players just getting started in the
                                game</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-chalkboard-teacher"></i></i> Skills clinics</h4>
                            <p>Access to adult skills clinics for those of all ability levels</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-mobile-alt"></i> Adult Event Tournament App</h4>
                            <p>Exclusive access to USA Hockey Adult Event Tournament App</p>
                        </li>
                    </ul>

                </div>

            </div><!-- adults -->
            <div role="tabpanel" class="tab-pane" id="youth">

                <div class="col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-3 col-lg-3">
                    <img src="img/youth.jpg">
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 right-col">

                    <ul class="benefits-list">
                        <li>
                            <h4><i class="fas fa-child"></i> Age-appropriate learning</h4>
                            <p>Training utilizing The American Development Model which provides age-appropriate learning
                                in a fun environment</p>
                        </li>
                        <li>
                            <h4><i class="fab fa-accessible-icon"></i> Subscription to USA Hockey Magazine</h4>
                            <p>Growing opportunities for disabled athletes through six disciplines of disabled
                                hockey</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-female"></i> female players</h4>
                            <p> A focus on addressing the specific needs of female players</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-trophy"></i> Championship Tournaments</h4>
                            <p>Opportunity to play in District and National Championship Tournaments</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-flag-usa"></i></i> Opportunity to be selected </h4> for:
                            <ul>
                                <li>Regional and National Player Development Camps and Festivals</li>
                                <li>Select Teams</li>
                                <li>National Team Development Program</li>
                            </ul>
                        </li>
                        <li>
                            <h4><i class="fas fa-user-graduate"></i> Junior Program</h4>
                            <p>An extensive Junior Program for players to develop in preparation for the collegiate and
                                professional ranks</p>
                        </li>
                    </ul>
                </div>

            </div><!-- youth -->
            <div role="tabpanel" class="tab-pane" id="parents">

                <div class="col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-3 col-lg-3">
                    <img src="img/parents.jpg">
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 right-col">

                    <ul class="benefits-list">
                        <li>
                            <h4><i class="far fa-life-ring"></i> Secure enviroment</h4>
                            <p>Peace of mind, knowing your child is part of a national organization which</p>
                            <ul>
                                <li>Has safety as its top priority with cuttingedge programs for both on and off-ice
                                    safety
                                </li>
                                <li>Requires background screening and completed SafeSport training for all adults with
                                    access to youth players
                                </li>
                                <li>All coaches are certified and have taken educational modules pertinent to the age of
                                    players they’re coaching
                                </li>
                                <li>All officials are certified to ensure appropriate knowledge of rules and
                                    understanding of USA Hockey’s focus on the standard of play
                                </li>
                                <li>Includes a world-class insurance program to provide assistance if the need arises
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>

            </div><!-- parents -->
            <div role="tabpanel" class="tab-pane" id="officiating">

                <div class="col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-3 col-lg-3">
                    <img src="img/officiating.jpg">
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 right-col">

                    <ul class="benefits-list">
                        <li>
                            <h4><i class="fas fa-chalkboard-teacher"></i> Training, clinics and certification</h4>
                            <p>Instructional training, clinics and certification to help ensure a consistent standard
                                across the country</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-mobile-alt"></i> Mobile Rulebook App</h4>
                            <p>Exclusive access to USA Hockey Mobile Rulebook App</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-chart-bar"></i> Game Report System</h4>
                            <p>Access to the USA Hockey online Game Report System</p>
                        </li>

                    </ul>

                </div>

            </div><!-- officiating -->
            <div role="tabpanel" class="tab-pane" id="coaching">

                <div class="col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-3 col-lg-3">
                    <img src="img/coaching.jpg">
                </div>

                <div class="col-sm-6 col-md-6 col-lg-4 right-col">

                    <ul class="benefits-list">
                        <li>
                            <h4><i class="fas fa-clipboard-check"></i> Most current material</h4>
                            <p>State-of-the-art, gold-standard education program to ensure coaches have the most current
                                material to assist players in reaching their full potential</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-mobile-alt"></i> Mobile Coach App</h4>
                            <p>Exclusive access to USA Hockey Mobile Coach App that provides cutting-edge resources for
                                coaches on smartphones and tablets</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-users"></i> Specific to the age</h4>
                            <p>Online educational modules specific to the age level of players you are coaching</p>
                        </li>
                        <li>
                            <h4><i class="fas fa-list-ul"></i> Age-specific practice plans</h4>
                            <p>and other numerous coaching resources</p>
                        </li>
                    </ul>

                </div>

            </div><!-- coaching -->

        </div>


    </section>

</div><!-- container -->

<footer>

    <div class="info-bar">
        <div><img class="usa-hokey-logo" src="img/usa-hockey-logo.png"></div>

        <h3>Contact us</h3>

        <a class="icon-with-text" href="tel:1-800-566-3288">
            <i class="fas fa-phone"></i>
            <span>1-800-566-3288 ext. 123</span>
        </a>

        <a class="icon-with-text" href="mailto:memberservices@usahockey.org">
            <i class="fas fa-envelope"></i>
            <span>memberservices@usahockey.org</span>
        </a>

        <a class="icon-with-text" href="">
            <i class="fas fa-question"></i>
            <span>FAQ</span>
        </a>

        <h3>Follow us</h3>
        <ul class="social-media">
            <li><i class="fab fa-facebook-f"></i></li>
            <li><i class="fab fa-twitter"></i></li>
            <li><i class="fab fa-instagram"></i></li>
            <li><i class="fab fa-youtube"></i></li>
            <li><i class="fas fa-shopping-cart"></i></li>
        </ul>

    </div><!-- info -->

    <div class="rights-bar">
        <span>©{{date('Y')}} USA Hockey All Rights Reserved.</span>
        <span><a>Terms of Use</a> <a>Privacy Policy Login</a></span>
    </div>

</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script> -->
<script src="js/jquery.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script> -->
<script src="js/bootstrap.js"></script>

<script type="text/javaScript">

    $(window).on('scroll', function () {
        if ($(window).scrollTop())
            $('nav').addClass('sticky');
        else
            $('nav').removeClass('sticky');
    });

    $('#someTab').tab('show')

</script>

</body>
</html>