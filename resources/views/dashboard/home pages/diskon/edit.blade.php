
@extends('layouts.dashboard.main')

@section('title', 'Edit Data Diskon')

@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Tambah Data Diskon</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('update_diskon', $diskon->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
        <div class="row">
          <div class="col-md-7">
         

          <div class="form-group">
          <label for="kamar">Pilih Kamar</label>
          <input type="text" class="form-control @error('kamar') is-invalid @enderror"  disabled="" name="kamar" value="{{$diskon->nama_category}}">
          </div>  

          @if($diskon->diskon->kode_diskon != null)
           <div class="form-group">
          <label for="diskon">Kode Diskon</label>
          <input type="text" style="text-transform:uppercase" class="form-control @error('kode_diskon') is-invalid @enderror"  name="kode_diskon" placeholder="Masukan Kode Diskon" value="{{$diskon->diskon->kode_diskon}}">
          @error('kode_diskon')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
          @endif

           <div class="form-group">
          <label for="type">Pilih Type Diskon</label>
          <select  class="form-control @error('type') is-invalid @enderror" id="type" name="type" >
              <option disabled="" value="{{$diskon->diskon->type}}">{{$diskon->diskon->type}}</option>
              <option value="persen">Persen</option>
              <option value="harga">Potongan Harga</option>
          </select>
          </div> 

          <div class="form-group">
          <label for="diskon">Tentukan Potongan Diskon</label>
          <input type="number" class="form-control @error('diskon') is-invalid @enderror"  name="diskon" placeholder="Masukan Potongan Diskon" value="{{$diskon->diskon->diskon}}">
          @error('diskon')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
      
          <div class="form-group">
          <label for="diskon_start">Diskon Start</label>
          <input type="datetime-local" class="form-control @error('diskon_start') is-invalid @enderror"  name="diskon_start"  value="{{$diskon->diskon->diskon_start}}" placeholder="">
          @error('diskon_start')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>

           <div class="form-group">
          <label for="diskon_end">Diskon End</label>
          <input type="datetime-local" class="form-control @error('diskon_end') is-invalid @enderror"  name="diskon_end" value="{{$diskon->diskon->diskon_end}}">
          @error('diskon_end')
           <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>


           <button type="submit" class="btn btn-info">Submit</button>
           </div>
          </div>
        </form>
      </div>
  </div>
</div>
</div>


@endsection
