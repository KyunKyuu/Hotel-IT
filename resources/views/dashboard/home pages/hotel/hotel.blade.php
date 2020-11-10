@extends('layouts.dashboard.main')
@section('title', 'Daftar Hotel')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Hotel</h6>
           
            
          </div>
          
            <div class="card-body">
              @if(auth()->user()->role == "admin")
                @if(!$hotel)
                	<a href="{{route('create_hotel')}}" class="btn btn-primary btn-icon-split btn-sm">
                        <span class="icon text-white-100">
                          <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                  </a>
                @endif
              @endif
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     
                      <th>Nama Hotel</th>
                      <th>Negara</th>
                      <th>Kota</th>
                       @if(auth()->user()->role == "superadmin")
                      <th>Dibuat Oleh</th>
                      @endif
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                   
                      <th>Nama Hotel</th>
                      <th>Negara</th>
                      <th>Kota</th>
                       @if(auth()->user()->role == "superadmin")
                      <th>Dibuat Oleh</th>
                      @endif
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  
                    <tr>
                     
                      <td>{{$hotel->nama_hotel}}</td>
                      <td>{{$hotel->CategoriesHotel->negara}} </td>
                      <td>{{$hotel->kota}}</td>
                       @if(auth()->user()->role == "superadmin")
                      <td>{{$hotel->dibuat_oleh}}</td>
                       @endif
                      <td>
                      @if(auth()->user()->role == "admin")
                      	 <a href="{{route('edit_hotel', $hotel->slug)}}" class="btn btn-info btn-circle btn-sm">
                         <i class="fas fa-pen"></i>
					             	</a> 
                      @endif
                     <a href="{{route('show_hotel', $hotel->slug)}}" class="btn btn-success btn-circle btn-sm">
                    <i class="fas fa-eye"></i>
                    </a>
                      	 
                  		<form action="{{route('destroy_hotel', $hotel->id)}}" method="post">
                  			@csrf
                  			@method('delete')
                  		<button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin Dihapus?')">
                  		  <i class="fas fa-trash d-inline"></i>
                  			</button>
                  		</form>
                      </td>
                    </tr>
                    
                    </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer py-3">
             
            
          </div>
          
          </div>
      </div>


<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="ModalContent">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
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