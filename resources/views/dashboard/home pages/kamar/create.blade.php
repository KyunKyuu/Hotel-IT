
@extends('layouts.dashboard.main')

@section('title', 'Tambah Data Kamar')
@section('header')
<style>
  .ck-editor__editable {
    min-height: 600px;
    max-height: 600px;
}
</style>
@endsection
@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kamar</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('store_kamar')}}" method="post" enctype="multipart/form-data">
              @csrf
        <div class="row">
          <div class="col-md-7">
        <div class="form-group">
            <label for="content">Deskrisi Kamar</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" value="{{old('content')}}"></textarea>
            @error('content')
              <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
             @enderror
            
          </div>


          
          </div>
          <div class="col-md-5">
            <div class="form-group">
               <label for="gambar_kamar">Upload Gambar Thumbnail</label>
           <input type="file" class="form-control @error('gambar_kamar') is-invalid @enderror" name="gambar_kamar" id="gambar_kamar">
           @error('gambar_kamar')
              <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
             @enderror
             </div>

           <div class="form-group">
          <label for="category_id">Category Kamar</label>
          <select  class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" >
            <option disabled selected="">Pilih Kategori</option>
          
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->nama_category}}</option>
            @endforeach
          </select>
          @error('category_id')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>


          <div class="form-group">
          <label for="kode_kamar">Kode kamar</label>
          <input type="text" class="form-control @error('kode_kamar') is-invalid @enderror"  name="kode_kamar" placeholder="Masukan Kode" value="{{old('kode_kamar')}}">
          @error('kode_kamar')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>


           <div class="form-group">
          <label for="fasilitas_kamar">Fasilitas Kamar </label>
          <input type="text" class="form-control @error('fasilitas_kamar') is-invalid @enderror"  name="fasilitas_kamar" placeholder="Masukan Fasilitas" value="{{old('fasilitas_kamar')}}">
          @error('fasilitas_kamar')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

           <div class="form-group">
          <label for="kapasitas_kamar">Kapasias kamar</label>
          <input type="number" class="form-control @error('kapasitas_kamar') is-invalid @enderror"  name="kapasitas_kamar" placeholder="Masukan Kapasias Kamar" value="{{old('kapasitas_kamar')}}">
          @error('kapasitas_kamar')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>


          
          <div class="form-group">
          <label for="status_kamar">Status Kamar</label>
          <select  class="form-control @error('status_kamar') is-invalid @enderror" id="status_kamar" name="status_kamar" >
            <option disabled selected="">Pilih Status</option>
            
              <option value="tersedia">tersedia</option>
              <option value="tidak tersedia">tidak tersedia</option>
         
          </select>
          @error('status_kamar')
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
