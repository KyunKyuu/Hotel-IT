@extends('layouts/site/main')

@section('title', 'teguhh')

@section('content')

<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Hotel</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hotel</li>
                                <li class="breadcrumb-item active" aria-current="page">{{$category->negara}}</li>
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
                	@foreach($hotel as $ht)
                    <!-- Single Room Area -->
                    <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Room Thumbnail -->
                        <div class="room-thumbnail">
                            <img src="{{$ht->gambar_hotel()}}" alt="">
                        </div>
                        <!-- Room Content -->
                        <div class="room-content">
                            <h2>{{$ht->nama_hotel}}</h2>
                            <h6 style="color: black;">{{$ht->CategoriesHotel->negara}} - {{$ht->kota}}</h6>
                            <h4>200 Rp<span>/ Day</span></h4>
                            <div class="room-feature">
                                <h6>Fasilitas: <span>{{ Str::limit($ht->fasilitas, 30, '..') }}</span></h6>
                               
                               
                                
                            </div>
                            <a href="{{route('detail_hotel', $ht->slug)}}" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    @endforeach

                    <!-- Pagination -->
                      {{$hotel->links()}}
                    
                </div>


                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->

   


@endsection