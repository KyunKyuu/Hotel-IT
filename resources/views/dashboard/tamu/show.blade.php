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
    <h6>Jenis Kelamin</h6>
    <strong>{{$detail_tamu->profile->jenis_kelamin}}</strong>
  </div>
  <hr>
  <div class="form-group" >
    <h6>Created Akun</h6>
    <strong>{{$detail_tamu->created_at->format('d,F Y H:i')}}</strong>
  </div>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Riwayat Reservasi</h6>
           
          </div>
          
            <div class="card-body">
              
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Hotel</th>
                      <th>Nama Kamar</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      @foreach($reservasi as $rs)
                      <td>{{$loop->iteration}}</td>
                      <td>{{$rs->CategoryKamar->hotels->nama_hotel}}</td>
                      <td>{{$rs->CategoryKamar->nama_category}}</td>
                      <td>{{ date('d, F Y H:i', strtotime($rs->check_in)) }}</td>
                      <td>{{date('d, F Y H:i', strtotime($rs->check_out))}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
              <div class="card-footer py-3">
                {{$reservasi->links()}}
            </div>
          </div>
        </div>
@endsection
