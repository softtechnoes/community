<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Community - App | @yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/plugins/images/favicon.png') }}">
    <link href="{{ asset('/plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    {{-- <link href="https://ampleadmin.wrappixel.com/assets/libs/morris.js/morris.css" rel="stylesheet">
    <link href="https://ampleadmin.wrappixel.com/assets/extra-libs/c3/c3.min.css" rel="stylesheet"> --}}
    <link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bidasar.css') }}">
    {{-- new admin header --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/newheader/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('/newheader/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/newheader/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/newheader/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/newheader/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/newheader/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/newheader/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/newheader/plugins/summernote/summernote-bs4.min.css') }}">
    {{-- end admin header --}}
    <script src="{{ asset('/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/plugins/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('/js/tinymce/mytin.js')}}"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        @include('admin.include.header')
        
        @include('admin.include.sidebar')

        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="page-wrapper">
                        <div class="page-content">
                            @yield('content')
                        </div>
                        <div class="footer-sec">
                            @include('admin.include.footer')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/js/waves.js') }}"></script>
    <script src="{{ asset('/js/sidebarmenu.js') }}"></script>
   
    {{-- start header menu --}}
    <script src="{{ asset('/newheader/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('/newheader/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('/newheader/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('/newheader/dist/js/demo.js') }}"></script>
    <script src="{{ asset('/newheader/dist/js/pages/dashboard.js') }}"></script>
    {{-- end header menu --}}
    <script src="{{ asset('/js/custom.js') }}"></script>
    <script src="{{ asset('/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('/js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('/js/community.js') }}"></script>
   

</body>
</html>
