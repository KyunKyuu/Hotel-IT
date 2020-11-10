@extends('layouts/site_/main')

@section('title')
Hotel {{$category->negara}} - {{$kota->kota}}
@endsection

@section('navbar')
@include('layouts.site_.navbar2')
@endsection

@section('content')

<div class=" background-breadcrumb-detail"></div>
    <form action="{{route('hotel')}}" method="get">
      @csrf
      <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-detail">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item " aria-current="page">Detail Hotel</li>
          <li class="breadcrumb-item" aria-current="page"><button  type="submit" name="negara" value="{{$category->negara}}">{{$category->negara}}</button></li>
         <li class="breadcrumb-item active" aria-current="page">{{$kota->kota}}</li>
        </ol>
      </nav>
  </form>
<form action="{{route('hotel_city')}}" method="get">
@csrf
<div class="booking booking-detail container">
        <div class="container-fluid row chek-in">
            <div class="col-md-2 col-sm-12 col-xs-6 input">
              <h5>City</h5>
              <input class="form-control form-control-lg" type="text" placeholder="{{$kota->kota}}" name="kota" >
              <input type="hidden" name="negara" value="{{$category->negara}}">
            </div>
            <div class="col-md-2 col-sm-12 col-xs-6 input">
              <h5>Check Out</h5>
              <input class="form-control form-control-lg" type="date" placeholder="Chek Out" aria-label="chek-out">
            </div>
          <div class="col-md-2 col-sm-12 select">
            <h5>Guest</h5>
            <select class="form-select form-select-lg" aria-label="Default select example">
              <option selected>Guest</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="col-md-2 col-sm-12 select">
            <h5>Room</h5>
            <select class="form-select form-select-lg" aria-label="Default select example">
              <option selected>Room</option>
              <option value="1">Business Room</option>
              <option value="2">Delux Room</option>
              <option value="3">Suites Room</option>
              <option value="4">Vip Room</option>
            </select>
          </div>
          <div class="col-md-2 col-sm-12 button-search">
            <button class="btn btn-1 btn-lg px-5" type="submit" data-target="#top-hotel">Search</button>
          </div>  
        </div>
      </div>
    </form>

      <div style="display: none;">{{$no = 0}}</div>
      @foreach($hotel as $ht)
      <div class="table-responsive container my-2 mt-5">
        <table class="table-detail table" border="1">
            <tr>
                <td>
                  <div class="table-text p-2">
                    <img src="{{$ht->gambar_hotel()}}" class="table-img mr-3 img-responsive" >
                    <img src="{{asset('site_/img/icon_star.png')}}" class="icon-star mr-5">
                    <div class="table-mid">
                      <h4>{{$ht->nama_hotel}}</h4>
                      <p>{{$ht->CategoriesHotel->negara}}, {{$ht->kota}}</p>
                      <p>Free Wifi</p>
                      <div class="mb-2">
                        <i class="{{$icon[$no][0]}}"></i>
                        <i class="{{$icon[$no][1]}}"></i>
                        <i class="{{$icon[$no][2]}}"></i>
                      </div>
                      <p>9.0 The best</p>
                      <p>Terletak di {{$ht->alamat}}</p>
                    </div>
                  </div>
                </td>
                <td>

                  <div class="table-text table-text-2 text-center">
                    <h1 class="pt-3 px-5">${{$harga[$no]['harga']}}</h1>
                    <p class="px-5">per kamar, per malam <br>
                    Harga termasuk pajak</p>
                    <div class="row text-center">
                      @auth
                       @if(auth()->user()->role == 'tamu')
                      <div class="col-md-12">
                        <a href="{{route('create_whislist', $ht->id)}}" class="btn btn-1 px-3 ml-4">
                          <i class="fas fa-shopping-cart pr-1"></i>
                          Wishlist
                        </a>
                      </div>
                        @endif
                       @endauth
                      <div class="col-md-12">
                        <a class="btn btn-1 mt-2 ml-4" href="{{route('detail_hotel', $ht->slug)}}">Choose Hotel</a>
                      </div>
                    </div>
                  </div>
                </td>
            </tr>
        </table>
      </div>
      <div style="display: none;">{{$no++}}</div>
      @endforeach

  @endsection

      