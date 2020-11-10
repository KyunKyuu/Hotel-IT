@extends('layouts/site_/main')

@section('title', 'Popular Hotel')

@section('navbar')
@include('layouts.site_.navbar6')
@endsection

@section('content')

 <!-- header -->
 <div class="profil">
    <div class="header-popular p-5 position-absolute ml-5">
      <h1 class="display-5 text-white mb-3">Make you <br> comfort is <br> our happiness</h1>
      <h5 class="text-white">You can choose hotels with quality and affordable prices, <br> Click the button below to select</h5>
      <button class="btn btn-1 rounded-pill py-3 pl-4 pr-3 mt-5"><h3 class="mb-0 w-300">Choose now <i class="fas fa-chevron-right ml-4"></i></h3> </button>
    </div>
    <div class="popular-hero">
      <img src="{{asset('site_/img/marten.png')}}">
    </div>
    <!-- header -->

    <div class="container">
      <div class="popular p-5">
        <h2 class="font-assistant w-900">Is Now Popular</h2>
        <div class="row">
        	<div style="display: none;">{{$no = 0}}</div>
        	@foreach($hotels as $hotel)
          <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
            <div class="card">
               <a href="{{route('detail_hotel', $hotel->slug)}}"><img src="{{$hotel->gambar_hotel()}}" class="card-img-top" alt="gambar hotel"></a>
              <div class="card-body">
                <h5 class="card-title w-900 mb-0">{{$hotel->nama_hotel}}</h5>
                <img src="{{asset('site_/img/icon_star.png')}}" class="w-40 position-relative mb-3">
                <p class="card-text mb-0">{{$hotel->categorieshotel->negara}} ~ {{$hotel->kota}}</p>
                <div class="w-40 position-relative mb-3">
                	<i class="{{$icon[$no][0]}}"></i>
                	<i class="{{$icon[$no][1]}}"></i>
                	<i class="{{$icon[$no][2]}}"></i>
                	<i class="{{$icon[$no][3]}}"></i>
                </div>
                <p class="card-text mb-0">{{ Str::limit($hotel->alamat,48,'..') }}</p>
              </div>
            </div>
          </div>
         <div style="display: none;">{{$no++}}</div>
   		@endforeach

       

        </div>
      </div>
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link border-0 mr-5 bg-active rounded-circle text-white pt-2" href="#" aria-label="Previous">
            <i class="fas fa-backward"></i>
          </a>
        </li>
        <li class="page-item"><a class="page-link text-dark border-0 mx-2 py-2" href="#">1</a></li>
        <li class="page-item"><a class="page-link text-dark border-0 mx-2 py-2" href="#">2</a></li>
        <li class="page-item"><a class="page-link text-dark border-0 mx-2 py-2" href="#">...</a></li>
        <li class="page-item"><a class="page-link text-dark border-0 mx-2 py-2" href="#">9</a></li>
        <li class="page-item"><a class="page-link text-dark border-0 mx-2 py-2" href="#">10</a></li>
        <li class="page-item">
          <a class="page-link border-0 ml-5 bg-active rounded-circle text-white pt-2" href="#" aria-label="Next">
            <i class="fas fa-forward"></i>
          </a>
        </li>
      </ul>
    </nav>
</div>
@endsection