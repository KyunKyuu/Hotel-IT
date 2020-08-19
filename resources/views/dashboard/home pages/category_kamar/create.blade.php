
@extends('layouts.dashboard.main')

@section('title', 'Tambah Data Kamar')
@push('header')
<!-- Bootstrap-Iconpicker -->
<link rel="stylesheet" href="{{asset('dashboard/icon/css/bootstrap-iconpicker.min.css')}}" type="text/css"/>
<style>
  .ck-editor__editable {
    min-height: 800px;
    max-height: 800px;
}
</style>
@endpush
@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kamar</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('store_category_kamar')}}" method="post" enctype="multipart/form-data">
              @csrf
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
          </div>

            <div class="form-group">
          <label for="nama_category">Nama Categrory Kamar</label>
          <input type="text" class="form-control @error('nama_category') is-invalid @enderror"  name="nama_category" placeholder="Masukan Nama Category Kamar" value="{{old('nama_category')}}">
         
          </div>
        
                    


          <div class="form-group">
          <label for="harga">Harga Kamar</label>
          <input type="number" class="form-control @error('harga') is-invalid @enderror"  name="harga" placeholder="Masukan Harga Kamar" value="{{old('harga')}}">
          </div>

        <div class="form-group">
            <label for="content">Deskrisi Kamar</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="my-editor" value="{{old('content')}}"></textarea>
            
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
          <label for="kode_kamar">Kode kamar</label>
          <input type="text" class="form-control @error('kode_kamar') is-invalid @enderror"  name="kode_kamar" placeholder="Masukan Kode" value="{{old('kode_kamar')}}">
          @error('kode_kamar')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>


           <div class="form-group">
          <label>Fasilitas Kamar </label><br>
          <button class="btn btn-secondary @error('fasilitas_kamar') is-invalid @enderror" role="iconpicker" name="fasilitas_kamar" value="{{old('fasilitas_kamar')}}">Icon</button >&nbsp;
           <button class="btn btn-secondary @error('fasilitas_kamar') is-invalid @enderror" role="iconpicker" name="fasilitas_kamar2" value="{{old('fasilitas_kamar')}}">Icon</button >&nbsp;
            <button class="btn btn-secondary @error('fasilitas_kamar') is-invalid @enderror" role="iconpicker" name="fasilitas_kamar3" value="{{old('fasilitas_kamar')}}">Icon</button >
          </div>

           <div class="form-group">
          <label for="kapasitas_kamar">Kapasitas kamar</label>
          <input type="number" class="form-control @error('kapasitas_kamar') is-invalid @enderror"  name="kapasitas_kamar" placeholder="Masukan Kapasitas Kamar" value="{{old('kapasitas_kamar')}}">
          @error('kapasitas_kamar')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

           <div class="form-group">
          <label for="jumlah_kamar">Jumlah kamar</label>
          <input type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror"  name="jumlah_kamar" placeholder="Masukan Jumlah Kamar" value="{{old('kapasitas_kamar')}}">
          </div>

          
          <div class="form-group">
          <label for="status_kamar">Status Kamar</label>
          <select  class="form-control @error('status_kamar') is-invalid @enderror" id="status_kamar" name="status_kamar" >
            <option disabled selected="">Pilih Status</option>
            
              <option value="tersedia">tersedia</option>
              <option value="tidak tersedia">tidak tersedia</option>
         
          </select>

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

@push('footer')
<!-- jQuery CDN -->
<!-- Bootstrap-Iconpicker Bundle -->
<script src="{{asset('dashboard/icon/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
  <script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
  </script>
  <script>
  CKEDITOR.replace('my-editor', options);
  </script>
@endpush