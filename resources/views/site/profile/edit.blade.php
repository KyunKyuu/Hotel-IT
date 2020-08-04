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
    <label for="alamat">Alamat</label>
    <input type="textarea" class="form-control" id="alamat" value="{{$profile->alamat}}" placeholder="Masukan Alamat" name="alamat">
  </div>


  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<br>
<br>
@endsection