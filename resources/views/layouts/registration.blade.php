<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration Form</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
          integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset("css/fontawesome-5.css")}}">

    <link rel="stylesheet" type="text/css" href="{{ asset("css/templates.css")}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id=registrationForm>


<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="{{ asset("img/usa-hockey-logo.png")}}">
        </div>

        <h1>
            {{date('Y')}}-{{date('Y')+1}}
            <small>Season Registration</small>
        </h1>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Questions</a></li>
                <li><a href="#">Support</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav><!-- navbar -->

<div id="steps-bar">

    <div class="steps-container">

        <div class="step active">
            <label class="number">STEP 1</label>
            <i class="fas fa-user"></i>
            <label class="name">Register</label>
        </div><!-- step -->

        <div class="step-bar active">
            <div class="step-progress p-{{$order + 1}}"></div>
        </div><!-- step-bar -->

        <div class="step">
            <label class="number">STEP 2</label>
            <i class="fas fa-check"></i>
            <label class="name">Verify</label>
        </div><!-- step -->

        <div class="step-bar">
            <div class="step-progress"></div>
        </div><!-- step-bar -->

        <div class="step">
            <label class="number">STEP 3</label>
            <i class="fas fa-dollar-sign"></i>
            <label class="name">Payment</label>
        </div><!-- step -->

        <div class="step-bar">
            <div class="step-progress"></div>
        </div><!-- step-bar -->

        <div class="step last">
            <label class="number">STEP 4</label>
            <i class="fas fa-shopping-cart"></i>
            <label class="name">Checkout</label>
        </div><!-- step -->

    </div><!-- steps-container -->

</div><!-- steps-bar -->

<div id="form-container" class="container">

    @yield('content')

</div><!-- container -->

@include('landing_footer')


<script src="{{ URL::asset('js/register.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
<script src="https://rawgit.com/lopezton/jquery-creditcard-formatter/master/ccFormat.js"></script>
<script>
    var phones = [{"mask": "(###) ###-####"}, {"mask": "(###) ###-####"}];
    $(function () {
        $('.phone-fm').inputmask({
            mask: phones,
            greedy: false,
            definitions: {'#': {validator: "[0-9]", cardinality: 1}}
        });
    });

    const wip = (callback=null)=>{
        alert('Work in progress');

        if (callback) {
            callback();
        }
    }
</script>
</body>
</html>