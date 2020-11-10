@extends('layouts.dashboard.main')
@section('title', 'History Reservasi Tamu')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">History Reservasi Tamu</h6>
           
            
          </div>
          
            <div class="card-body">
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Room</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Room</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	
                  	 @foreach($histories as $history)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$history[0]['user']['name']}}</td>
                   	  <td>{{$history[0]['CategoryKamar']['nama_category']}}</td>
                   	  <td>{{ date('d, F Y H:i', strtotime($history[0]['check_in'])) }}</td>
                   	  <td>{{ date('d, F Y H:i', strtotime($history[0]['check_out']))}}</td>
                   	  <td>{{$history[0]['ReservasiPembayaran']['status']}}</td>
                    </tr>
                    
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
              <div class="card-footer py-3">
             
            
          </div>
          </div>
      </div>



@endsection
@push('footer')
  <script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
} );
  </script>
@endpush