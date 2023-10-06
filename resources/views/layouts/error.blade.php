<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="@yield('pageDescription')">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>@yield('pageTitle') | {{ config('app.name') }}</title>
        
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/assets/vendor/fontawesome/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/assets/plugins/adminlte/css/adminlte.min.css">
        <link rel="stylesheet" href="/assets/css/error.css">
        
    </head>
    <body class="antialiased">
        
            @yield('content')
        
    </body>
</html>
