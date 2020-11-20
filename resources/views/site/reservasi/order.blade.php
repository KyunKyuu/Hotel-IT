@extends('layouts/site_/main')

@section('title', 'Order Reservasi')

@section('navbar')
@include('layouts.site_.navbar')
@endsection

@section('content')
 <!-- breadcrumb -->
    <nav class="container my-4" aria-label="breadcrumb">
      <ol class="breadcrumb bg-transparent text-black breadcrumb-wishlist ml-0 pl-0">
        <li class="breadcrumb-item"><a href="../index.html" class="text-decoration-none">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="#" class="text-decoration-none">Personal Data</a></li>
      </ol>
    </nav>
    <!-- breadcrumb -->

    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-7">
          <h3 class="active">Detail Contact</h3>
          <div class="profil-jumbotron bg-white p-3">
            <div class="row">
              <div class="col-md-12">
                <h5 class="active w-300">Contact Name</h5>
                <input class="form-control personal-input pl-2 mb-0" value="{{$user->name}}" disabled="" type="text" aria-label="deafult input example">
                <p class="text-black-50">Fill in the name of the customer according to KTP / Passport / SIM (without punctuation / title)</p>
              </div>
              <div class="col-md-6">
                <h5 class="active w-300">Telephone Number</h5>
                <input class="form-control personal-input pl-2 mb-0" value="{{$user->profile->no_telpon}}" disabled="" type="number" aria-label="deafult input example">
                <p class="text-black-50">Example: +62812345678, for Country Code (+62) and No. Mobile 0812345678</p>
              </div>  
              <div class="col-md-6">
                <h5 class="active w-300">E-mail Address</h5>
                <input class="form-control personal-input pl-2 mb-0" disabled="" value="{{$user->email}}" type="email" aria-label="deafult input example">
                <p class="text-black-50">Example: email@example.com</p>
              </div>  
            </div>
          </div>
          <form action="{{route('reservasi_order')}}" method="post">
            @csrf
          <input type="hidden" name="id" value="{{$category->id}}">
          <input type="hidden" name="check_in" value="{{$check_in}}">
          <input type="hidden" name="check_out" value="{{$check_out}}">
          <input type="hidden" name="durasi" value="{{$durasi}}">
          <input type="hidden" name="jumlah" value="{{$jumlah}}">
          @if($category->diskon)
            @if($category->diskon->diskon_start <= Carbon\Carbon::now() && $category->diskon->diskon_end >= Carbon\Carbon::now())
             @if($category->diskon->kode_diskon == null)
             <input type="hidden" name="harga" value="{{session()->get('harga')['harga']}}">
             @elseif($category->diskon->kode_diskon != null)
             <input type="hidden" name="harga" value="{{session()->get('harga_diskon')['harga']}}">
             @endif
            @else
            <input type="hidden" name="harga" value="{{$harga_awal}}">
            @endif
          @else
             <input type="hidden" name="harga" value="{{$harga_awal}}">
          @endif
            
          <div class="profil-jumbotron bg-white p-3 mt-5 mb-5">
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox"  id="customer">
              <label class="form-check-label" for="customer">
                <p class="active mb-0">Same as customer</p>
              </label>
            </div>
            <div class="row">
              <div class="col-12">
                <h5 class="active w-300">Contact Name</h5>
                <input name="name_guest" class="form-control personal-input pl-2 mb-0" placeholder="Name" type="text" aria-label="deafult input example">
                <p class="text-black-50">Fill in the name of the customer according to KTP / Passport / SIM (without punctuation / title)</p>
              </div>
            </div>
              <h5 class="active w-300">Special request</h5>
              <p class="text-black-50">If you have a special request, you can fill in the options below</p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="smoke" value="smoke free" id="smoke">
                <label class="form-check-label" for="smoke">
                  <h6>Smoke free</h6>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox"name="upstair" value="upstair" id="upstair">
                <label class="form-check-label" for="upstair">
                  <h6>Upstairs</h6>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox"  name="rooms" value="rooms with connected doors" id="rooms">
                <label class="form-check-label" for="rooms">
                  <h6>Rooms with connected doors</h6>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="bed" value="bed type" id="bed">
                <label class="form-check-label" for="bed">
                 <h6>Bed type</h6>
                </label>
              </div>
              <div class="row">
              <div class="col-12">
                <h5 class="active w-300">Other Request</h5>
                <p class="text-black-50 mb-0">Please write clearly in English or local language</p>
                <input class="form-control personal-input pl-2 mb-3" name="other" placeholder="Write massage here..." type="text" aria-label="deafult input example">
                <button class="btn btn-1 float-right" type="submit">Continous</button>
              </div>
            </div>
          </div>
        </form>
        </div>
        <div class="col-md-12 col-lg-5 mb-5">
          <h3 class="active">Detail Order</h3>
          <div class="profil-jumbotron bg-white p-3">
              <div class="text-center bg-order p-2">
                <img src="{{$category->kamar->gambar_kamar()}}" class="rounded-circle p-3">
                <h3 class="w-900">{{$category->hotels->nama_hotel}} ~ {{$category->hotels->CategoriesHotel->negara}}</h3>
                <h6>{{$category->nama_category}}</h6>
                <h6>{{$jumlah}} Room ~ {{$category->kamar->kapasitas_kamar}} Guest ~ {{$durasi}} Night</h6>
              </div>
              <div class="d-flex mt-3">
                <h6>Check-in</h6>
                <h6 class="ml-auto">{{ $cek_in}}</h6>
              </div>
              <div class="d-flex">
                <h6>Check-out</h6>
                <h6 class="ml-auto">{{ $cek_out}}</h6>
              </div>
              <hr class="border-2px">
              @if($category->diskon)
              @if($category->diskon->diskon_start <= Carbon\Carbon::now() && $category->diskon->diskon_end >= Carbon\Carbon::now())
              @if($category->diskon->kode_diskon == null)
              <div class="d-flex">
                <h6>Harga Awal :</h6>
                <h6 class="ml-auto price"><span style="text-decoration: line-through;">${{$harga_awal}}</span></h6>
              </div>
                @if($category->diskon->type == 'persen')
                <div class="d-flex">
                  <h6>Diskon :</h6>
                  <h6 class="ml-auto price"><span style="text-decoration: line-through;">{{$category->diskon->diskon}}%</span></h6>
                </div>
                <div class="d-flex">
                  <h6><strong>Total Harga :</strong></h6>
                  <h6 class="ml-auto price"><strong>${{session()->get('harga')['harga']}}</strong></h6>
                </div>
                @elseif($category->diskon->type == 'potongan harga')
                <div class="d-flex">
                  <h6>Diskon :</h6>
                  <h6 class="ml-auto price"><span style="text-decoration: line-through;">${{$category->diskon->diskon}}</span></h6>
                </div>
                <div class="d-flex">
                  <h6><strong>Total Harga :</strong></h6>
                  <h6 class="ml-auto price"><strong>${{session()->get('harga')['harga']}}</strong></h6>
                </div>
                @endif
              @elseif($category->diskon->kode_diskon != null)
               @if(session()->has('diskon'))
               <div class="d-flex">
                <h6>Harga Awal :</h6>
                <h6 class="ml-auto price"><span style="text-decoration: line-through;">${{$harga_awal}}</span></h6>
              </div>
               <div class="d-flex">
                  <h6>Diskon({{session()->get('diskon')['name']}}) :</h6>
                  <h6 class="ml-auto price">${{session()->get('diskon')['diskon']}}</h6>
                </div>
              <form  action="{{route('delete_diskon')}}" method="post">
               @csrf
               @method('delete')
              <button type="submit">Remove Diskon</button>
              </form> 
              <div class="d-flex">
                  <h6><strong>Total Harga :</strong></h6>
                  <h6 class="ml-auto price"><strong>${{session()->get('harga_diskon')['harga']}}</strong></h6>
              </div>
              @endif
            @if(!session()->has('diskon'))
              <form action="{{route('apply_diskon')}}" method="get">
              @csrf
              <input type="hidden" name="kamar_id" value="{{$category->id}}">
              <input type="hidden" name="harga_awal" value="{{$harga_awal}}"></input>
              <div class="d-flex">
                  <h6>Have a voucher discount? :</h6>
                  <input type="text" checked="card-text" name="kode_diskon">
                  <button class="ml-auto price" type="submit">Apply</button>
              </div>
              </form>
              <div class="d-flex">
                  <h6><strong>Total Harga :</strong></h6>
                  <h6 class="ml-auto price"><strong>${{session()->get('harga')['harga']}}</strong></h6>
              </div>
              @endif
              @endif

          @else
             <div class="d-flex">
                  <h6><strong>Total Harga :</strong></h6>
                  <h6 class="ml-auto price"><strong>${{session()->get('harga')['harga']}}</strong></h6>
            </div>
          @endif
          @elseif(!$category->diskon) 
             <div class="d-flex">
                  <h6><strong>Total Harga :</strong></h6>
                  <h6 class="ml-auto price"><strong>${{session()->get('harga')['harga']}}</strong></h6>
            </div>
          @endif  
          </div>
        </div>  
      </div>
    </div>
@endsection