
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
              <input type="hidden" name="hotel_id" value="{{$hotel->id}}" class="form-control">
              <span class="form-control"> {{$hotel->nama_hotel}}</span>
          </div>

            <div class="form-group">
          <label for="nama_category">Nama Categrory Kamar</label>
          <input type="text" class="form-control @error('nama_category') is-invalid @enderror"  name="nama_category" placeholder="Masukan Nama Category Kamar" value="{{old('nama_category')}}">
           @error('nama_category')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>
        
                    
          <div class="form-group">
            <label>Harga Kamar</label>
             <div class="input-group mb-3">
               <div class="input-group-prepend">
                <span class="input-group-text">$</span>
               </div>
              <input type="number" class="form-control @error('harga') is-invalid @enderror"  name="harga" placeholder="Masukan Harga Kamar" value="{{old('harga')}}">
             <div class="input-group-append">
             <span class="input-group-text">.00</span>
            </div>
          </div>
          @error('harga')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
       </div>
          

         <div class="form-group">
            <label for="content">Deskrisi Kamar</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="my-editor" value="{!!old('content')!!}">{!!old('content')!!}</textarea>
            @error('content')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>


          
          </div>
          <div class="col-md-5">
            <div class="form-group">
               <label for="gambar_kamar">Upload Gambar Thumbnail</label>
           <input type="file" class="form-control @error('gambar_kamar') is-invalid @enderror" name="gambar_kamar" id="gambar_kamar">
           @error('gambar_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
             </div>


     
        <div class="form-group">
          <label>Fasilitas Kamar </label><br>
          
           <div class="input-group ">
            <div class="input-group-prepend">
            <button class=" btn btn-secondary @error('fasilitas_icon_kamar') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar" value="{{old('fasilitas_icon_kamar')}}">Icon</button>
            </div>
          <input type="text" name="fasilitas_text_kamar"  class="form-control @error('fasilitas_text_kamar') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{old('fasilitas_text_kamar')}}">
           @error('fasilitas_text_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          
        </div>
        <br>
          <div class="input-group">
            <div class="input-group-prepend">
            <button class="btn btn-secondary @error('fasilitas_icon_kamar1') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar1" value="{{old('fasilitas_icon_kamar1')}}">Icon</button>
             </div>
          <input type="text" name="fasilitas_text_kamar1"  class="form-control @error('fasilitas_text_kamar1') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{old('fasilitas_text_kamar1')}}">
           @error('fasilitas_text_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          
        </div>
         <br>
              <div class="input-group">
            <div class="input-group-prepend">
            <button class="btn btn-secondary @error('fasilitas_icon_kamar2') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar2" value="{{old('fasilitas_icon_kamar2')}}">Icon</button>
             </div>
          <input type="text" name="fasilitas_text_kamar2"  class="form-control @error('fasilitas_text_kamar2') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{old('fasilitas_text_kamar2')}}">
           @error('fasilitas_text_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
        </div>
         <br>
              <div class="input-group">
            <div class="input-group-prepend">
           
            <button class="btn btn-secondary @error('fasilitas_icon_kamar3') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar3" value="{{old('fasilitas_icon_kamar3')}}">Icon</button>
           </div>
          <input type="text" name="fasilitas_text_kamar3"  class="form-control @error('fasilitas_text_kamar3') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{old('fasilitas_text_kamar3')}}">
           @error('fasilitas_text_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          
        </div>
        <br>


           <div class="form-group">
          <label for="kapasitas_kamar">Kapasitas kamar</label>
          <input type="number" class="form-control @error('kapasitas_kamar') is-invalid @enderror"  name="kapasitas_kamar" placeholder="Masukan Kapasitas Kamar" value="{{old('kapasitas_kamar')}}">
          @error('kapasitas_kamar')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>

           <div class="form-group">
          <label for="jumlah_kamar">Jumlah kamar</label>
          <input type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror"  name="jumlah_kamar" placeholder="Masukan Jumlah Kamar" value="{{old('kapasitas_kamar')}}">
            @error('jumlah_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
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