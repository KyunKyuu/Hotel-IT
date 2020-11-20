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
    <div class="modal fade" id="exampleModal{{$review->categorykamar->hotels->id, $review->categorykamar->kamar->gambar_kamar(), $review->categorykamar->hotels->nama_hotel}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
          <div class="modal-body">
          <form method="POST" action="{{ route('hotel.review') }}">
            @csrf
                <div class="text-center mt-4">
                  <h3 class="w-400">Review Hotel</h3>
                  <h2 class="font-family-assistant w-900">{{$review->categorykamar->hotels->nama_hotel}}</h2>
                  <img src="{{$review->categorykamar->kamar->gambar_kamar()}}">
                </div>
                <div class="row mt-4">
                  <div class="col-md-6 col-sm-6">
                    <h5 class="text-left modal-h5">Cleanliness</h5>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="rateyo" id="rating">
                      <input type="hidden" name="rating">
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <h5 class="text-left modal-h5">Comfort</h5>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="rateyo2" id="rating2">
                      <input type="hidden" name="rating2">
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <h5 class="text-left modal-h5">Service</h5>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="rateyo3" id="rating3">
                      <input type="hidden" name="rating3">
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <h5 class="text-left modal-h5">Location</h5>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="rateyo4" id="rating4">
                      <input type="hidden" name="rating4">
                    </div>
                  </div>  
                </div>
                <div class="row">
                  <div class="col-md-6 col-sm-6">
                    <h5 class="text-left modal-h5">Price</h5>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="rateyo5" id="rating5">
                    <input type="hidden" name="rating5">
                  </div>
                  </div>  
                </div>
                <input type="hidden" name="hotel_id" value="{{$review->categorykamar->hotels->id}}">
                <div class="mb-3 width-71 mt-3 mx-auto">
                  <label for="exampleFormControlTextarea1" class="form-label"><h5>Comment</h5></label>
                  <textarea name="comment" class="form-control pl-2" placeholder="Tell other users why you like this hotel so much" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="row mb-4">
                  <div class="col-md-6 col-xs-6">
                    <button type="button" class="btn btn-3 float-right px-5" data-dismiss="modal">Close</button>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <button name="btn-submit" class="btn btn-1 px-5 btn-submit">Submit</button>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
 @endforeach
@endif
<script type="text/javascript">
//   $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });


$(function () {
  // $(document).ready(function(){
  //   $("btn-submit").click(function(){
  //     $.post("{{ route('hotel.review') }}",
  //     {
  //       _method: 'POST',
  //       rating: $('input#rating').val(),
  //       rating2: $('input#rating2').val(),
  //       rating3: $('input#rating3').val(),
  //       rating4: $('input#rating4').val(),
  //       rating5: $('input#rating5').val(),
  //     },
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find("input[name=rating]").val(rating); //add rating value to input field
        });

        $(".rateyo2").rateYo().on("rateyo.change", function (e, data) {
            var rating2 = data.rating2;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating2 :'+ rating2);
            $(this).parent().find("input[name=rating2]").val(rating2); //add rating value to input field
        });

        $(".rateyo3").rateYo().on("rateyo.change", function (e, data) {
            var rating3 = data.rating3;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating3 :'+ rating3);
            $(this).parent().find("input[name=rating3]").val(rating3); //add rating value to input field
        });

        $(".rateyo4").rateYo().on("rateyo.change", function (e, data) {
            var rating4 = data.rating4;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating4 :'+ rating4);
            $(this).parent().find("input[name=rating4]").val(rating4); //add rating value to input field
        });

        $(".rateyo5").rateYo().on("rateyo.change", function (e, data) {
            var rating5 = data.rating5;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating5 :'+ rating5);
            $(this).parent().find("input[name=rating5]").val(rating5); //add rating value to input field
        });

      });

      // $(".btn-submit").click(function(e){
      
      //     e.preventDefault();
        
      //     var comment = $("textarea[name=comment]").val();
      //     var hotel_id = $("input[name=hotel_id]").val();
      //     var rating = $("input[name=rating").val();
      //     var rating2 = $("input[name=rating2").val();
      //     var rating3 = $("input[name=rating3").val();
      //     var rating4 = $("input[name=rating4").val();
      //     var rating5 = $("input[name=rating5").val();
          
      //     $.ajax({
      //         method:'POST',
      //         url:"{{ route('hotel.review') }}",
      //         data:{ 
      //               comment:comment, 
      //               hotel_id:hotel_id,
      //               rating:rating,
      //               rating2:rating2,
      //               rating3:rating3,
      //               rating4:rating4,
      //               rating5:rating5
      //             },
      //         success:function(data){
      //           alert(data.success);
      //         }
      //     });
      // });

</script>
@endsection
	
