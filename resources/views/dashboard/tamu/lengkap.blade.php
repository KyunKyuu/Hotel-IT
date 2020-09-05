@extends('layouts.dashboard.main')
@section('title', 'Daftar Tamu')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Tamu Lengkap</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  	 @foreach($tamu as $tm)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$tm->name}}</td>
                      <td>{{$tm->email}}</td>
                      <td>
                      	 <a href="{{route('show_tamu', $tm->id)}}" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-info-circle"></i>
						</a>
                      	 
                  		<form action="{{route('delete_tamu', $tm->id)}}" method="post">
                  			@csrf
                  			@method('delete')
                  		<button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin Dihapus?')">
                  		  <i class="fas fa-trash d-inline"></i>
                  			</button>
                  		</form>
                      </td>
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