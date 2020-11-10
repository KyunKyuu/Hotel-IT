@extends('layouts.dashboard.main')
@section('title', 'List Admin')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
           
            
          </div>
          
            <div class="card-body">
            	<a href="{{route('create_admin')}}" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-100">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                  </a>
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Hotel</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Hotel</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <div style="display: none;">{{$no = 0}}</div>
                  	 @foreach($users as $user)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$hotel[$no]['nama_hotel']}}</td>
                      <td>


                    <a href="{{route('show_admin', $user->id)}}" class="btn btn-success btn-circle btn-sm">
                    <i class="fas fa-eye"></i>
                    </a>    

                    <a href="{{route('remove_admin', $user->id)}}" class="btn btn-warning btn-circle btn-sm">
                    <i class="fas fa-minus"></i>
                    </a>

                    {{-- <a href="{{route('edit_category_hotel', $user->id)}}" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-pen"></i>
					         	</a>  --}}

                  <div style="display: none;">{{$no++}}</div>
                      	   
                  		<form class="form-inline" action="{{route('destroy_admin', $user->id)}}" method="post">
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