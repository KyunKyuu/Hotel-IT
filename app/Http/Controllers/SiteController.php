<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Kamar,Hotel,CategoryHotel,CategoryKamar};
class SiteController extends Controller
{
   public function home()
   {
      $negara = CategoryHotel::get();
      $hotel = Hotel::get();
   	return view('site.home', compact('negara', 'hotel'));
   }

   public function hotel(Request $request)
   {
      // if ($request == null) {
      //       return redirect()->back();
      //    } else {
      $category = CategoryHotel::where('negara', $request->negara)->first();
   	$hotel = Hotel::where('category_hotel_id', $category->id)->paginate(5);
   	return view('site.hotel', compact('hotel', 'category'));
       // } 

   }
   
   public function detail_hotel($slug)
   {
   	   $hotel = Hotel::where('slug', $slug)->first();
       $category = CategoryKamar::where('hotel_id', $hotel->id)->get();
       return view('site.detail_hotel', compact('hotel', 'category'));
   }
}
