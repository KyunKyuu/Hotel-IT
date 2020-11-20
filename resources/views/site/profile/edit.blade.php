@extends('layouts/site_/main')

@section('title')
	{{$user->name}} - Edit Profile
@endsection

@section('navbar')
@include('layouts.site_.navbar3')
@endsection

@section('content')
<div class="container">
<form action="{{route('update_profile_tamu', $user->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('patch')

  <h3 class="w-900 mt-5 px-5">Profile</h3>
      <div class="row px-5">
        <div class="col-md-3">
          <div class="profil-jumbotron text-center bg-white p-3">
            <img src="{{$user->profile->gambar()}}" class="rounded-circle p-4">
            <h5 class="w-900 mt-3">{{$user->name}} {{$user->profile->last_name}}</h5>
            <input type="file" class="active text-decoration-none mb-5" aria-label="deafult input example" name="gambar">Edit Gambar<i class="fas fa-pen ml-1 mb-4"></i></input>
          </div>
        </div>
        <div class="col-md-5">
          <div class="profil-jumbotron text-left p-3 bg-white">
            <h5 class="w-900 mb-3">Details</h5>
            <div class="row">
              <div class="col-8">
                <h6 class="text-black-50">First Name</h6>
                <input class="form-control profil-input pl-2 mb-3" type="text" aria-label="deafult input example" name="name" value="{{$user->name}}">
                <h6 class="text-black-50">Last Name</h6>
                <input class="form-control profil-input pl-2 mb-3" type="text" aria-label="deafult input example" name="last_name" value="{{$user->profile->last_name}}">
                <h6 class="text-black-50">Birth Day</h6>
                <input class="form-control profil-input pl-2 mb-3 input" type="date" aria-label="deafult input example" name="tanggal_lahir" value="{{$user->profile->tanggal_lahir}}">

              </div>
              <div class="col-4">
              
                <h6 class="text-black-50">Gender</h6>
                <div class="form-check">
                  <input class="form-check-input" type="radio" value="Male" name="jenis_kelamin" id="flexRadioDefault1" {{$user->profile->jenis_kelamin == 'Male' ? 'checked' : ''}} >
                  <label class="form-check-label" for="flexRadioDefault1">
                    Male
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" value="Female" type="radio" name="jenis_kelamin" id="flexRadioDefault2" {{$user->profile->jenis_kelamin == 'Female' ? 'checked' : ''}}>
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
            <input class="form-control profil-input pl-2 mb-3" name="email" type="email" aria-label="deafult input example" value="{{$user->email}}">
            <h6 class="text-black-50">Phone Number</h6>
            <input class="form-control profil-input pl-2 mb-3" name="no_telpon" type="text" aria-label="deafult input example" value="{{$user->profile->no_telpon}}">
            <h6 class="text-black-50">Location</h6>
            <input class="form-control profil-input pl-2 mb-3" name="alamat" type="text" aria-label="deafult input example" value="{{$user->profile->alamat}}">
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

@endsection