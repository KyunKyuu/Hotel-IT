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
                        
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Reset Password</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label><i class="zmdi zmdi-email material-icons-name"></i></label>
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="Masukan Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i>Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Masukan Password Baru">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                             <div class="form-group">
                                <label for="password-confirm"><i class="zmdi zmdi-lock"></i>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmasi Passwird Baru">    
                            </div>
                            

                            <div class="form-group form-button">
                                <button type="submit" name="signin" id="signin" class="form-submit">Reset Password</button>
                            </div>

                        </form>
                    
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection