@extends('layouts.dashboard.main')
@section('title', 'Daftar Tamu Check Out')
@section('content')

  
  
  <div class="col-xl-3 col-md-6 mb-4">
    <hr>
                    <div class="col mr-2">
                      <div class="h2 mb-0 font-weight-bold text-gray-800">{{today()->format('D,d M Y')}}</div>
                    </div>
   </div>
            
  
  <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Check Out hari ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            
<div class="container-fluid">
<div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Tamu Check In Hari ini</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Hotel</th>
                      <th>Kamar</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  	 @foreach($reservasi as $tm)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$tm->user->name}}</td>
                      <td>{{$tm->CategoryKamar->hotels->nama_hotel}}</td>
                      <td>{{$tm->CategoryKamar->nama_category}}</td>
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

