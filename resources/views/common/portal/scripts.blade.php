<!-- jQuery 3 -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('js/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('js/fastclick.js') }}"></script>
@stack('scripts')
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        @stack('docready')
    })
</script>