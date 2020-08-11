
@extends('layouts.dashboard.main')

@section('title', 'Edit Data Hotel')

@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Tambah Data Hotel</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
             <form action="{{route('update_hotel', $hotel->id)}}" method="post" enctype="multipart/form-data">
              @csrf
             @method('patch')
        <div class="row">
          <div class="col-md-7">

              <div class="form-group">
               <label for="gambar_hotel">Upload Gambar Thumbnail</label>
           <input type="file" class="form-control @error('gambar_hotel') is-invalid @enderror" name="gambar_hotel" id="gambar_hotel" value="{{$hotel->gambar_hotel}}">
             </div>

           <div class="form-group">
          <label for="category_hotel_id">Negara</label>
          <select  class="form-control @error('category_hotel_id') is-invalid @enderror" id="category_hotel_id" name="category_hotel_id" >
            <option disabled selected="" value="{{$hotel->category_hotel_id}}">{{$hotel->CategoriesHotel->negara}}</option>
            @foreach($negara as $ng)
              <option value="{{$ng->id}}">{{$ng->negara}}</option>
            @endforeach
          </select>
         
          </div>

         

          <div class="form-group">
          <label for="nama_hotel">Nama Hotel</label>
          <input type="text" class="form-control @error('nama_hotel') is-invalid @enderror"  name="nama_hotel" placeholder="Masukan Nama Hotel" value="{{$hotel->nama_hotel}}">
          @error('nama_hotel')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>
        
          <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" class="form-control @error('kota') is-invalid @enderror"  name="kota" placeholder="Masukan kota  Hotel" value="{{$hotel->kota}}">
          @error('kota')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>
            
           <div class="form-group">
          <label for="alamat">Alamat Hotel</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror"  name="alamat" placeholder="Masukan Alamat Hotel" value="{{$hotel->alamat}}">
          @error('alamat')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

              <div class="form-group">
          <label for="fasilitas">Fasilitas Hotel</label>
          <input type="text" class="form-control @error('fasilitas') is-invalid @enderror"  name="fasilitas" placeholder="Masukan fasilitas  Hotel" value="{{$hotel->fasilitas}}">
          @error('fasilitas')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

          <div class="form-group">
          <label for="check_in">Rata-Rata Check_in Hotel</label>
          <input type="datetime-local" class="form-control @error('check_in') is-invalid @enderror"  name="check_in" placeholder="Masukan check_in Hotel" value="{{$hotel->check_in}}">
          @error('check_in')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

             <div class="form-group">
          <label for="check_out">Rata-Rata check_out Hotel</label>
          <input type="datetime-local" class="form-control @error('check_out') is-invalid @enderror"  name="check_out" placeholder="Masukan check_out Hotel" value="{{$hotel->check_out}}">
          @error('check_out')
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
