@extends('layouts.site_/main')

@section('title', 'Verify Email')

@section('navbar')
@include('layouts.site_.navbar3')
@endsection

@section('content')
    <div class="container text-center mt-5 pt-5">
          <div class="jumbotron rounded verify w-50 mx-auto px-5 pt-5 pb-4">
            <h1 class="display-2"><i class="fas fa-envelope active mt-1"></i></h1>
            <h4 class="w-900">Verify your E-mail address</h4>
            <h5 class="text-black-50 mb-3">Before processing, please check your email for a verification link</h5>
            <p class="text-black-50 mt-5">if you did not receive the email</p> 
             <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
             @csrf
             <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
            </form>
          </div>
        </div>
@endsection


 