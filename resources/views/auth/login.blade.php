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
           <form method="POST" action="{{ route('login')}}">
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

          <input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="text-decoration-none active ml-auto mb-3" />
          <label for="remember" class="text-decoration-none active ml-auto mb-3"><span><span></span></span>Remember me</label>

          <div class="d-flex">
            <a class="text-decoration-none active ml-auto mb-3" href="{{ route('password.request') }}">Forgot Your Password?</a>
          </div> 
          <div class="d-flex">
            <a href="{{route('register')}}" class="active text-decoration-none mt-2">Have No Account? Register</a>
            <button class="btn btn-1 ml-auto px-5" type="submit">Login</button>
          </div>
        </div>
        <div class="col-md-6 px-0 md-img">
          <img src="{{asset('site_/img/gambar.png')}}" class="bg-cover">
        </div>
      </form>
      </div>
    </div>
@endsection

 