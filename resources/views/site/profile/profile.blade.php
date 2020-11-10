@extends('layouts/site_/main')

@section('title')
	{{$user->name}} - Profile
@endsection

@section('navbar')
@include('layouts.site_.navbar3')
@endsection

@section('content')

 <div class="container">
      <h3 class="w-900 mt-5 px-5">Profile</h3>
      <div class="row px-5">
        <div class="col-md-3">
          <div class="profil-jumbotron text-center bg-white p-3">
            <img src="{{$user->profile->gambar()}}" class="rounded-circle p-4">
            <h5 class="w-900 mt-3">{{$user->name}} {{$user->profile->last_name}}</h5>
            <a href="{{route('edit_profile_tamu', $user->email)}}" class="active text-decoration-none mb-5">Edit Profile<i class="fas fa-pen ml-1 mb-4"></i></a>
          </div>
        </div>
        <div class="col-md-5">
          <div class="profil-jumbotron text-left p-3 bg-white">
            <h5 class="w-900 mb-3">Details</h5>
            <div class="row">
              <div class="col-8">
                <h6 class="text-black-50">First Name</h6>
                <h4 class="form-control profil-input pl-2 mb-3">{{$user->name}}</h4>
                <h6 class="text-black-50">Last Name</h6>
                <h4 class="form-control profil-input pl-2 mb-3">{{$user->profile->last_name}}</h4>
                <h6 class="text-black-50">Birth Day</h6>
                @if($user->profile->tanggal_lahir)
                 <h4 class="form-control profil-input pl-2 mb-3">{{$user->profile->tanggal_lahir->format('d, F Y')}}</h4>
                @else
                 <h4 class="form-control profil-input pl-2 mb-3">{{$user->profile->tanggal_lahir}}</h4>
                @endif
              </div>
              <div class="col-4">
                <h6 class="text-black-50">Gender</h6>
                <div class="form-check">
                  <input class="form-check-input" disabled=""  type="radio" name="flexRadioDefault" id="flexRadioDefault1" {{$user->profile->jenis_kelamin == 'Male' ? 'checked' : ''}} >
                  <label class="form-check-label" for="flexRadioDefault1">
                    Male
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" disabled="" type="radio" name="flexRadioDefault" id="flexRadioDefault2" {{$user->profile->jenis_kelamin == 'Female' ? 'checked' : ''}}>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Female
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="profil-jumbotron text-left bg-white p-3">
            <h5 class="w-900 mb-3">Contact</h5>
            <h6 class="text-black-50">E-mail Address</h6>
           	<h4 class="form-control profil-input pl-2 mb-3">{{$user->email}}</h4>
            <h6 class="text-black-50">Phone Number</h6>
            <h4 class="form-control profil-input pl-2 mb-3">{{$user->profile->no_telpon}}</h4>
            <h6 class="text-black-50">Location</h6>
            <h4 class="form-control profil-input pl-2 mb-3">{{$user->profile->alamat}}</h4>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="row px-5">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
          
        </div>
        <div class="col-md-4 text-center">
          <div class="row">
            <div class="col-6 mt-5 pt-5">
              <a href="{{route('edit_profile_tamu', $user->email)}}" class="btn btn-light border border-2 border-dark rounded-pill mx-1 px-4">Edit Profile</a>
            </div>
         
          </div>
        </div>
      </div>
    </div>

@endsection