@extends('layouts/auth')
@section('title', 'Login')
@section('content')
<div class="main"> 
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                      <figure><img src="{{asset('auth/images/signin-image.jpg')}}" alt="Login Image Hotel IT"></figure>
                        <a href="{{route('register')}}" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                         @if ($message = Session::get('success'))
                                 <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button> 
                                     <h3>{{ $message }}</h3>
                     </div>
                         @endif
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{ route('login')}}">
                            @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Masukan Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Masukan Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="agree-term" />
                                <label for="remember" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <button type="submit" name="signin" id="signin" class="form-submit">LOGIN</button>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">
                                 @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                            </span>
                            {{-- <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
@endsection

 