
@extends('layouts.dashboard.main')

@section('title', 'Edit Data Kamar')
@section('header')
<link rel="stylesheet" href="{{asset('dashboard/icon/css/bootstrap-iconpicker.min.css')}}" type="text/css"/>

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
           <h6 class="m-0 font-weight-bold text-primary">Edit Data Kamar</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('update_kamar', $kamar->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
        <div class="row">
          <div class="col-md-7">
        <div class="form-group">
            <label for="content">Deskrisi Kamar</label>
            <textarea name="content" class="form-control" id="content">{!!$kamar->content!!}</textarea>
          
            
          </div>


          
          </div>
          <div class="col-md-5">
            <div class="form-group">
               <label for="gambar_kamar">Upload Gambar Thumbnail</label>
           <input type="file" class="form-control @error('gambar_kamar') is-invalid @enderror" name="gambar_kamar" id="gambar_kamar" value="{{$kamar->gambar_kamar}}">
             @error('gambar_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
             </div>

          <div class="form-group">
          <label for="category_id">Category Kamar</label>
          <select  class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
            <option disabled selected="">{{$category_kamar->nama_category}}</option>
            @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->nama_category}}</option>
            @endforeach
          </select>
            @error('category_id')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>

          <div class="form-group">
          <label for="kode_kamar">Kode kamar</label>
          <input type="text" class="form-control @error('kode_kamar') is-invalid @enderror"  name="kode_kamar" placeholder="Masukan Kode" value="{{$kamar->kode_kamar}}">
           @error('kode_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>

        

           <div class="form-group">
          <label for="fasilitas_kamar">Fasilitas Kamar </label><br>
          <button class="btn btn-secondary @error('fasilitas_kamar') is-invalid @enderror" role="iconpicker" name="fasilitas_kamar" value="{!! $icon[0] !!}"></i></button >&nbsp;
          </div>

          <div class="form-group">
          <label for="fasilitas_kamar">Fasilitas Kamar </label><br>
          <button class="btn btn-secondary @error('fasilitas_kamar2') is-invalid @enderror" role="iconpicker" name="fasilitas_kamar2" value="{!! $icon[1] !!}"></i></button >&nbsp;
          </div>

          <div class="form-group">
          <label for="fasilitas_kamar">Fasilitas Kamar </label><br>
          <button class="btn btn-secondary @error('fasilitas_kamar3') is-invalid @enderror" role="iconpicker" name="fasilitas_kamar3" value="{!! $icon[2] !!}"></i></button >&nbsp;
          </div>




          <div class="form-group">
          <label for="kapasitas_kamar">Kapasitas Kamar</label>
          <input type="number" class="form-control @error('kapasitas_kamar') is-invalid @enderror"  name="kapasitas_kamar" placeholder="Masukan Harga Kamar" value="{{$kamar->kapasitas_kamar}}">
          @error('fasilitas_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>
          
        <div class="form-group">
          <label for="jumlah_kamar">Jumlah Kamar</label>
          <input type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror"  name="jumlah_kamar" placeholder="Masukan Jumlah Kamar" value="{{$kamar->jumlah_kamar}}">
          @error('jumlah_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         
          </div>
          
          <div class="form-group">
          <label for="status_kamar">Status Kamar</label>
          <select  class="form-control @error('status_kamar') is-invalid @enderror" id="status_kamar" name="status_kamar" >
            <option disabled selected="">{{$kamar->status_kamar}}</option>
              <option value="tersedia">tersedia</option>
              <option value="tidak tersedia">tidak tersedia</option>
         
          </select>
          @error('status_kamar')
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