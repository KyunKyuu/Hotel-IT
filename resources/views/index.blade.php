
@extends('layouts/site_/main')

@section('title', 'hotel')

@section('navbar')
@include('layouts.site_.navbar')
@endsection

@section('content')

   
      <!-- header -->
      <div class="cover">
        <div class="container-fluid text-center">
          <div class="cover-text text-center">
            <!-- <div class="pemisah-besar"></div> -->
            <h1 class="h1">Discover Your Right <br> Place With Us</h1>
            <p class="p">Kamu akan melihat moment indah <br> Yang tidak pernah kamu lihat sebelumnya</p>
            <div class="pt-costum">
              <button class="btn btn-1 button-1" onclick="window.location.href='#top-hotel'">Get Started</button>
            </div>
           <form action="{{route('hotel')}}" method="get">
            @csrf
            <div class="booking">
              <div class="container-fluid row chek-in">
                <div class="col-md-3 col-sm-12 select index-select">
                  <select name="negara" class="form-select form-select-lg" aria-label="Default select example">
                    <option selected disabled="">Country</option>
                    @foreach($negara as $ngr)
                    <option value="{{$ngr->negara}}">{{$ngr->negara}}</option>
                    @endforeach
                  </select>
                </div>
               <div class="col-md-3 col-sm-6 col-xs-6 input index-select">
                  <input class="form-control form-control-lg" data-field="date" placeholder="Check-in" data-format="dd-MM-yyyy" readonly>
                </div>
                 <div class="col-md-3 col-sm-6 col-xs-6 input index-select">
                  <input class="form-control form-control-lg" data-field="text" placeholder="Guest" name="guest">
                </div>
                <div class="col-md-3 col-sm-12 button-search button-search-index">
                  <button class="btn btn-1 btn-lg px-5" type="submit">Search</button>
                </div> 
              </div>
            </div>
          </form> 
          </div>
          <img src="{{asset('site_/img/header.png')}}">
        </div>
      </div>
   </div>
    <div id="dtBox"></div>
    <!-- header -->

    <!-- Top Destination -->
    <div class="container top-destination row">
      <div class="col-md-6 col-sm-6">
        <h2 class="top-destination-judul">Top Destination</h2>
        <hr class="hr"></hr>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="btn-group top-destination-button" aria-label="button groups" id="myBtnContainer">
          @foreach($negara as $ngr)
          <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" class="btn btn-2 active" id="btn-ind">{{$ngr->negara}}</button>
          </div>
          @endforeach
        </div>
      </div>
    </div>

     <!-- <div class="pemisah"></div> -->
    <div class="container">
      
    </div
   {{--  <!-- <div class="pemisah-sedang"></div> --> --}}
    
        <div style="display: none;">{{$no = 0}}</div>
   <div class="container top-hotel text-center">
      <div class="row">
        @foreach($hotel as $ht)
        <div class="col-md-3 col-sm-4 filterDiv Indonesia active" id="Indonesia">
          <div class="card bg-dark text-white text-center">
            <img src="{{$ht->gambar_hotel()}}" class="card-img" alt="gambar hotel">
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
 
    <!-- Top Destination -->

    <div class="pemisah-sedang"></div>

    <!-- Top Destination -->

    <div class="pemisah-sedang"></div>

    <!-- Accommodations -->
    <div class="container accommodations">
      <h2>Accommodations</h2>
      <hr class="hr-2">
        <div class="room">
          <div id="carouselControls" class="carousel slide" data-ride="carousel" data-interval="false">
            <a class="control-next" class="disable" href="#carouselControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <a class="control-prev" href="#carouselControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <div class="carousel-inner" align="center">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4 col-sm-6 img-carousel img-carousel1"><img src="{{asset('site_/img/room-1.jpg')}}" class="d-block w-100" alt="Business Room">
                    <h3 class="carousell-title ml-6">Business Room</h3>
                  </div>
                  <div class="col-md-4 col-sm-6 img-carousel img-carousel2"><img src="{{asset('site_/img/room-2.jpg')}}" class="d-block w-100" alt="Delux Room">
                    <h3 class="carousell-title">Delux Room</h3>
                  </div>
                  <div class="col-md-4 col-sm-12 img-carousel img-carousel3"><img src="{{asset('site_/img/room-3.jpg')}}" class="d-block w-100" alt="Suites Room">
                    <h3 class="carousell-title my-6">Suites Room</h3>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-4 col-sm-6 img-carousel img-carousel1"><img src="{{asset('site_/img/room-1.jpg')}}" class="d-block  w-100" alt="Business Room">
                    <h3 class="carousell-title ml-6">Business Room</h3>
                  </div>
                  <div class="col-md-4 col-sm-6 img-carousel img-carousel2"><img src="{{asset('site_/img/room-2.jpg')}}" class="d-block w-100" alt="Delux Room">
                    <h3 class="carousell-title">Delux Room</h3>
                  </div>
                  <div class="col-md-4 col-sm-12 img-carousel img-carousel3"><img src="{{asset('site_/img/room-3.jpg')}}" class="d-block w-100" alt="Suites Room">
                    <h3 class="carousell-title my-6 ml-7 pl-3">Vip Room</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- Accommodations -->

    <div class="pemisah-sedang"></div>

     <!-- network -->
    <div class="network">
      <div class="container text-center">
        <h2>Our Network</h2>
        <p>Persuhaan yang mempercayai <br> kami lebih dari siapapun</p>
        <img src="{{asset('site_/img/partner.png')}}">
      </div>
    </div>
    <!-- network -->

    <div class="pemisah-sedang"></div>

    <!-- client say about us -->
    <div class="client">
      <div class="container">
        <h2>Client Say About US</h2>
        <hr class="hr-2"></hr>
        <div class="clientControls">
          <section>
            <a class="control-next" role="button" id="next">
              <span class="carousel-control-next-icon-client" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <a class="control-prev" role="button" id="prev">
              <span class="carousel-control-prev-icon-client" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
          </section>
          <div class="row">
            <div class="col-md-5 client-item active" id="client-item1">
              <img src="{{asset('site_/img/avatar-1.jpg')}}">
              <h3 class="name">Celine Gion</h3>
              <h5>Progammer</h5>
              <div class="icon-client">
                <i class="fas fa-quote-right"></i>
              </div>
              <div class="pemisah"></div>
              <p>"Sangat menyenangkan bisa berlibur ke negara China menggunakan jasa website ini, pelayanan sangat baik dan ramah, pokonya bintang 5 deh ehehehe."</p>
            </div>
            <div class="col-md-5 client-item active" id="client-item2">
              <img src="{{asset('site_/img/avatar-2.jpg')}}">
              <h3 class="name">Herdian Nuryansyah</h3>
              <h5>UI/UX Desainer</h5>
              <div class="icon-client">
                <i class="fas fa-quote-right"></i>
              </div>
              <div class="pemisah"></div>
              <p>"Pengalaman yang sangat menyenangkan bisa pergi ke bali bersama keluarga dan rekan-rekan kerja"</p>
            </div>

            <div class="col-md-5 client-item" id="client-item4">
              <img src="{{asset('site_/img/avatar-2.jpg')}}">
              <h3 class="name">Herdian Nuryansyah</h3>
              <h5>UI/UX Desainer</h5>
              <div class="icon-client">
                <i class="fas fa-quote-right"></i>
              </div>
              <div class="pemisah"></div>
              <p>"Pengalaman yang sangat menyenangkan bisa pergi ke bali bersama keluarga dan rekan-rekan kerja"</p>
            </div>
            <div class="col-md-5 client-item" id="client-item3">
              <img src="{{asset('site_/img/avatar-1.jpg')}}">
              <h3 class="name">Celine Gion</h3>
              <h5>Progammer</h5>
              <div class="icon-client">
                <i class="fas fa-quote-right"></i>
              </div>
              <div class="pemisah"></div>
              <p>"Sangat menyenangkan bisa berlibur ke negara China menggunakan jasa website ini, pelayanan sangat baik dan ramah, pokonya bintang 5 deh ehehehe."</p>
            </div>
          </div>


          <div class="row">

          </div>
        </div>
      </div>
    </div>
    <!-- client say about us -->

    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-6 col button-client-left">
          <button class="btn btn-3 btn-lg">I Need Help</button>
        </div>
        <div class="col-md-6 col-sm-6 col button-client-right">
          <button class="btn btn-1 btn-lg button-1" onclick="window.location.href='#top-hotel'">Get Started</button>
        </div>
      </div>
    </div>

    
  @endsection