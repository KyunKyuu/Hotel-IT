@extends('layouts/site/main')

@section('title')
	{{$user->name}} - Profile
@endsection

@section('content')
<div class="container">
<form action="{{route('update_profile_tamu', $user->id)}}" method="post" enctype="multipart/form-data">
	@csrf
	@method('patch')

	<div class="form-group">
		<label for="gambar">Gambar Profile</label><br>
		<img src="{{$profile->gambar()}}" class="rounded-circle" width="200"><br>
		<input type="file" name="gambar" value="{{$profile->gambar}}">
	</div>

  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="name" placeholder="Masukan Nama" value="{{$user->name}}">
  </div>

   <div class="form-group">
    <label>Negara</label>
    <select class="form-control" name="negara">
    @if($profile->negara == false)
      <option disabled selected="">Pilih Negara</option>
    @else
      <option value="{{$profile->negara}}" selected="">{{$profile->negara}}</option>   
    @endif
      <option value="indonesia">Indonesia</option>
      <option value="belanda">Belanda</option>
    </select>
  </div>
  <div class="form-group">
    <label>Jenis Kelamin</label>
    <select  class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" >
            <option disabled selected="" value="{{$profile->profile->jenis_kelamin ? $profile->profile->jenis_kelamin : 'Pilih Jenis Kelamin' }}">{{$profile->profile->jenis_kelamin ? $profile->profile->jenis_kelamin : 'Pilih Jenis Kelamin' }}</option>
              
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>
          </select>
  </div>
  
  <div class="form-group">
    <label for="no">Nomor Telepon</label>
    <input type="text" class="form-control" id="no" aria-describedby="emailHelp" name="no_telpon" placeholder="Masukan nomor telepon" value="{{$profile->no_telpon}}">
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <input type="textarea" class="form-control" id="alamat" value="{{$profile->alamat}}" placeholder="Masukan Alamat" name="alamat">
  </div>


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<br>
<br>
@endsection