<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Mremot - HTML 5 Template Preview</title>

<!-- Fav Icon -->
<!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Mrs+Saint+Delafield&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<!-- Stylesheets -->
<link href="{{ url('salon/assets/css/font-awesome-all.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/flaticon.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/owl.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/animate.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/nice-select.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/imagebg.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/color.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ url('salon/assets/css/responsive.css') }}" rel="stylesheet">

</head>

<!-- page wrapper -->
<body>
    <div class="boxed_wrapper">
        <!-- navigation -->
        @include('salon.components.navigation')
        <!-- navigation end -->

        <!-- Mobile Menu  -->
        @include('salon.components.mobile_menu')
        <!-- End Mobile Menu -->

        @yield('content')

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-arrow-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{ url('salon/assets/js/jquery.js') }}"></script>
    <script src="{{ url('salon/assets/js/popper.min.js') }}"></script>
    <script src="{{ url('salon/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('salon/assets/js/owl.js') }}"></script>
    <script src="{{ url('salon/assets/js/wow.js') }}"></script>
    <script src="{{ url('salon/assets/js/validation.js') }}"></script>
    <script src="{{ url('salon/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ url('salon/assets/js/appear.js') }}"></script>
    <script src="{{ url('salon/assets/js/scrollbar.js') }}"></script>
    <script src="{{ url('salon/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('salon/assets/js/circle-progress.js') }}"></script>
    <script src="{{ url('salon/assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ url('salon/assets/js/bxslider.js') }}"></script>
    <script src="{{ url('salon/assets/js/pagenav.js') }}"></script>

    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ url('salon/assets/js/gmaps.js') }}"></script>
    <script src="{{ url('salon/assets/js/map-helper.js') }}"></script>

    <!-- main-js -->
    <script src="{{ url('salon/assets/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->
</html>
