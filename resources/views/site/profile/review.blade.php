@extends('layouts/site_/main')

@section('title', 'Review Room')

@section('navbar')
@include('layouts.site_.navbar4')
@endsection

@section('content')
	
        <div class="container-fluid">
          
	
		@if($reviews->isEmpty())
			<div class="container text-center mt-4">
      <div class="jumbotron-review px-4 py-3">
        <div class="form-check d-flex">
          <input class="form-check-input mr-2" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label active" for="flexCheckDefault">
            Hotel
          </label>
          <h5 class="active center-text-line mb-0">Give Your Best Review</h5>
        </div>
      </div>
    </div>

    <div class="text-center not-found mt-5">
      <img src="{{asset('site_/img/ic_human.png')}}">
      <h4 class="active my-3">Your Hotel comment is empty</h4>
      <a class="btn btn-1 review-button" href="{{route('popular')}}">Book Your Hotel Now</a>
    </div>
		@elseif($reviews)
			<div style="display: none;">{{$no = 0}}</div>
			@foreach($reviews as $review)
	<div class="container my-2 mt-5 px-5">
        <table class="table-review table" border="1">
            <tr>
                <td>
                  <div class="table-text p-2">
                    <img src="{{$review->categorykamar->kamar->gambar_kamar()}}" class="table-img mr-3 mb-1">
                    <div class="table-mid">
                      <div class="d-flex">
                        <h5 class="w-900">{{$review->categorykamar->nama_category}}</h5>
                        <img src="{{asset('site_/img/icon_star.png')}}" class="icon-star-2 mt-0 ml-4">
                      </div>
                      <p class="mb-2">{{$review->categorykamar->hotels->nama_hotel}}</p>
                      <p class="mb-2">{{$review->categorykamar->hotels->categorieshotel->negara}}, {{$review->categorykamar->hotels->kota}}</p>
                      
                      <buttton class="btn btn-1 btn-review px-5 ml-auto float-right mr-4" data-toggle="modal" data-target="#exampleModal{{$review->categorykamar->hotels->id, $review->categorykamar->kamar->gambar_kamar(), $review->categorykamar->hotels->nama_hotel}}">Comment</buttton>
                      <div class="fasilitas mb-2"> 
                      <i class="{{$icon[$no][0]}}"></i>;<i class="{{$icon[$no][1]}}"></i>
                      <i class="{{$icon[$no][2]}}"></i>;<i class="{{$icon[$no][3]}}"></i>
                      </div>
                      <p>9.0 The best</p>
                      <p class="mb-0">Terletak di {{$review->categorykamar->hotels->alamat}}</p>
                    </div>
                  </div>
                </td>
            </tr>
        </table>
      </div>
      <div style="display: none;">{{$no++}}</div>

		<!-- Modal -->
      <form action="{{route('hotel_review')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$review->categorykamar->hotels->id}}">
      <div class="modal fade" id="exampleModal{{$review->categorykamar->hotels->id, $review->categorykamar->kamar->gambar_kamar(), $review->categorykamar->hotels->nama_hotel}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
          <div class="modal-content">
            <div class="modal-body">
              <div class="text-center mt-4">
                <h3 class="w-400">Review Hotel</h3>
                <h2 class="font-family-assistant w-900">{{$review->categorykamar->hotels->nama_hotel}}</h2>
                <img src="{{$review->categorykamar->kamar->gambar_kamar()}}">
              </div>
                <div class="col-md-6 col-sm-6">
                  <h5 class="text-left modal-h5">Cleanliness</h5>
                </div>
              <form id="rating" class="rating">
                @csrf
                <div class="col-md-6 col-sm-6">
                  <div class="d-flex rating-clean">
                    <div class="icon mr-2 1-star"></div>
                    <div class="icon mr-2 2-star"></div>
                    <div class="icon mr-2 3-star"></div>
                    <div class="icon mr-2 4-star"></div>
                    <div class="icon mr-2 5-star"></div>
                    <div class="6-star"></div>
                  </div>
                </form>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <h5 class="text-left modal-h5">Comfort</h5>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="d-flex rating-comfort">
                    <div class="icon mr-2 1-star"></div>
                    <div class="icon mr-2 2-star"></div>
                    <div class="icon mr-2 3-star"></div>
                    <div class="icon mr-2 4-star"></div>
                    <div class="icon mr-2 5-star"></div>
                    <div class="6-star"></div>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <h5 class="text-left modal-h5">Service</h5>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="d-flex rating-service">
                    <div class="icon mr-2 1-star"></div>
                    <div class="icon mr-2 2-star"></div>
                    <div class="icon mr-2 3-star"></div>
                    <div class="icon mr-2 4-star"></div>
                    <div class="icon mr-2 5-star"></div>
                    <div class="6-star"></div>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <h5 class="text-left modal-h5">Location</h5>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="d-flex rating-location">
                    <div class="icon mr-2 1-star"></div>
                    <div class="icon mr-2 2-star"></div>
                    <div class="icon mr-2 3-star"></div>
                    <div class="icon mr-2 4-star"></div>
                    <div class="icon mr-2 5-star"></div>
                    <div class="6-star"></div>
                  </div>
                </div>  
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <h5 class="text-left modal-h5">Price</h5>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="d-flex rating-price">
                    <div class="icon mr-2 1-star"></div>
                    <div class="icon mr-2 2-star"></div>
                    <div class="icon mr-2 3-star"></div>
                    <div class="icon mr-2 4-star"></div>
                    <div class="icon mr-2 5-star"></div>
                    <div class="6-star"></div>
                  </div>
                </div>  
              </div>
              <div class="mb-3 width-71 mt-3 mx-auto">
                <label for="exampleFormControlTextarea1" class="form-label"><h5>Comment</h5></label>
                <textarea name="comment" class="form-control pl-2" placeholder="Tell other users why you like this hotel so much" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="row mb-4">
                <div class="col-md-6 col-xs-6">
                  <button type="button" class="btn btn-3 float-right px-5" data-dismiss="modal">Close</button>
                </div>
                <div class="col-md-6 col-xs-6">
                  <button type="submit" name="submit" class="btn btn-1 px-5">Submit</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
 @endforeach
@endif
</div>
@endsection
	
