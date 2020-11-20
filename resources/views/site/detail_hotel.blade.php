@extends('layouts/site_/main')

@section('title')
Detail {{$hotel->nama_hotel}}
@endsection

@section('navbar')
@include('layouts.site_.navbar2')
@endsection

@section('content')

<!-- Breadcrumb Area Start -->
     <div class=" background-breadcrumb"></div>

      <nav class="container mb-4" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-detail-kamar">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item" aria-current="page">Details</li>
           <li class="breadcrumb-item" aria-current="page">{{$hotel->nama_hotel}}</li>
        </ol>
      </nav>
    <!-- Breadcrumb Area End -->

    <div class="container-fluid">
        <div class="row">
          <div class="col-md-7 col-sm-12 ml-5 jumbotron">
            <div class="jumbotron-kamar">
              <h3 class="w-900">{{$hotel->nama_hotel}}</h3>
              <p class="w-200">{{$hotel->CategoriesHotel->negara}}, {{$hotel->kota}}</p>
               <div class="return">
                <img src="{{$hotel->gambar_hotel()}}" id="return-1" class="active">
                <img src="{{$hotel->gambar_hotel2()}}" id="return-2">
                <img src="{{$hotel->gambar_hotel3()}}" id="return-3">
                <img src="{{$hotel->gambar_hotel4()}}" id="return-4">
                <img src="{{$hotel->gambar_hotel5()}}" id="return-5">
              </div>

              <div class="row">
                <div class="col-2 jumbotron-kamar-img mt-2 jumbotron-img return-1 active">
                  <img src="{{$hotel->gambar_hotel()}}">
                </div> 
                <div class="col-2 jumbotron-kamar-img jumbotron-img mt-2 return-2">
                  <img src="{{$hotel->gambar_hotel2()}}">
                </div> 
                <div class="col-2 jumbotron-kamar-img jumbotron-img mt-2 return-3">
                  <img src="{{$hotel->gambar_hotel3()}}">
                </div> 
                <div class="col-2 jumbotron-kamar-img jumbotron-img mt-2 return-4">
                  <img src="{{$hotel->gambar_hotel4()}}">
               </div> 
               <div class="col-2 mt-2 jumbotron-kamar-img jumbotron-img mt-2 return-5">
                  <img src="{{$hotel->gambar_hotel5()}}">
                </div> 
              </div>

              <form action="{{route('reservasi')}}" method="get">
              @csrf

              <div class="booking detail-kamar" id="breadcrumb">
                <div class="chek-in row">
                  <div class="col-md-2 col-sm-6 input"> 
                    <h6>Tanggal Check In</h6>
                  {{-- Date liblary --}}
                  <input class="form-control @error('check_in') is-invalid @enderror" name="check_in" id="checkin" placeholder="Check-In" type="date" min="{{today()}}" 
                  readonly>
                    @error('check_in')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-2 col-sm-6 input">
                    <h6>Waktu Check In</h6>
                    <input type="time" name="waktu_check_in" class="form-control" min="{{now()}}" autocomplete="off">
                  </div>


                   <div class="col-md-2 col-sm-6 input">
                    <h6>Durasi Menginap</h6>
                   <input type="number" min="1" class="form-control @error('durasi') is-invalid @enderror" name="durasi" id="inputDurasi" placeholder="Durasi Malam">
                    @error('durasi')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-md-2 col-sm-6 input">
                    <h6>Check Out</h6>
                    <input id="tgl-checkout" class="form-control" aria-label="chek-out" readonly="">
                  </div>
                 
                  
                  <div class="col-md-2 col-sm-12 button-search">
                    <a href="#" class="btn btn-1 px-4 mt-3" >Search</a>
                  </div>  
                </div>
              </div>
               <div style="display: none;">{{$no= 0}}</div>
               @foreach($category as $ct)
              <div id="dtBox"></div>

                <div class="table-responsive-detail my-2 mt-5" id="kamar">
                <table class="table-detail-kamar table" border="1">
                    <tr>
                        <td>
                          <div class="table-text p-2">
                            <img src="{{$ct->kamar->gambar_kamar()}}" class="table-img mr-3 return-1 active">
                            <div class="detail-kamar">
                              <h4>{{$ct->nama_category}}</h4>
                              <div class="d-flex">
                                <i class="fa fa-users icon mr-1 ml-3"></i>
                                <p class="mt-1">Maks. {{$ct->kamar->kapasitas_kamar}} People</p>
                                
                              </div>
                              <div class="d-flex">
                                <i class="{{$icon[$no][0] }} icon mr-1 ml-3"></i>
                                <p class="mt-1">{{ $fasilitas[$no][0] }}</p>
                              </div>
                               <div class="d-flex">
                                <i class="{{$icon[$no][1] }} icon mr-1 ml-3"></i>
                                <p class="mt-1">{{ $fasilitas[$no][1] }}</p>
                              </div>
                               <div class="d-flex">
                                <i class="{{$icon[$no][2] }} icon mr-1 ml-3"></i>
                                <p class="mt-1">{{ $fasilitas[$no][2] }}</p>
                              </div>
                               <div class="d-flex">
                                <i class="{{$icon[$no][3] }} icon mr-1 ml-3"></i>
                                <p class="mt-1">{{ $fasilitas[$no][3] }}</p>
                              </div>

                            
                            </div>
                          </div>
                        </td>
                        <td>
                          <div class="table-text table-text-2 text-center">
                             @if($ct->diskon)
                              @if($ct->diskon->diskon_start <= Carbon\Carbon::now() && $ct->diskon->diskon_end >= Carbon\Carbon::now())
                              @if($ct->diskon->kode_diskon == null)
                              <h3 class="px-4 mx-3 w-900"> <span style="text-decoration: line-through;">${{$ct->harga}}</span></h3>
                              <h2 class="px-4 mx-3 w-900 text-danger">${{$harga[$no]}}</h2>
                              @elseif($ct->diskon->kode_diskon != null)
                              <h2 class="px-4 mx-3 w-900">${{$ct->harga}}</h2>
                              @endif
                               @else
                               <h2 class="pt-5 px-4 mx-3 w-900">${{$ct->harga}}</h2>
                               @endif
                              @elseif(!$ct->diskon) 
                              <h2 class="pt-5 px-4 mx-3 w-900">${{$ct->harga}}</h2>
                              @endif
                            <p class="px-3"><span class="w-200">per kamar, per malam <br></span>
                            Harga termasuk pajak</p>
                            <div class="row text-center">
                              <div class="col-md-12">
                            @if($stock[$no] == true)
                                <span class="btn btn-danger mt-2 ml-0" >Room is full</span>
                             @elseif($stock[$no] == false)
                                <button class="btn btn-1 mt-2 ml-0" type="submit" name="kamar_id" value="{{$ct->id}}" >Choose Room</button>
                             @endif
                              </div>
                            </div>
                          </div>
                        </td>
                    </tr>
                </table>
              </div>
              <div style="display: none;">{{$no++}}</div>
              @endforeach
            </form>
              <div class="hotel mt-5">
                <h4>Details Hotel {{$hotel->nama_hotel}}</h4>
                <div class="detail-kamar-hotel">
                  <div class="d-flex">
                    <p class="kamar-active">Street</p>
                    <p>{{$hotel->alamat}}</p>
                  </div>
                  <div class="d-flex">
                    <p class="kamar-active">Time Check-in Standard</p>
                    <p>13.00 The check-in time of the plan has greater priorty</p>
                  </div>
                  <div class="d-flex">
                    <p class="kamar-active">Time Check-out Standard</p>
                    <p>12.00 The check-out time of the plan has greater priorty</p>
                  </div>
                  <div class="d-flex">
                    <p class="kamar-active">Total Room</p>
                    <p>10 (Single: 5, Double: 6, Twin: 5, Suite: 3, The other: 0</p>
                  </div>
                  <div class="d-flex">
                    <p class="kamar-active">Total Building</p>
                    <p>30 Building</p>
                  </div>
                  <div class="d-flex">
                    <p class="kamar-active">Year of Renovation</p>
                    <p>2020</p>
                  </div>
                </div>
              </div>

              <!-- akhir jumbotron -->
            </div>
          </div>

          <div class="col-md-4 col-sm-12 grand-order pl-1">
            <div class="order bg-light">
              <div class="title-order text-center py-3">
                <h3>Fasilitas Favorit</h3>
              </div>
              <div class="row py-3 px-4">
                <div class="col-6 d-flex">
                  <i class="{{$icon_hotel[0]}} icon mr-1"></i>
                  <h6 class="mt-1">{{$fasilitas_hotel[0]}}</h6>
                </div>
                <div class="col-6 d-flex">
                   <i class="{{$icon_hotel[1]}} icon mr-1"></i>
                  <h6 class="mt-1">{{$fasilitas_hotel[1]}}</h6>
                </div>
                <div class="col-6 d-flex mt-3">
                   <i class="{{$icon_hotel[2]}} icon mr-1"></i>
                  <h6 class="mt-1">{{$fasilitas_hotel[2]}}</h6>
                </div>
                <div class="col-6 d-flex mt-3">
                   <i class="{{$icon_hotel[3]}} icon mr-1"></i>
                  <h6 class="mt-1">{{$fasilitas_hotel[3]}}</h6>
                </div>
                <div class="col-6 d-flex mt-3">
                   <i class="{{$icon_hotel[4]}} icon mr-1"></i>
                  <h6 class="mt-1">{{$fasilitas_hotel[4]}}</h6>
                </div>
                <div class="col-6 d-flex mt-3">
                   <i class="{{$icon_hotel[5]}} icon mr-1"></i>
                  <h6 class="mt-1">{{$fasilitas_hotel[5]}}</h6>
                </div>
              </div>
            </div>
            <button class="btn btn-1 btn-lg btn-order" onclick="window.location.href='#breadcrumb'">Order Now</button>
          </div>

        </div>
      </div>
      
       <div class="container review mt-5">
      <h2>Review Hotel {{ $hotel->nama_hotel }}</h2>
        @foreach ($reviews as $row)
        <div class="komentar p-4 mt-3">
          <div class="d-flex">
            <img src="{{$row->user->profile->gambar()}}" class="rounded-circle icon mt-1">&nbsp;
          <h4 class="nama-pengomentar pr-3">{{ $row->user->name }}</h4>
          <p class="mt-1 mb-0 pl-3">{{ $hotel->nama_hotel }}</p>
          </div>
          <div class="d-flex">
            <div class="float-left">
            <p>{{ $row->created_at->format("d F, Y") }} </p>
            </div>
            &middot;
            <div class="float-right">
              <p>9.0 / 10</p>
            </div>
          </div>
          <div class="isi-komentar">
            <p class="mb-0">{{ $row->isi_review }}</p>
 <!--            <a href="" class="text-primary">Selengkapnya</a> -->
          </div>
        </div>
        @endforeach
      </div>

      @endsection


@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js" integrity="sha512-rmZcZsyhe0/MAjquhTgiUcb4d9knaFc7b5xAfju483gbEXTkeJRUMIPk6s3ySZMYUHEcjKbjLjyddGWMrNEvZg==" crossorigin="anonymous"></script>
  <script>

  //  function getCheckout(elm){
  //   const durasi = elm.value;
  //   const tglCheckin = document.getElementById("checkin") 
  //   const tglCheckout = moment(tglCheckin).add(durasi, 'days').format("MM-DD-YYYY HH:mm");
  //   document.getElementById("tgl-checkout").innerText = tglCheckout;
  // };

  $("#inputDurasi").on('keyup', function() {
    let durasi = $(this).val()
    let tgl_ = $("#checkin").val().replace(new RegExp("-", "g"), '/')
    let indexTgl = tgl_.split('/')
    // let tgl = new Date(`${indexTgl[1]}/${indexTgl[0]}/${indexTgl[2]}`)
    let tgl = moment(`${indexTgl[1]}/${indexTgl[0]}/${indexTgl[2]}`)
    // tgl.setDate(tgl.getDate() + durasi);
    let checkOut = moment(tgl).add(durasi, 'days').format("DD-MM-YYYY");;
    // alert(checkOut)
    $("#tgl-checkout").val(checkOut)
    // var nextDayDate = $('#checkin').datepicker('getDate', `+${value}d`);
    // nextDayDate.setDate(nextDayDate.getDate() + 1);
    // $('#tgl-checkout').datepicker('setDate', nextDayDate);
  })
  

  // $("#iniInputan").on('keyup', function() {
  //   let value = $(this).val() // get value current object
  //   $("#iniIsiInputan").html(value)
  // })


</script>
@endsection
