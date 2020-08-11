@extends('layouts.dashboard.main')
@section('title', ' Informasi Kamar')
@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
           <h5 class="m-0 font-weight-bold text-primary">Informasi Kamar</h6>
         </div>
    <div class="col-md">
     <div class="card-body">
      <div class="row">
      <div class="col-md-6">
  <div class="form-group" >
    <h6>Category Kamar</h6>
    <strong>{{$kamar->categories->nama_category}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Kode Kamar</h6>
    <strong>{{$kamar->kode_kamar}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Fasilitas Kamar</h6>
    <strong>{{$kamar->fasilitas_kamar}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Kapasitas Kamar</h6>
    <strong>{{$kamar->kapasitas_kamar}}</strong>
  </div>
  <hr>
   <div class="form-group" >
    <h6>Status Kamar</h6>
    <strong>{{$kamar->status_kamar}}</strong>
  </div>
  <hr>
   <div class="form-group" >
    <h6>Tentang Kamar</h6>
    <strong>{{$kamar->content}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Created Akun</h6>
    <strong>{{$kamar->created_at->format('d, M Y')}}</strong>
  </div>
  </div>
  <div class="col-md-6">
    
    <img src="{{$kamar->gambar_kamar()}}" width="520">
  </div>
</div>

</div>
</div>
</div>
</div>
@endsection