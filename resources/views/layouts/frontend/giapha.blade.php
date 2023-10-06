<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">    
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

{!! seo($SEOData) !!}    
<meta name="csrf-token" content="{{ csrf_token() }}">
    
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">        
<!-- Font Awesome -->
<link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">  
<!-- JQuery TreeView -->
<link rel="stylesheet" href="/assets/plugins/jquery-treeview/jquery.treeview.css" />     
<!-- dataTable -->
<link rel="stylesheet" href="/assets/plugins/datatables/css/jquery.dataTables.min.css">    
<!-- Bootstrap 5 -->
<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">                   
<!-- Template Main CSS File -->
<link href="/assets/css/style.css" rel="stylesheet">
<link href="/assets/css/custom.css" rel="stylesheet">
<link href="/assets/css/text-effect.css" rel="stylesheet">

</head>

<body>
    
<x-frontend.layout-header />


<!-- Main Content --> 
<main id="main">
    @yield('content')
</main>           
    
<x-frontend.layout-footer />
    
<div id="preloader"></div>
    
<a href="#" class="back-to-top d-flex align-items-center justify-content-center" aria-label="Roll-up">
    <i class="fa-solid fa-angles-up"></i>
</a>

<!-- Vendor JS Files -->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>  
<script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/assets/plugins/jquery-treeview/jquery.treeview.min.js"></script>        
<script src="/assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="/assets/plugins/datatables/js/dataTables.scroller.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/assets/plugins/moment/moment-with-locales.js"></script>
<script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>
@includeif('scripts.frontend.gtag')
@includeif('scripts.frontend.protect')
@yield('script')

</body>
</html>

