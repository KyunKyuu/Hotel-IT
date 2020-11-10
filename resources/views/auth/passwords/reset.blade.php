@extends('layouts/auth')
@section('title', 'Login Page')
@section('content')

    <div class="login-register">
      <div class="row mx-0 login">
        <div class="col-md-6 p-5 z-index-1">
          <div class="d-flex mb-5">
            <img src="{{asset('site_/img/home.png')}}" class="icon mr-2">
            <a href="{{route('home')}}" class="text-decoration-none mt-1 active">Home</a>
          </div>
          <h1 class="active mb-4">Login</h1>
          <p class="mb-4">Hi there, welcome back !</p>
          <form method="POST" action="{{ route('password.update') }}">
          @csrf

          <h6 class="active mb-0">E-mail Address</h6>
          <input class="form-control login-input pl-1 mb-3 @error('email') is-invalid @enderror" value="{{old('email')}}" type="email" name="email" aria-label="deafult input example">
          @error('email')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror  

          <h6 class="active mb-0">Password</h6>
          <input class="form-control login-input pl-1 mb-3 @error('password') is-invalid @enderror" name="password" type="password" aria-label="deafult input example">  
          @error('password')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror

           <h6 class="active mb-0">Password</h6>
          <input class="form-control login-input pl-1 mb-3 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" type="password" aria-label="deafult input example">  
          @error('password_confirmation')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          

          <div class="d-flex">
            
            <button class="btn btn-1 ml-auto px-5" type="submit">Reset Passowrd</button>
          </div>
        </div>
        <div class="col-md-6 px-0 md-img">
          <img src="{{asset('site_/img/gambar.png')}}" class="bg-cover">
        </div>
      </form>
      </div>
    </div>
@endsection

 