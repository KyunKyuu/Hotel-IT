@extends('layouts.dashboard.main')
@section('title', 'Daftar Diskon Kamar')
@section('content')
<div class="container-fluid">
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Diskon Kamar</h6>
           
            
          </div>
          
            <div class="card-body">
              @if(auth()->user()->role == 'admin')
                <button type="button" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#diskon"> <span class="text">Tambah Diskon tanpa syarat</span>
                    <span class="icon text-white-100">
                      <i class="fas fa-plus"></i>
                    </span>
                </button>
              
                <button type="button" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#diskon_voucher"> <span class="text">Tambah Diskon Voucher</span>
                    <span class="icon text-white-100">
                      <i class="fas fa-plus"></i>
                    </span>
                </button>
              @endif
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Diskon</th>
                      <th>Kamar</th>
                      <th>Type Diskon</th>
                      <th>Diskon</th>
                      <th>Diskon Start</th>
                      <th>Diskon End</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Jenis Diskon</th>
                      <th>Kamar</th>
                      <th>Type Diskon</th>
                      <th>Diskon</th>
                      <th>Diskon Start</th>
                      <th>Diskon End</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	 @foreach($diskons as $diskon)
                    <tr>
                    @if($diskon->diskon)
                      <td>{{$loop->iteration}}</td>
                      @if($diskon->diskon->kode_diskon == null)
                      <td>Semua</td>
                      @elseif($diskon->diskon->kode_diskon != null)
                      <td>Voucher</td>
                      @endif
                      <td>{{$diskon->nama_category}}</td>
                      <td>{{$diskon->diskon->type}}</td> 
                      @if($diskon->diskon->type == 'persen')               
                       <td>{{$diskon->diskon->diskon}}%</td>
                      @else
                      <td>${{$diskon->diskon->diskon}}</td>
                      @endif
                      <td>{{ date('d, F Y H:i',strtotime($diskon->diskon->diskon_start)) }}</td>
                      <td>{{date('d, F Y H:i',strtotime($diskon->diskon->diskon_end))}}</td>
                      <td>
                   
                    <a href="{{route('edit_diskon', $diskon->id)}}" class="btn btn-info btn-circle btn-sm">
                    <i class="fas fa-pen"></i>
					         	</a> 

                    <a href="{{route('show_diskon', $diskon->id)}}" class="btn btn-success btn-circle btn-sm">
                    <i class="fas fa-eye"></i>
                    </a>
                     
                      	 
                  		<form action="{{route('destroy_diskon', $diskon->id)}}" method="post">
                  			@csrf
                  			@method('delete')
                  		<button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Yakin ingin Dihapus?')">
                  		  <i class="fas fa-trash d-inline"></i>
                  			</button>
                  		</form>
                      </td>
                       @endif
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

 {{-- Create Modal Diskon tanpa syarat    --}}  
<div class="modal fade" id="diskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Diskon tanpa syarat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('store_diskon')}}" method="post" enctype="multipart/form-data">
         @csrf
         @method('post')
          
          <div class="form-group">
          <label for="kamar" class="col-form-label">Pilih Kamar</label>
          <select  class="form-control @error('kamar') is-invalid @enderror" id="kamar" name="kamar" >
            <option disabled selected="">Pilih Kamar</option>
            @foreach($category_kamar as $kamar)
             @if($kamar->isEmpty())
              <option selected="">All room have a discount</option>
             @else
              <option value="{{$kamar[0]['id']}}">{{$kamar[0]['nama_category']}}</option>
             @endif
            @endforeach
          </select>
          </div>  

         <div class="form-group">
          <label for="type">Pilih Type Diskon</label>
          <select  class="form-control @error('type') is-invalid @enderror" id="type" name="type" >
            <option disabled selected="">Type Diskon</option>
              <option value="persen">Persen</option>
              <option value="potongan harga">Potongan Harga</option>
          </select>
          </div> 

          <div class="form-group">
          <label for="diskon">Tentukan Potongan Diskon</label>
          <input type="number" class="form-control @error('diskon') is-invalid @enderror"  name="diskon" placeholder="Masukan Potongan Diskon" value="{{old('diskon')}}">
          @error('diskon')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
      
          <div class="form-group">
          <label for="diskon_start">Diskon Start</label>
          <input type="datetime-local" class="form-control @error('diskon_start') is-invalid @enderror"  name="diskon_start" placeholder="Masukan Potongan diskon_start" value="{{old('diskon_start')}}">
          @error('diskon_start')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>

           <div class="form-group">
          <label for="diskon_end">Diskon End</label>
          <input type="datetime-local" class="form-control @error('diskon_end') is-invalid @enderror"  name="diskon_end" placeholder="Masukan Potongan diskon_end" value="{{old('diskon_end')}}">
          @error('diskon_end')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Diskon</button>
      </div>
    </form>
    </div>
  </div>
</div>

 {{-- Create Modal Diskon Voucher   --}}  
<div class="modal fade" id="diskon_voucher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Diskon Voucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('store_diskon')}}" method="post" enctype="multipart/form-data">
         @csrf
         @method('post')
          
          <div class="form-group">
          <label for="kamar" class="col-form-label">Pilih Kamar</label>
          <select  class="form-control @error('kamar') is-invalid @enderror" id="kamar" name="kamar" >
            <option disabled selected="">Pilih Kamar</option>
            @foreach($category_kamar as $kamar)
             @if($kamar->isEmpty())
              <option selected="">All room have a discount</option>
             @else
              <option value="{{$kamar[0]['id']}}">{{$kamar[0]['nama_category']}}</option>
             @endif
            @endforeach
          </select>
          </div>  

          <div class="form-group">
          <label for="diskon">Kode Diskon</label>
          <input type="text" style="text-transform:uppercase" class="form-control @error('kode_diskon') is-invalid @enderror"  name="kode_diskon" placeholder="Masukan Kode Diskon" value="{{old('kode_diskon')}}">
          @error('kode_diskon')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>

         <div class="form-group">
          <label for="type">Pilih Type Diskon</label>
          <select  class="form-control @error('type') is-invalid @enderror" id="type" name="type" >
            <option disabled selected="">Type Diskon</option>
              <option value="persen">Persen</option>
              <option value="potongan harga">Potongan Harga</option>
          </select>
          </div> 

          <div class="form-group">
          <label for="diskon">Tentukan Potongan Diskon</label>
          <input type="number" class="form-control @error('diskon') is-invalid @enderror"  name="diskon" placeholder="Masukan Potongan Diskon" value="{{old('diskon')}}">
          @error('diskon')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
      
          <div class="form-group">
          <label for="diskon_start">Diskon Start</label>
          <input type="datetime-local" class="form-control @error('diskon_start') is-invalid @enderror"  name="diskon_start" placeholder="Masukan Potongan diskon_start" value="{{old('diskon_start')}}">
          @error('diskon_start')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>

           <div class="form-group">
          <label for="diskon_end">Diskon End</label>
          <input type="datetime-local" class="form-control @error('diskon_end') is-invalid @enderror"  name="diskon_end" placeholder="Masukan Potongan diskon_end" value="{{old('diskon_end')}}">
          @error('diskon_end')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Diskon</button>
      </div>
    </form>
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