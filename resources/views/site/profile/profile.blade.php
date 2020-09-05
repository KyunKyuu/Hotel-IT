@extends('layouts/site_/main')

@section('title')
	{{$tamu->name}} - Profile
@endsection

@section('content')


<h1>{{$profile->alamat}}</h1>
<br><br><br><br>
<h1>{{$tamu->name}}</h1>

@endsection