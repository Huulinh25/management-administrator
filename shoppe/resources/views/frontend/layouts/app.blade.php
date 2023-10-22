<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
    
</body>
</html>