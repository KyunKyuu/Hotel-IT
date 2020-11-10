@extends('layouts.dashboard.main')
@section('title', 'Informasi  Admin')
@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
           <h5 class="m-0 font-weight-bold text-primary">Informasi Admin</h6>
         </div>
     <div class="card-body">
      <div class="col-md">  
        <div class="row">
          <div class="col-md-6">
       <div class="form-group" >
    
   <img src="{{$admin->profile->gambar()}}" width="350">
   </div>   
</div>
<div class="col-md-6">
  <div class="form-group" >
    <h6>Nama Lengkap</h6>
    <strong>{{$admin->name}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Admin Hotel</h6>
    <strong>{{$hotel->nama_hotel}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Email</h6>
    <strong>{{$admin->email}}</strong>
  </div>
  <hr>
  
  <div class="form-group" >
    <h6>alamat</h6>
    <strong>{{$admin->profile->alamat}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>No Telpon</h6>
    <strong>{{$admin->profile->no_telpon}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Jenis Kelamin</h6>
    <strong>{{$admin->profile->jenis_kelamin}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Created Akun</h6>
    <strong>{{$admin->created_at->format('d,F Y H:i')}}</strong>
  </div>
</div>
</div>
</div>
</div>

</div>
</div>


@endsection
