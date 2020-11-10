@extends('layouts/site_/main')

@section('title')
Hotel {{$category->negara}}
@endsection

@section('navbar')
@include('layouts.site_.navbar2')
@endsection

@section('content')

<div class=" background-breadcrumb-detail"></div>
      <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-detail">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item " aria-current="page">Detail Hotel</li>
         <li class="breadcrumb-item active" aria-current="page">{{$category->negara}}</li>
        </ol>
      </nav>
<form action="{{route('hotel_city')}}" method="get">
@csrf
<div class="booking booking-detail container">
        <div class="container-fluid row chek-in">
            <div class="col-lg-3 col-md-4 col-sm-12 select select-2">
              <input class="form-control form-control-lg" placeholder="Searcht City" name="kota">
              <input type="hidden" name="negara" value="{{$category->negara}}">
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 input">
              <input class="form-control form-control-lg" data-field="date" placeholder="Check-Out" data-format="dd-MM-yyyy" readonly>
            </div>
          <div class="col-lg-3 col-md-4 select select-2">
            <select class="form-select form-select-lg" aria-label="Default select example">
              <option selected>Guest</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="col-md-3 col-sm-12 button-search">
            <button class="btn btn-1 btn-lg" type="submit" >Search</button>
          </div>  
        </div>
      </div>
      <div id="dtBox"></div>
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
                        <i class="{{$icon[$no][3]}}"></i>
                      </div>
                      <p>9.0 The best</p>
                      <p class="mb-0">Terletak di {{$ht->alamat}}</p>
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

      