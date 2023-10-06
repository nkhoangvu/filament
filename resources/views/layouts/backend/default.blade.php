<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title> @yield('pageTitle') | {{ config('app.name') }}</title>
         
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/plugins/adminlte/css/adminlte.min.css">   
    <link rel="stylesheet" href="/assets/plugins/datatables/css/data-table.css">
    <link rel="stylesheet" href="/assets/css/docs.css">
    <link rel="stylesheet" href="/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/assets/plugins/tom-select/tom-select.bootstrap4.min.css">    
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <x-backend.layout-navbar />
        <x-backend.layout-sidebar />

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @yield('content') 

        </div><!-- /.content-wrapper -->
        
    </div><!-- /.wrapper -->

    <x-backend.layout-footer />

    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>  
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>  
    <!-- jQuery UI 1.11.4 -->
    <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/adminlte/js/adminlte.min.js"></script>
    <script src="/assets/plugins/tom-select/tom-select.complete.js"></script>
    <script src="/assets/plugins/jszip/jszip.min.js"></script>
    <!-- daterangepicker -->
    <script src="/assets/plugins/moment/moment-with-locales.js"></script>
    <!--
    <script src="/assets/plugins/daterangepicker/daterangepicker.js"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- PDFMake -->
    <script src="/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/assets/plugins/pdfmake/vfs_fonts.js"></script>
    @yield('script')
    
    </body>
</html>

