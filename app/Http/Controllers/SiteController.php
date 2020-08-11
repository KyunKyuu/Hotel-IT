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

   public function hotel()
   {
   	$hotel = Hotel::latest()->paginate(6);
   	return view('site.hotel', compact('hotel'));
   }
   
   public function detail_hotel($slug)
   {
   	 $hotel = Hotel::where('slug', $slug)->first();
       $category = CategoryKamar::where('hotel_id', $hotel->id)->get();
       $kamar = Kamar::where('category_id', $category->id)->get();
       dd($kamar);
       // return view('site.detail_hotel', compact('hotel', 'category_kamar', 'kamar'));
   }
}
