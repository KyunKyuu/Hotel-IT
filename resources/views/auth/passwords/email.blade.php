@extends('layouts/auth')
@section('title', 'Reset Password')
@section('content')
<div class="login-register">
      <div class="row mx-0 login">
        <div class="col-md-6 p-5 z-index-1">
          <div class="d-flex mb-5">
            <img src="{{asset('site_/img/home.png')}}" class="icon mr-2">
            <a href="{{route('home')}}" class="text-decoration-none mt-1 active">Home</a>
          </div>
          <h1 class="active mb-4">Reset Password</h1>
         
            <form method="POST" action="{{ route('password.email') }}">
             @csrf
            
          <h6 class="active mb-0">E-mail Address</h6>
          <input class="form-control login-input pl-1 mb-3  @error('email') is-invalid @enderror" value="{{old('email')}}" type="email" autocomplete="off"  name="email" aria-label="deafult input example">  
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
             @enderror

        
          <div class="d-flex">
            <a href="{{route('login')}}" class="active text-decoration-none mt-2">Login</a>
            <button class="btn btn-1 ml-auto px-5" type="submit">Send Password Reset Link</button>
          </div>
        </div>
        <div class="col-md-6 px-0 md-img">
          <img src="{{asset('site_/img/gambar.png')}}" class="bg-cover">
        </div>
      </form>
      </div>
    </div>
@endsection