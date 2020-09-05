<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\{Kamar,Hotel,CategoryHotel,CategoryKamar, Reservasi};
class SiteController extends Controller
{
   public function home()
   {

      $negara = CategoryHotel::get();
    $hotel = Hotel::take(6)->with('CategoriesKamar')->get();
    $kamar = CategoryKamar::take(3)->get();
    $harga = [];
    foreach($hotel as $ht){
        $harga[] = CategoryKamar::where('hotel_id',$ht->id)->select('harga')->orderBy('harga','asc')->first();
    }
   

   
   	return view('index', compact('negara', 'hotel', 'harga','kamar'));
   }

   public function hotel(Request $request)
   {
      $request->validate([
            'negara' => 'required',
      ]);

    $category = CategoryHotel::where('negara', $request->negara)->first();
    $hotel = Hotel::where('category_hotel_id', $category->id)->paginate(5);
          
          $harga = [];
          foreach ($hotel as $ht) {
            $harga[] = CategoryKamar::where('hotel_id',$ht->id)->select('id','harga')->orderBy('harga','asc')->first();
           
         } 

        


   	return view('site.hotel', compact('hotel', 'category', 'harga'));
     

   }
   
   public function detail_hotel($slug)
   {


   	   $hotel = Hotel::where('slug', $slug)->first();
       $category = CategoryKamar::where('hotel_id', $hotel->id)->orderBy('harga', 'asc')->paginate(4);
       return view('site.detail_hotel', compact('hotel', 'category'));
   }

   public function detail_kamar($slug)
   {

      $kamar = CategoryKamar::where('slug', $slug)->first();
      $hotel = Hotel::where('id', $kamar->hotel_id)->first();
      $jumlah = (int)$kamar->kamar->jumlah_kamar - (int)$kamar->kamar->jumlah_kamar_terisi;
      return view('site.detail_kamar', compact('hotel', 'kamar', 'jumlah'));
   }
}
