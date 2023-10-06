<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">  
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

@if(isset($data))
{!! seo($data ?? null) !!}    
@else
{!! seo($SEOData) !!}    
@endif
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicons -->
<link href="/favicon.ico" rel="icon">
<link href="/favicon.png" rel="apple-touch-icon">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
   
<!-- Vendor CSS Files -->
<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">
<link rel="stylesheet" href="/assets/vendor/aos/aos.css">
<link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">   
<link rel="stylesheet" href="/assets/vendor/glightbox/css/glightbox.min.css">
<link rel="stylesheet" href="/assets/vendor/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">

<!-- Template Main CSS File -->
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/custom.css">
<link rel="stylesheet" href="/assets/css/text-effect.css">
      
</head>

<body>
    <x-frontend.layout-header />
    
    <!-- Main Content --> 
    <main id="main">
    @yield('content')
    </main>        

    <!-- Footer -->
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

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    @includeif('scripts.frontend.gtag')
    @includeif('scripts.frontend.protect')
    @yield('script')

</body>
</html>

