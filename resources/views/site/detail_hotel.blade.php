@extends('layouts/site/main')

@section('title', 'teguhh')

@section('content')

<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Detail Hotel</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hotel</li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Hotel</li>
                            </ol>
                        </nav>
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
                    <img src="{{$hotel->gambar_hotel()}}">
                    <h3>{{$hotel->nama_hotel}}</h3>
                    <h5>{{$hotel->CategoriesHotel->negara}} - {{$hotel->kota}} - {{$hotel->alamat}}</h5>
                    <h6>{!! $hotel->content !!}</h6>

                </div>
                <div class="col-12 col-lg-8">
                    @foreach($category as $ct)
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="{{$ct->kamar->gambar_kamar()}}" alt="gambar kamar">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>{{$ct->nama_category}}</h2>
                            <h4>{{$ct->harga}}<span>/ Day</span></h4>
                           <i class="{{implode(" ",json_decode($ct->kamar->fasilitas_kamar, TRUE))}}"></i>
                            <div class="room-feature">
                                <h6>{{$ct->kamar->status_kamar}}</span></h6>
                            </div>
                            <a href="{{route('detail_kamar', $ct->slug)}}" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    @endforeach

                    <!-- Pagination -->
                      {{$category->links()}}
                    
                </div>


                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->

   


@endsection

