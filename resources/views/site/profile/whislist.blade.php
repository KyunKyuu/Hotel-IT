@extends('layouts/site_/main')

@section('title', 'Whislist Hotel')

@section('navbar')
@include('layouts.site_.navbar3')
@endsection

@section('content')
	
		
			<!-- breadcrumb -->
    <nav class="container my-4" aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent text-black breadcrumb-wishlist">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#" class="text-decoration-none">Wishlist</a></li>
      </ol>
    </nav>
    <!-- breadcrumb -->
		@if($whislist->isEmpty())
        <div class="container-fluid text-center">
			<h1>Whislist is Empty</h1>
			</div>
		@else

    

    <div class="main-wishlist">
      <div class="container">
        <div class="d-flex">
          <h4 class="left-side active">Hotels</h4>
          <form  class="mt-1 text-decoration-none active" action="{{route('destroy_all_whislist', $user->id)}}" method="post" >
        @csrf
        @method('delete')
         <button type="submit" class="mt-1 text-decoration-none active" onclick="return confirm('Yakin ingin Dihapus?')">Delete All
         </button>
       </form>
        </div>

        <div style="display: none;">{{$no = 0}}</div>
        @foreach($whislist as $rv)
        <hr class="hr-1">
        <div class="isi-wishlist">
          <img src="{{$rv->hotel->gambar_hotel()}}" class="float-left img-hotel-wishlist">
          <div class="d-flex">
            <h3 class="w-900">{{$rv->hotel->nama_hotel}}</h3>
            <a  href="{{route('detail_hotel', $rv->hotel->slug)}}" class="btn btn-1 px-4 ml-auto">Order Now</a>
          </div>
          <img src="{{asset('site_/img/icon_star.png')}}"  class="icon-star">
          <p class="mb-0">{{$rv->hotel->categorieshotel->negara}} ~ {{$rv->hotel->kota}}</p>
          <img src="{{asset('site_/img/icon-fasilitas.png')}}" class="icon-fasilitas mb-1">
          <p class="mb-0">{{$rv->hotel->alamat}}</p>
          <form action="{{route('destroy_whislist', $rv->id)}}" method="post" class="icon ml-auto">
          @csrf
          @method('delete') 
          <div class="d-flex">
            <button type="submit" onclick="return confirm('Yakin ingin Dihapus?')"><i class="fa fa-trash "></i></button>
          </div>
        </form>
        </div>
        
        <div style="display: none;">{{$no++}}</div>
        @endforeach

        {{$whislist->links()}}
      
      </div>
    </div>
		@endif
   
@endsection
	
