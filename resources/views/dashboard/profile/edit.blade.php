
@extends('layouts.dashboard.main')

@section('title', 'Edit Profile')

@section('content')

    <!-- Table -->
   <div class="container-fluid">
    <div class="card shadow mb-4">
     <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
         </div>
     <div class="col-md">
      <div class="card-body">
            <form action="{{route('update_profile_admin', $admin->id)}}" method="post" enctype="multipart/form-data"> 
              @csrf
              @method('patch')
        
        <div class="row">
          <div class="col-md-7">


              <div class="form-group">
               <label for="gambar">Upload Foto Profile</label>
           <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" id="gambar" value="{{$admin->profile->gambar}}">
             </div>


          <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" placeholder="Masukan Nama Lengkap" value="{{$admin->name}}">
          </div>


          
          <div class="form-group">
          <label for="negara">Negara</label>
          <input type="text" class="form-control @error('negara') is-invalid @enderror"  negara="negara" placeholder="Masukan Negara" value="{{$admin->profile->negara}}">
          </div>

           <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control @error('alamat') is-invalid @enderror"  alamat="alamat" placeholder="Masukan Alamat" value="{{$admin->profile->alamat}}">
          </div>

           <div class="form-group">
          <label for="no_telpon">Nama Lengkap</label>
          <input type="number" class="form-control @error('no_telpon') is-invalid @enderror"  name="no_telpon" placeholder="Masukan Nomor Telepon" value="{{$admin->profile->no_telpon}}">
          </div>


           <div class="form-group">
          <label for="jenis_kelamin">Jenis Kelamin</label>
          <select  class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" >
            <option disabled selected="" value="{{$admin->profile->jenis_kelamin ? $admin->profile->jenis_kelamin : 'Pilih Jenis Kelamin' }}">{{$admin->profile->jenis_kelamin ? $admin->profile->jenis_kelamin : 'Pilih Jenis Kelamin' }}</option>
              
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
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
