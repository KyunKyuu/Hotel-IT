<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    @yield('header')
    <link rel="stylesheet" href="{{asset('site/style.css')}}">
    <link href="{{asset('dashboard/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
        @include('layouts.site.navbar')

        @yield('content')

       @include('layouts.site.footer')

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
   @yield('footer')
    <script src="{{asset('site/js/jquery.min.js')}}"></script>
    <!-- Popper -->
    <script src="{{asset('site/js/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
    <!-- All Plugins -->
    <script src="{{asset('site/js/roberto.bundle.js')}}"></script>
    <!-- Active -->
    <script src="{{asset('site/js/default-assets/active.js')}}"></script>
</body>

</html>