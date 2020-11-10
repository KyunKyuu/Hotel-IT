@extends('layouts/site_/main')

@section('title')
	 Ganti Password
@endsection

@section('navbar')
@include('layouts.site_.navbar3')
@endsection

@section('content')
<div class="container">
<form action="{{route('edit_password_tamu')}}" method="post">
	@csrf
	@method('patch')

     <div class="row px-5">
        <div class="col-md-3">
          
        </div>
         <div class="col-md-5">
          <div class="profil-jumbotron text-left p-3 bg-white">
            <h5 class="w-900 mb-3">Change Password</h5>
            <div class="row">
              <div class="col-12">
                <h6 class="text-black-50">Old Password</h6>
    <input type="password" class="form-control profil-input pl-2 mb-3 @error('old_password') is-invalid   @enderror"   placeholder="Enter Old Password" name="old_password">
    @error('old_password')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
  
    <h6 class="text-black-50">New Password</h6>
    <input type="password" class="form-control profil-input pl-2 mb-3 @error('password') is-invalid    
    @enderror"   placeholder="Enter New Password" name="password">
    @error('password')
        <div class="text-danger mt-2">{{$message}}</div>
    @enderror
  

    <h6 class="text-black-50">Repeat New Password</h6>
    <input type="password" class="form-control profil-input pl-2 mb-3 @error('password_confirmation') is-invalid    
    @enderror"  placeholder="Repeat New Password" name="password_confirmation">
    </div>
  </div>
</div>
</div>
</div>
<div class="container mt-4">
      <div class="row px-5">
        
        
        <div class="col-md-4 text-center">
          <div class="row">
            <div class="col-6 mt-5 pt-5">
              <button class="btn btn-light border border-2 border-dark rounded-pill mx-1 px-5">Cancel</button>
            </div>
            <div class="col-6 mt-5 pt-5">
              <button type="submit" class="btn btn-1 rounded-pill mx-1 px-4">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</form>
</div>
<br>
<br>
@endsection