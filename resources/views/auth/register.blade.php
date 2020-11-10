@extends('layouts/auth')
@section('title', 'Daftar')
@section('content')

   <div class="login-register">
      <div class="row mx-0 login">
        <div class="col-md-6 p-5 z-index-1">
          <div class="d-flex mb-3">
            <img src="{{asset('site_/img/home.png')}}" class="icon mr-2">
            <a href="{{route('home')}}" class="text-decoration-none mt-1 active">Home</a>
          </div>
          <h1 class="active mb-3">Register</h1>
          <p class="mb-4">Register for free to the best experience !</p>
           <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
            <div class="col-6">
          <h6 class="active mb-0">First Name</h6>
          <input class="form-control login-input pl-1 mb-3 @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" type="text" aria-label="deafult input example" autocomplete="name"> 
          @error('name')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
         </div>
          <div class="col-6">
          <h6 class="active mb-0">Last Name</h6>
          <input class="form-control login-input pl-1 mb-3 @error('last_name') is-invalid @enderror" value="{{old('name')}}" name="last_name" type="text" aria-label="deafult input example" autocomplete="last_name"> 
          @error('last_name')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
         </div>
       </div>
          <h6 class="active mb-0">E-mail Address</h6>
          <input class="form-control login-input pl-1 mb-3  @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" type="email" aria-label="deafult input example">
          @error('email')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <h6 class="active mb-0">Telephone Number</h6>
          <input class="form-control login-input pl-1 mb-3 @error('no_telpon') is-invalid @enderror" name="no_telpon" value="{{@old('no_telpon')}}"  type="number" aria-label="deafult input example">   
          @error('no_telpon')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror

          <h6 class="active mb-0">Password</h6>
          <input class="form-control login-input pl-1 mb-3 @error('password') is-invalid @enderror" name="password" value="{{@old('password')}}"  type="password" aria-label="deafult input example">   
          @error('password')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror


          <div class="d-flex">
            <a href="{{route('login')}}" class="active text-decoration-none mt-2">Already have an account?</a>
            <button type="submit" class="btn btn-1 ml-auto px-5">Register</button>
          </div>
        </form>
        </div>
        <div class="col-md-6 px-0 md-img">
          <img src="{{asset('site_/img/gambar.png')}}" class="bg-cover">
        </div>
      </div>
    </div>
@endsection
