@extends('layouts/site_/main')

@section('title')
	 Ganti Password
@endsection

@section('content')
<div class="container">
<form action="{{route('edit_password_tamu')}}" method="post">
	@csrf
	@method('patch')

    @if(session('success'))
    <div class="alert alert-success" role="alert">
      {{session('success')}}
    </div>
    @endif

  <div class="form-group">
    <label for="old_password">Password Lama</label>
    <input type="password" class="form-control @error('old_password') is-invalid    
    @enderror" id="old_password"  placeholder="Masukan Password Lama" name="old_password">
    @error('old_password')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="password">Password Baru</label>
    <input type="password" class="form-control @error('password') is-invalid    
    @enderror" id="password"  placeholder="Masukan password" name="password">
    @error('password')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
  </div>

  <div class="form-group">
    <label for="password_confirmation">Confirmasi Password</label>
    <input type="password" class="form-control @error('password_confirmation') is-invalid    
    @enderror" id="password_confirmation"  placeholder="Masukan password_confirmation" name="password_confirmation">
  </div>

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<br>
<br>
@endsection