@extends('layouts/site_/main')

@section('title', 'hotel')

@section('content')
	
        <div class="container-fluid text-center">
          
	
		@if($reservasi->isEmpty())
			<h1>Ga ada riwayat</h1>
		@else
			<h1>Ada Riwayat</h1>
			@foreach($reservasi as $rv)
			<h3>{{$rv->CategoryKamar->nama_category}}</h3>
			@endforeach
		@endif
	</div>

@endsection
	
