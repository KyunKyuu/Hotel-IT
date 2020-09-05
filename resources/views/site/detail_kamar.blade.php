@extends('layouts/site_/main')

@section('title', 'teguhh')

@section('content')

<!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Detail Kamar</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Hotel</li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Kamar</li>
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
                    
                    <h3>{{$hotel->nama_hotel}} - {{$kamar->nama_category}}</h3>

                    <img src="{{$kamar->kamar->gambar_kamar()}}" sizes="200">
                    {!! $kamar->kamar->content !!}
                @if($kamar->kamar->jumlah_kamar == $kamar->kamar->jumlah_kamar_terisi)
                <h4 style="color: red">Kamar PENUHHH</h4>
                @else
                    <form action="{{route('reservasi', $kamar->id)}}" method="post">
                    @csrf
                        <br>
                        <label for="in">Masukan Tanggal Check in</label>
                        <input class="form-control @error('check_in') is-invalid @enderror" type="datetime-local" min="{{today()}}" name="check_in" id="in">&nbsp;
                        @error('check_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                        <br>
                        <label for="out">Masukan Tanggal Check out</label>
                        <select class="form-control" name="malam">
                            <option value="1">1 malam</option>
                            <option value="2">2 malam</option>
                            <option value="3">3 malam</option>
                        </select>
                        <br>
                        <br>
                        <label for="jumlah">Jumlah Kamar</label>
                        <input class="form-control @error('jumlah') is-invalid @enderror" type="number" min="1" max="{{$jumlah}}" name="jumlah" id="jumlah">
                        @error('jumlah')
                         <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
                        <button type="submit">Booking</button>
                    </form>
               @endif     

                </div>
                


                           
                        
                    </div>
                </div>
            </div>
      
    <!-- Rooms Area End -->

   


@endsection