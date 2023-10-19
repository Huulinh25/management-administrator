<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <link href="{{asset('admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">

    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
</head>
<body>
    @include('frontend.layouts.header')

    @yield('content')
    @include('frontend.layouts.footer')

    <script type="text/javascript" src="{{asset('frontend/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/price-range.js') }}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/main.js') }}"></script>
    


    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>

    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>

    <!--Wave Effects -->
    <script src="{{ asset('admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <script src="{{ asset('admin/dist/js/waves.js')}}"></script>

    <!--Menu sidebar -->
    <script src="{{ asset('admin/dist/js/sidebarmenu.js')}}"></script>

    <!--Custom JavaScript -->
    <script src="{{ asset('admin/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="{{asset('admin/assets/libs/chartist/dist/chartist.min.js')}}"></script>

    <!-- <script src="{{ asset('admin/')}}"></script> -->

    <script src="{{asset('admin/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>

    <script src="{{ asset('admin/dist/js/pages/dashboards/dashboard1.js')}}"></script>
    <!-- <script src="/shoppe/public/admin/dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
</body>
</html>