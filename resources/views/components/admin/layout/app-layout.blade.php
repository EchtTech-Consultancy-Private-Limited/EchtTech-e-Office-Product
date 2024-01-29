<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ECHT TECH Consultancy Services Pvt Ltd">
    <link rel="icon" href="{{ asset('assets/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/assets/images/favicon.png') }}" type="image/x-icon">
    <title>{{ $title ? $title : config('app.name', 'Laravel') }}</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/animate.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/assets//css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/assets/css/responsive.css') }}">

</head>
<body onload="startTime()">
<!-- loader starts-->
{{--<div class="loader-wrapper">
    <div class="loader-index"> <span></span></div>
    <svg>
        <defs></defs>
        <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
    </svg>
</div>--}}
<!-- loader ends-->

<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->

<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <x-admin.include.header/>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
       <x-admin.include.side-bar/>
        <!-- Page Sidebar Ends-->

        <div class="page-body">
            {{ $slot }}
        </div>
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2024 © eOffice by EchtTech  </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- latest jquery-->
<script src="{{ asset('assets/assets/js/jquery.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('assets/assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script src="{{ asset('assets/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('assets/assets/js/sidebar-pin.js') }}"></script>
<script src="{{ asset('assets/assets/js/clock.js') }}"></script>
<script src="{{ asset('assets/assets/js/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/slick/slick.js') }}"></script>
<script src="{{ asset('assets/assets/js/header-slick.js') }}"></script>
<script src="{{ asset('assets/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/assets/js/chart/apex-chart/moment.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/assets/js/dashboard/default.js') }}"></script>
<script src="{{ asset('assets/assets/js/notify/index.js') }}"></script>
<script src="{{ asset('assets/assets/js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/assets/js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/assets/js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('assets/assets/js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('assets/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('assets/assets/js/height-equal.js') }}"></script>
<script src="{{ asset('assets/assets/js/animation/wow/wow.min.js') }}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/assets/js/script.js') }}"></script>

<script>new WOW().init();</script>
</body>
</html>
