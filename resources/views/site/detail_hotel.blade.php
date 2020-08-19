@extends('layouts/site/main')

@section('title', 'teguhh')

@section('content')


    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{asset('site/img/bg-img/16.jpg')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcrumb-content d-flex align-items-center justify-content-between pb-5">
                        <img src="{{$hotel->gambar_hotel()}}" width="200">
                        <h2 class="room-title">{{$hotel->nama_hotel}}  |</h2> 
                        <h4 class="room-title">{{$hotel->CategoriesHotel->negara}} - {{$hotel->kota}}<h4><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                 @foreach($category as $ct)
                    <h3>{{$ct->nama_category}}</h3>
                    <hr>
                    <h2>Deskripsi Kamar</h2>
                    <h3>{{$ct->kamar->kode_kamar}}</h3>
                  <img src="{{$ct->kamar->gambar_kamar()}}" width="100">
                  <br>
                 @endforeach
                
                 
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->



@endsection