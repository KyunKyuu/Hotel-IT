
@extends('layouts.dashboard.main')

@section('title', 'Tambah Data Kamar')

@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Tambah Data Category Kamar</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('store_category_kamar')}}" method="post" ncetype="multipart/form-data">
              @csrf
              @method('post')
        <div class="row">
          <div class="col-md-7">


           <div class="form-group">
          <label for="hotel_id">Dari Hotel</label>
          <select  class="form-control @error('hotel_id') is-invalid @enderror" id="hotel_id" name="hotel_id" >
            <option disabled selected="">Pilih Hotel</option>
            @foreach($hotel as $ht)
              <option value="{{$ht->id}}">{{$ht->nama_hotel}}</option>
            @endforeach
          </select>
          @error('category_id')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

         

          <div class="form-group">
          <label for="nama_category">Nama Kamar</label>
          <input type="text" class="form-control @error('nama_category') is-invalid @enderror"  name="nama_category" placeholder="Masukan Nama Category Kamar" value="{{old('nama_category')}}">
          @error('nama_category')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>
        
          <div class="form-group">
          <label for="ukuran">Ukuran Kamar</label>
          <input type="text" class="form-control @error('ukuran') is-invalid @enderror"  name="ukuran" placeholder="Masukan Ukuran  Kamar" value="{{old('ukuran')}}">
          @error('ukuran')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>
          


          <div class="form-group">
          <label for="harga">Harga Kamar</label>
          <input type="number" class="form-control @error('harga') is-invalid @enderror"  name="harga" placeholder="Masukan Harga Kamar" value="{{old('harga')}}">
          @error('harga')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
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
