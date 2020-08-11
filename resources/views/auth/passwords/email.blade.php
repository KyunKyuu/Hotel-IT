@extends('layouts/auth')
@section('title', 'Reset Password')
@section('content')
<div class="main"> 
     <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('auth/images/signin-image.jpg')}}" alt="Login Image Hotel IT"></figure>
                        <a href="{{route('login')}}" class="signup-image-link">Login to your account</a>
                    </div>

                    <div class="signin-form">
                          @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h2 class="form-title">Reset Password</h2>
                          <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                      

                            <div class="form-group">
                                <label><i class="zmdi zmdi-email material-icons-name"></i></label>
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                           
                            

                            <div class="form-group form-button">
                                <button type="submit" name="signin" id="signin" class="form-submit">  {{ __('Send Password Reset Link') }}</button>
                            </div>

                        </form>
                    
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection