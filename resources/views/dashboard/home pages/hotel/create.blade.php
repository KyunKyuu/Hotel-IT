
@extends('layouts.dashboard.main')

@section('title', 'Tambah Data Hotel')
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
           <h6 class="m-0 font-weight-bold text-primary">Tambah Data Hotel</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
             <form action="{{route('store_hotel')}}" method="post" enctype="multipart/form-data">
              @csrf
             
        <div class="row">
          <div class="col-md-7">

             <div class="form-group">
               <label for="gambar_hotel">Upload Gambar Thumbnail</label>
           <input type="file" class="form-control @error('gambar_hotel') is-invalid @enderror" name="gambar_hotel" id="gambar_hotel">
             @error('gambar_hotel')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
              <br>
              <input type="file" class="form-control @error('gambar_hotel2') is-invalid @enderror" name="gambar_hotel2" >
             @error('gambar_hotel2')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
              <br>
              <input type="file" class="form-control @error('gambar_hotel3') is-invalid @enderror" name="gambar_hotel3" >
             @error('gambar_hotel3')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
              <br>
              <input type="file" class="form-control @error('gambar_hotel4') is-invalid @enderror" name="gambar_hotel4">
             @error('gambar_hotel4')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
              <br>
              <input type="file" class="form-control @error('gambar_hotel5') is-invalid @enderror" name="gambar_hotel5" >
             @error('gambar_hotel')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
              <br>
             </div>

           <div class="form-group">
          <label for="category_hotel_id">Negara</label>
          <select  class="form-control @error('category_hotel_id') is-invalid @enderror" id="category_hotel_id" name="category_hotel_id" >
            <option disabled selected="">Pilih Negara</option>
            @foreach($negara as $ng)
              <option value="{{$ng->id}}">{{$ng->negara}}</option>
            @endforeach
          </select>
          </div>

          <div class="form-group">
            <label for="content">Deskrisi Hotel</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="my-editor" value="{!!old('content')!!}">{!!old('content')!!}</textarea>
           @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>

          </div>

          <div class="col-md-5">

          <div class="form-group">
          <label for="nama_hotel">Nama Hotel</label>
          <input type="text" class="form-control @error('nama_hotel') is-invalid @enderror"  name="nama_hotel" placeholder="Masukan Nama Hotel" value="{{old('nama_hotel')}}">
          @error('nama_hotel')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
        
          <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" class="form-control @error('kota') is-invalid @enderror"  name="kota" placeholder="Masukan kota  Hotel" value="{{old('kota')}}">
          @error('kota')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>
            
           <div class="form-group">
          <label for="alamat">Alamat Hotel</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror"  name="alamat" placeholder="Masukan Alamat Hotel" value="{{old('alamat')}}">
          @error('alamat')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>



         <div class="form-group">
          <label>Fasilitas Hotel </label><br>
           <div class="input-group">
            <div class="input-group-prepend">
            <button class="btn btn-secondary @error('fasilitas_icon_hotel') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_hotel" value="{{old('fasilitas_icon_hotel')}}">Icon</button>
            </div>
          <input type="text" name="fasilitas_text_hotel"  class="form-control @error('fasilitas_text_hotel') is-invalid @enderror"  placeholder="Fasilitas hotel" value="{{old('fasilitas_text_hotel')}}">
           @error('fasilitas_text_hotel')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
        </div>
        <br>
          <div class="input-group">
            <div class="input-group-prepend">
            <button class="btn btn-secondary @error('fasilitas_icon_hotel1') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_hotel1" value="{{old('fasilitas_icon_hotel1')}}">Icon</button>
           </div>
          <input type="text" name="fasilitas_text_hotel1"  class="form-control @error('fasilitas_text_hotel1') is-invalid @enderror"  placeholder="Fasilitas hotel" value="{{old('fasilitas_text_hotel1')}}">
           @error('fasilitas_text_hotel1')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          
        </div>
         <br>
              <div class="input-group">
            <div class="input-group-prepend">
          
            <button class="btn btn-secondary @error('fasilitas_icon_hotel2') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_hotel2" value="{{old('fasilitas_icon_hotel2')}}">Icon</button>
          </div>
          <input type="text" name="fasilitas_text_hotel2"  class="form-control @error('fasilitas_text_hotel2') is-invalid @enderror"  placeholder="Fasilitas hotel" value="{{old('fasilitas_text_hotel2')}}">
           @error('fasilitas_text_hotel2')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          
        </div>
         <br>

          <div class="input-group">
            <div class="input-group-prepend">
           
            <button class="btn btn-secondary @error('fasilitas_icon_hotel3') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_hotel3" value="{{old('fasilitas_icon_hotel3')}}">Icon</button>
             </div>
          <input type="text" name="fasilitas_text_hotel3"  class="form-control @error('fasilitas_text_hotel3') is-invalid @enderror"  placeholder="Fasilitas hotel" value="{{old('fasilitas_text_hotel3')}}">
           @error('fasilitas_text_hotel3')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
        
        </div>
        <br>

        <div class="input-group">
            <div class="input-group-prepend">
           
            <button class="btn btn-secondary @error('fasilitas_icon_hotel4') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_hotel4" value="{{old('fasilitas_icon_hotel4')}}">Icon</button>
           </div>
          <input type="text" name="fasilitas_text_hotel4"  class="form-control @error('fasilitas_text_hotel4') is-invalid @enderror"  placeholder="Fasilitas hotel" value="{{old('fasilitas_text_hotel4')}}">
           @error('fasilitas_text_hotel4')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          
        </div>
        <br>

        <div class="input-group">
            <div class="input-group-prepend">
           
            <button class="btn btn-secondary @error('fasilitas_icon_hotel5') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_hotel5" value="{{old('fasilitas_icon_hotel5')}}">Icon</button>
           </div>
          <input type="text" name="fasilitas_text_hotel5"  class="form-control @error('fasilitas_text_hotel5') is-invalid @enderror"  placeholder="Fasilitas hotel" value="{{old('fasilitas_text_hotel5')}}">
           @error('fasilitas_text_hotel5')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          
        </div>
        <br>




          <div class="form-group">
          <label for="check_in">Rata-Rata Check_in Hotel</label>
          <input type="datetime-local" class="form-control @error('check_in') is-invalid @enderror"  name="check_in" placeholder="Masukan check_in Hotel" value="{{old('check_in')}}">
          @error('check_in')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
          </div>

             <div class="form-group">
          <label for="check_out">Rata-Rata check_out Hotel</label>
          <input type="datetime-local" class="form-control @error('check_out') is-invalid @enderror"  name="check_out" placeholder="Masukan check_out Hotel" value="{{old('check_out')}}">
          @error('check_out')
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