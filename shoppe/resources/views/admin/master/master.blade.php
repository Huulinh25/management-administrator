<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/assets/images/favicon.png')}}">

    <title>Shoppe admin</title>

    <!-- Custom CSS -->
    
    <link href="{{asset('admin/assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">

    <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">


</head>

<body>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">

        @include('admin.master.header')
        @include('admin.master.left-sidebar')
        <div class="page-wrapper">
            @yield('content')
            @include('admin.master.footer')

        </div>

    </div>
    
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