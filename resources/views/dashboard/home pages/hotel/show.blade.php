@extends('layouts.dashboard.main')
@section('title', ' Informasi Hotel')
@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
           <h5 class="m-0 font-weight-bold text-primary">Informasi Hotel</h6>
         </div>
    <div class="col-md">
     <div class="card-body">
      <div class="row">
      <div class="col-md-6">
  <div class="form-group" >
    <h6>Nama Hotel</h6>
    <strong>{{$hotel->nama_hotel}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Negara</h6>
    <strong>{{$hotel->CategoriesHotel->negara}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Alamat</h6>
    <strong>{{$hotel->kota}} &middot; {{$hotel->alamat}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Fasilitas</h6>
    <strong>{{$hotel->fasilitas}}</strong>
  </div>
  <hr>
   <div class="form-group" >
    <h6>Rata Rata Check In</h6>
    <strong>{{$hotel->check_in}}</strong>
  </div>
  <hr>
   <div class="form-group" >
    <h6>Rata Rata Check Out</h6>
    <strong>{{$hotel->check_out}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Created Data Hotel</h6>
    <strong>{{$hotel->created_at->format('d, M Y')}}</strong>
  </div>
  </div>
  <div class="col-md-6">
    
    <img src="{{$hotel->gambar_hotel()}}" width="520">
  </div>
</div>

</div>
</div>
</div>
</div>
@endsection