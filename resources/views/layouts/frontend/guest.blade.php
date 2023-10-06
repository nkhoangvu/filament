<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-WFPENNMC4Y"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-WFPENNMC4Y');
        </script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="@yield('pageDescription')">
        <meta name="author" content="@yield('pageAuthor')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Gia phả Họ Nguyễn Khoa') }} - @yield('pageTitle')</title>
        
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style --> 
        
        <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="/assets/plugins/DataTables/css/data-table.css">
        <link rel="stylesheet" href="/assets/css/docs.css">
        <link rel="stylesheet" href="/assets/css/highlighter.css">
        <link rel="stylesheet" href="/assets/css/style.css">
        <!-- TreeView -->
        <link rel="stylesheet" href="/assets/plugins/jquery-treeview/jquery.treeview.css" /> 
            
        <!-- Scripts -->
        <script src="{{ asset('assets/plugins/jquery/jquery.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
        <script src="{{ asset('assets/plugins/jquery-treeview/jquery.treeview.js') }}"></script>    
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/js/dataTables.scroller.js') }}"></script>
        <script src="https://kit.fontawesome.com/67f61bd343.js" crossorigin="anonymous"></script>
        <script src="/assets/plugins/moment/moment-with-locales.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> 
        <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">  
        
        <script type="text/javascript" src="/assets/js/jquery-waypoints/jquery.waypoints.min.js" id="waypoints-js"></script>   
        <script type="text/javascript" src="/assets/js/share.js" id="share-js"></script>
    </head>
    <body class="start" style="top: 0px; position: static;">
        <!-- Header / Menu -->
        @includeif('frontend.partials.header')
        
        <!-- Main Content -->
        @yield('content')
        
        <!-- Footer -->
        @includeif('frontend.partials.footer1')
        
        @yield('script')

    </body>
</html>

