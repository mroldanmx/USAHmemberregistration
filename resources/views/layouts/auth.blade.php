<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('common.auth.head')

<body class="hold-transition login-page">
    <!-- Site wrapper -->
    <div class="login-box">
        @include('common.auth.left_column')

        <!-- Content Wrapper. Contains page content -->
        <div class="right-column">
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
    </div>
    <!-- ./wrapper -->
    @include('common.portal.scripts')
</body>
</html>
