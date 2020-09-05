@extends('layouts.dashboard.main')
@section('title', 'Daftar Category Hotel')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Category HOtel</h6>
           
            
          </div>
          
            <div class="card-body">
            	<a href="{{route('create_category_hotel')}}" class="btn btn-primary btn-icon-split btn-sm">
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
                      <th>Negara</th>
                    
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>No</th>
                      <th>Negara</th>
                    
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	 @foreach($hotel as $ht)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$ht->negara}}</td>
                   
                      <td>
                    <a href="{{route('edit_category_hotel', $ht->id)}}" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-pen"></i>
					         	</a> 

                     
                      	 
                  		<form action="{{route('destroy_category_hotel', $ht->id)}}" method="post">
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