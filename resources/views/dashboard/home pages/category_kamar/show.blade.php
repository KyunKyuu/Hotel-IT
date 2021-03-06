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
    <h6>Dari Hotel</h6>
    <strong>{{$category->hotels->nama_hotel}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Category Kamar</h6>
    <strong>{{$category->nama_category}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Kode Kamar</h6>
    <strong>{{$category->kamar->kode_kamar}}</strong>
  </div>
  <hr>
  
  <div class="form-group" >
    <h6>Fasilitas Kamar</h6>
    <i class="{!! $icon[0] !!}">&nbsp;<strong>{{ $fasilitas[0] }}</strong></i><br>
    <i class="{!! $icon[1] !!}">&nbsp;<strong>{{ $fasilitas[1] }}</strong></i><br>
    <i class="{!! $icon[2] !!}">&nbsp;<strong>{{ $fasilitas[2] }}</strong></i><br>
    <i class="{!! $icon[3] !!}">&nbsp;<strong>{{ $fasilitas[3] }}</strong></i><br>
   

  </div>

  <hr>
  <div class="form-group" >
    <h6>Kapasitas Kamar</h6>
    <strong>{{$category->kamar->kapasitas_kamar}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Jumlah Kamar</h6>
    <strong>{{$category->kamar->jumlah_kamar}}</strong>
  </div>
  <hr>
   <div class="form-group" >
    <h6>Status Kamar</h6>
    <strong>{{$category->kamar->status_kamar}}</strong>
  </div>
  <hr>
   <div class="form-group" >
    <h6>Tentang Kamar</h6>
    <strong>{!! $category->kamar->content !!}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Created Akun</h6>
    <strong>{{$category->created_at->format('d, M Y')}}</strong>
  </div>
  </div>
  <div class="col-md-6">
    
    <img src="{{$category->kamar->gambar_kamar()}}" width="520">
  </div>
</div>

</div>
</div>
</div>
</div>
@endsection