<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Dreamss menyediakan berbagai macam pilihan hotel pilihan untuk anda" />
    <meta name="keywords" content="Hotel">
    <meta name="author" content="IT Club"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('site_/css/bootstrap.css')}}">
   
    <link rel="stylesheet" type="text/css" href="{{asset('site_/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site_/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('site_/css/reponsif.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('site_/img/logo.png')}}" sizes="16x16 32x32" type="image/png">
    <link rel="stylesheet" type="text/css" href="{{asset('site_/css/DateTimePicker.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('header')
    
   
    <title>@yield('title')</title>
  </head>
  <body>
    @yield('navbar')
    @include('sweetalert::alert')
    @yield('content')

    @include('layouts.site_.footer')

 
  <!-- Optional JavaScript -->
     <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{asset('site_/js/filterdiv.js')}}"></script>
    <script src="https://kit.fontawesome.com/ba24532dda.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal@4"></script>
    <script type="text/javascript" src="{{asset('site_/js/DateTimePicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('site_/js/script.js')}}"></script>
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <script src="{{asset('site_/js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    @yield('footer')
  </body>
</html>