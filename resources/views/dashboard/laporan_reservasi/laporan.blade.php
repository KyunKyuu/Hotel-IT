@extends('layouts.dashboard.main')
@section('title', 'Laporan Reservasi Tamu')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">History Reservasi Tamu</h6>
               <form action="{{ route('laporan_reservasi') }}" method="get">
                  @csrf
                 <div class="input-group mb-3 col-md-4 float-right">
                <input type="text" id="created_at" name="date" class="form-control" autocomplete="off">
                 <div class="input-group-append">
                   <button class="btn btn-secondary" type="submit">Filter</button>
                      </div>
                      <a target="_blank" class="btn btn-danger ml-2" id="exportpdf" style="color: white;">Export PDF</a>
                       </div>
                   </form>
          </div>
          
            <div class="card-body">
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Reservasi ID</th>
                      <th>Name</th>
                      <th>Room</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Reservasi ID</th>
                      <th>Name</th>
                      <th>Room</th>
                      <th>Check In</th>
                      <th>Check Out</th>
           
                    </tr>
                  </tfoot>
                  <tbody>
                  	
                  	 @foreach($histories as $history)
                   @if($history->isEmpty())
                    <tr>
                      <td colspan="6" class="text-center">Data Tidak Ditemukan</td>
                    </tr>
                   @else
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$history[0]['kode_reservasi']}}</td>
                      <td>{{$history[0]['user']['name']}}</td>
                   	  <td>{{$history[0]['CategoryKamar']['nama_category']}}</td>
                   	  <td>{{ date('d, F Y H:i', strtotime($history[0]['check_in'])) }}</td>
                   	  <td>{{ date('d, F Y H:i', strtotime($history[0]['check_out']))}}</td>
                   	  
                    <
                      @endif
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
 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script>
    $(document).ready( function () {
    $('#dataTable').DataTable();
});

    //KETIKA PERTAMA KALI DI-LOAD MAKA TANGGAL NYA DI-SET TANGGAL SAA PERTAMA DAN TERAKHIR DARI BULAN SAAT INI
        $(document).ready(function() {
            let start = moment().startOf('month')
            let end = moment().endOf('month')

            $('#exportpdf').attr('href', '/dasboard/laporan/reservasi/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

            $('#created_at').daterangepicker({
                startDate: start,
                endDate: end
            }, function(first, last) {
                $('#exportpdf').attr('href', '/dasboard/laporan/reservasi/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
            })
        });
  </script>

@endpush