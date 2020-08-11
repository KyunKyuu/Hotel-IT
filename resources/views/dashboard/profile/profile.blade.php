@extends('layouts.dashboard.main')
@section('title')
	{{$admin->name}} - Profile
@endsection
@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
           <h5 class="m-0 font-weight-bold text-primary">Profile</h6>
         </div>
    <div class="col-md">
     <div class="card-body">
      <div class="row">
      <div class="col-md-6">
  <div class="form-group" >
    <h6>Nama</h6>
    <strong>{{$admin->name}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Negara</h6>
    <strong>{{$profile->negara}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Nomer Telepon</h6>
    <strong>{{$profile->no_telpon}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Jenis Kelamin</h6>
    <strong>{{$profile->jenis_kelamin}}</strong>
  </div>
  <hr>

  <div class="form-group" >
    <h6>Alamat</h6>
    <strong>{{$profile->alamat}}</strong>
  </div>
  <hr><br>
  <div class="form-group">
  	<a href="" class="btn btn-primary">Edit Profile</a>
  </div>
  </div>


  <div class="col-md-6">
    
    <img src="{{$profile->gambar()}}" width="520">
  </div>
</div>

</div>
</div>
</div>
</div>
@endsection