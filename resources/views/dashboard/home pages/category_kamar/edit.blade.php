
@extends('layouts.dashboard.main')

@section('title', 'Edit Category Kamar')

@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Edit Data Category Kamar</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('update_category_kamar', $kamar->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
        
        <div class="row">
          <div class="col-md-6">

           <div class="form-group">
          <label for="hotel_id">Dari Hotel</label>
              <input type="hidden" disabled="" name="hotel_id" value="{{$hotel->id}}" class="form-control">
              <span class="form-control"> {{$hotel->nama_hotel}}</span>
          </div>

          <div class="form-group">
          <label for="nama_category">Nama Kamar</label>
          <input type="text" class="form-control @error('nama_category') is-invalid @enderror"  name="nama_category" placeholder="Masukan Nama Category Kamar" value="{{$kamar->nama_category}}">
          @error('nama_category')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

          <div class="form-group">
          <label for="harga">Harga Kamar</label>
          <input type="number" class="form-control @error('harga') is-invalid @enderror"  name="harga" placeholder="Masukan Harga Kamar" value="{{$kamar->harga}}">
          @error('harga')
            <small style="color: red;"><div class="invalid-feedback">{{ $message }}</div></small>
          @enderror
          </div>

           <div class="form-group">
            <label for="content">Deskrisi Kamar</label>
            <textarea name="content" style="height: 300px;" class="form-control" id="content" value="{{$kamar->kamar->content}}">{{$kamar->kamar->content}}</textarea>
          </div>

           
           </div>
           
           <div class="col-md-6">

             <div class="form-group">
               <label for="gambar_kamar">Upload Gambar Thumbnail</label>
           <input type="file" class="form-control @error('gambar_kamar') is-invalid @enderror" name="gambar_kamar" id="gambar_kamar" value="{{$kamar->kamar->gambar_kamar}}">
             @error('gambar_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
           </div>

            <div class="form-group">
          <label>Fasilitas Kamar </label><br>
          <button class="btn btn-secondary @error('fasilitas_icon_kamar') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar" value="{!! $icon[0] !!}"><i class="{!! $icon[0] !!}"></i></button>&nbsp;
          <input type="text" name="fasilitas_text_kamar"  class="form-control @error('fasilitas_text_kamar') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{$fasilitas[0]}}">
           @error('fasilitas_text_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>

           <div class="form-group">
           <button class="btn btn-secondary @error('fasilitas_icon_kamar1') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar1" value="{!! $icon[1] !!}"><i class="{!! $icon[1] !!}"></i></button >&nbsp;
          <input type="text" name="fasilitas_text_kamar1"  class="form-control @error('fasilitas_text_kamar1') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{$fasilitas[1]}}">
           @error('fasilitas_text_kamar1')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>

            <div class="form-group">
            <button class="btn btn-secondary @error('fasilitas_icon_kamar2') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar2" value="{!! $icon[2] !!}"><i class="{!! $icon[2] !!}"></i></button>&nbsp;
            <input type="text" name="fasilitas_text_kamar2"  class="form-control @error('fasilitas_text_kamar2') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{$fasilitas[2]}}">
           @error('fasilitas_text_kamar2')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>

          <div class="form-group">
            <button class="btn btn-secondary @error('fasilitas_icon_kamar3') is-invalid @enderror" role="iconpicker" name="fasilitas_icon_kamar3" value="{!! $icon[3] !!}"><i class="{!! $icon[3] !!}"></i></button>&nbsp;
            <input type="text" name="fasilitas_text_kamar3"  class="form-control @error('fasilitas_text_kamar3') is-invalid @enderror"  placeholder="Fasilitas Kamar" value="{{$fasilitas[3]}}">
           @error('fasilitas_text_kamar3')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>
           
        

          <div class="form-group">
          <label for="kapasitas_kamar">Kapasitas Kamar</label>
          <input type="number" class="form-control @error('kapasitas_kamar') is-invalid @enderror"  name="kapasitas_kamar" placeholder="Masukan Harga Kamar" value="{{$kamar->kamar->kapasitas_kamar}}">
          @error('fasilitas_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>
          
        <div class="form-group">
          <label for="jumlah_kamar">Jumlah Kamar</label>
          <input type="number" class="form-control @error('jumlah_kamar') is-invalid @enderror"  name="jumlah_kamar" placeholder="Masukan Jumlah Kamar" value="{{$kamar->kamar->jumlah_kamar}}">
          @error('jumlah_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
         
          </div>
          
          <div class="form-group">
          <label for="status_kamar">Status Kamar</label>
          <select  class="form-control @error('status_kamar') is-invalid @enderror" id="status_kamar" name="status_kamar" >
            <option disabled selected="">{{$kamar->kamar->status_kamar}}</option>
              <option value="tersedia">tersedia</option>
              <option value="tidak tersedia">tidak tersedia</option>
          </select>
          @error('status_kamar')
              <div class="invalid-feedback">{{ $message }}</div>
             @enderror
          </div>
          <button type="submit" class="btn btn-info">Submit</button>
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