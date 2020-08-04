@extends('layouts.dashboard.main')
@section('title', 'Daftar Kamar')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Kamar</h6>
           
            
          </div>
          
            <div class="card-body">
            	<a href="{{route('create_kamar')}}" class="btn btn-primary btn-icon-split btn-sm">
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
                      <th>Kode Kamar</th>
                      <th>Status Kamar</th>
                      <th>Category Kamar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kode Kamar</th>
                      <th>Status Kamar</th>
                      <th>Category Kamar</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	 @foreach($kamar as $tm)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$tm->kode_kamar}}</td>
                      <td>{{$tm->status_kamar}}</td>
                      <td>{{-- {{$tm->category->nama_category}} --}} King</td>
                      <td>
                      	 <a href="{{route('edit_kamar', $tm->id)}}" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-pen"></i>
					         	</a> 

                     <a href="{{route('detail_kamar', $tm->slug)}}" class="btn btn-success btn-circle btn-sm">
                    <i class="fas fa-eye"></i>
                    </a>
                      	 
                  		<form action="{{route('destroy_kamar', $tm->id)}}" method="post">
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