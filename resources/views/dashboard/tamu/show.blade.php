@extends('layouts.dashboard.main')
@section('title', 'Edit Data Tamu')
@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
           <h5 class="m-0 font-weight-bold text-primary">Informasi Tamu</h6>
         </div>
     <div class="card-body">

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
    <h6>No Telpon</h6>
    <strong>{{$detail_tamu->no_telpon}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Alamat</h6>
    <strong>{{$detail_tamu->alamat}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Created Akun</h6>
    <strong>{{$detail_tamu->created_at->format('d, M Y')}}</strong>
  </div>


</div>
</div>
</div>
@endsection