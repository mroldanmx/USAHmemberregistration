<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('common.portal.head')

<body class="hold-transition skin-purple sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('common.portal.header')

        @include('common.portal.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('content-header')

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('common.portal.footer')
    </div>
    <!-- ./wrapper -->
    @include('common.portal.scripts')
</body>
</html>
