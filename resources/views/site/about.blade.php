@extends('layouts/site_/main')

@section('title', 'About Hotel')

@section('navbar')
@include('layouts.site_.navbar')
@endsection

@section('content')

<!-- header -->
      <div class="cover-about">
        <div class="container-fluid text-center">
          <div class="cover-text-about text-center">
            <!-- <div class="pemisah-besar"></div> -->
            <h1>ABOUT US</h1>
            <h4 class="h4 my-3">We are always be there for you</h4>
          </div>
          <img src="{{asset('site_/img/about-cover.png')}}">
        </div>
      </div>
    </div>
    <!-- header -->

    <div class="container content-about my-5">
      <div class="row">
    <!-- why choose us -->
        <div class="col-md-4 text-center left-about">
          <h2>Why Chose Us ?</h2>
          <hr class="hr-about"></hr>
          <p class="my-3">We have advantages and also many benefits for esteemed clients.</p>
          <img src="{{asset('site_/img/about-1.png')}}" class="mt-4">
        </div>
    <!-- why choose us -->
    <!-- description -->
        <div class="col-md-4 text-center left-about">
          <h2>Description</h2>
          <hr class="hr-about"></hr>
          <p class="my-3">This site can help you or makes it easy for u wherever you are.</p>
          <img src="{{asset('site_/img/about-2.png')}}" class="mt-4">
        </div>
    <!-- description -->
    <!-- history -->
        <div class="col-md-4 text-center left-about">
          <h2>History</h2>
          <hr class="hr-about"></hr>
          <p class="my-3">This website was founded in Indonesia in 2020 which focuses on the field of simple online hotel booking technology</p>
          <img src="{{asset('site_/img/about-3.png')}}">
        </div>
    <!-- history -->
      </div>
    </div>
    
    <!-- network -->
    <div class="network">
      <div class="container text-center">
        <h2 class="my-5">Network</h2>
        <img src="../img/partner.png">
        <hr class="hr-about-2 mt-4"></hr>
      </div>
    </div>
    <!-- network -->
    <!-- hotel recommendations in our opinion -->
    <div style="display: none;">{{$no = 0}}</div>
    <div class="top-hotel-about text-center my-5">
      <div class="container">
        <h2 class="my-5">Recommendations Hotel <br> In Our Opinion</h2>
        <div class="row">
        	@foreach($hotel as $ht)
          <div class="col-md-3 col-sm-4 col-xs-6 filterDiv Indonesia active" id="Indonesia">
            <div class="card bg-dark text-white text-center">
              <img src="{{$ht->gambar_hotel()}}" class="card-img" alt="Gambar Hotel">
              <div class="card-img-overlay">
                <h5 class="card-title h5">{{$ht->categoriesHotel->negara}}</h5>
                <h3 class="card-text h3">{{$ht->nama_hotel}}</h3>
                <p class="card-text py-6 p">Start from ${{$harga[$no]['harga']}}/day</p>
                <img src="{{asset('site_/img/icon_bintang.png')}}">
                 <a href="{{route('detail_hotel', $ht->slug)}}" class="btn btn-1">View Detail</a>
              </div>
            </div>
          </div>
          <div style="display: none;">{{$no++}}</div>
          @endforeach
        </div>
      </div>
    </div>

@endsection