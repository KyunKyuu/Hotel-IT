@extends('layouts/site_/main')

@section('title', 'About Hotel')

@section('navbar')
@include('layouts.site_.navbar5')
@endsection

@section('content')

         <!-- header -->
        <div class="cover-about">
          <div class="row">
            <div class="col-lg-6 col-md-6 p-5">
              <div class="about-text">
                <h1 class="diplay-1">About Us</h1>
                <p>Our customer use us to design their organisational structure build their executive team, recruit rare skillsets nurture specific talent pools and architect their talent strategy.</p>
                <p>We have a track record of building competitive advantage scale and digital led thinking for our customers through the creation of high performing executive, leadership, technology, product and growth functions.</p>
                <div class="d-flex">
                <button class="btn btn-1 mr-3">Contact Me</button>
                <button class="btn btn-3"><p class="active mb-0">Learn More</p></button>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 p-5 p-sm-3">
              <div class="about-img">
                <img src="{{asset('site_/img/about-foto.png')}}">
                <div class="w-80 ml-auto">
                  <img src="{{asset('site_/img/ic_1.png')}}" class="w-50 mt-n6">
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- header -->
  
      <div class="container p-5 p-sm-3">
        <div class="p-5 p-sm-3">
          <h1>Client & Partners</h1>
          <div class="pr-5 pr-sm-0">
            <button class="btn btn-1 float-right ">Contact Me</button>
          </div>
          <p class="w-50">I've worked for some great clients & partners from all <br> over the world. they aren't any trophies, they're <br> friends i've met over the years.</p>
          <div class="row mt-3">
            <div class="col-md-3 mt-5">
              <img src="{{asset('site_/img/anal.png')}}">
              <p>the first digital health insurance that makes your life easier</p>
            </div>
            <div class="col-md-3 mt-5">
              <img src="{{asset('site_/img/disney.png')}}">
              <p>Disney Plan is a learing Experience platform, which address itself to enterprise</p>
            </div>
            <div class="col-md-3 mt-5">
              <img src="{{asset('site_/img/super.png')}}" class="w-50 mx-5 mx-sm-3 mx-sm-6">
              <p class="mt-3">Fintory builds digital products and cares about accessible</p>
            </div>
            <div class="col-md-3 mt-5">
              <img src="{{asset('site_/img/visa.png')}}">
              <p>Visa Partner converts online marketing into sustainable profit</p>
            </div>
          </div>
        </div>
      </div>

@endsection