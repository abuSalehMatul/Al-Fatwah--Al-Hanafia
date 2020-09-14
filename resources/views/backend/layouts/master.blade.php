<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AlFatwah') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin_asset/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{asset('admin_asset/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('admin_asset/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('admin_asset/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('admin_asset/css/colors/default.css')}}" id="theme" rel="stylesheet">
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
        <style> 
        .space-position{
            position: relative;
            top: 20px;
            margin: 10px;
        }
        </style>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="app_backend">
        <div id="wrapper">
            @include('backend.layouts.topbar')
           
            @include('backend.layouts.sidebar')
           
            <div id="page-wrapper">
                @yield('content')
                <!-- /.container-fluid -->
                <footer class="footer text-center"> Developed By ASMatul.. All rights Reserved By Al-Fatwa </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Page Content -->
            <!-- ============================================================== -->
        </div>
    </div>
    
    <!-- /#wrapper -->
    <script src="{{ asset('js/appBackend.js') }}"></script>
    <!-- jQuery -->
    {{-- <script src="{{asset('admin_asset/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script> --}}
    <!-- Bootstrap Core JavaScript -->
    {{-- <script src="{{asset('admin_asset/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
    <!-- Menu Plugin JavaScript -->
    <script src="{{asset('admin_asset/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    {{-- <script src="{{asset('admin_asset/js/jquery.slimscroll.js')}}"></script> --}}
    <!--Wave Effects -->
    {{-- <script src="{{asset('admin_asset/js/waves.js')}}"></script> --}}
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('admin_asset/js/custom.min.js')}}"></script>
    @yield('js')
</body>

</html>