@extends('layouts.dashboard.main')
@section('title', 'Informasi  Tamu')
@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
           <h5 class="m-0 font-weight-bold text-primary">Informasi Tamu</h6>
         </div>
     <div class="card-body">
      <div class="col-md">  
        <div class="row">
          <div class="col-md-6">
       <div class="form-group" >
    
   <img src="{{$detail_tamu->profile->gambar()}}" width="350">
   </div>   
</div>
<div class="col-md-6">
  <div class="form-group" >
    <h6>Nama Lengkap</h6>
    <strong>{{$detail_tamu->name}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Email</h6>
    <strong>{{$detail_tamu->email}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>negara</h6>
    <strong>{{$detail_tamu->profile->negara}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>alamat</h6>
    <strong>{{$detail_tamu->profile->alamat}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>No Telpon</h6>
    <strong>{{$detail_tamu->profile->no_telpon}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Alamat</h6>
    <strong>{{$detail_tamu->profile->alamat}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Created Akun</h6>
    <strong>{{$detail_tamu->created_at->format('d, M Y')}}</strong>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection