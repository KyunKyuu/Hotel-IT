@extends('layouts/auth')
@section('title', 'Daftar')
@section('content')

 <!-- Sign up form -->
 <div class="main">
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                           <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                               <input type="text" name="name" id="name" placeholder="Nama Lengkap" value="{{@old('name')}}" autocomplete="name" />
                                @error('nama')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Masukan Email" value="{{@old('email')}}" autocomplete="email" />
                                 @error('email')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telpon"><i class="zmdi zmdi-phone"></i></label>
                                <input type="number" name="no_telpon" id="no_telpon" placeholder="Masukan Nomor Telepon" value="{{@old('no_telpon')}}" autocomplete="off"/>
                                @error('no_telpon')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                          
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" />
                                 @error('password')
                                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
                                @enderror
                            </div>
                         
                            <div class="form-group form-button">
                                <button type="submit" class="form-submit">Register</button>
                            </div>
                        </form>
                       
                    </div>
                    <div class="signup-image">
                        <figure><img src="auth/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="{{url('/login')}}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
