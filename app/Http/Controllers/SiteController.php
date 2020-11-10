<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\{Kamar,Hotel,CategoryHotel,CategoryKamar, Reservasi, Diskon, Review};
use Carbon\Carbon;
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
    $hotel = Hotel::with('CategoriesHotel')->where('category_hotel_id', $category->id)->paginate(5);
   
          $harga = [];
          $icon = [];
          foreach ($hotel as $ht) {
            $harga[] = CategoryKamar::with('hotels')->where('hotel_id',$ht->id)->select('id','harga')->orderBy('harga','asc')->first();

            $icon[] = json_decode($ht->fasilitas, TRUE);
         } 


   	return view('site.hotel', compact('hotel', 'category', 'harga', 'icon'));
     
  }
    public function hotel_city(Request $request)
    {
       $request->validate([
            'kota' => 'required',
      ]);


    $category = CategoryHotel::where('negara', $request->negara)->first();

    $hotel = Hotel::with('CategoriesHotel')->where('category_hotel_id', $category->id)->where('kota', 'LIKE', '%'.$request->kota.'%')->paginate(5);
     $kota = Hotel::select('kota')->where('category_hotel_id', $category->id)->where('kota', 'LIKE', '%'.$request->kota.'%')->first();

          $harga = [];
          $icon = [];
          foreach ($hotel as $ht) {
            $harga[] = CategoryKamar::with('hotels')->where('hotel_id',$ht->id)->select('id','harga')->orderBy('harga','asc')->first();

            $icon[] = json_decode($ht->fasilitas_icon_hotel, TRUE);
         } 

      if($hotel->isEmpty()){
        return redirect()->back();
      }else{
        return view('site.hotel_city', compact('hotel', 'category', 'harga', 'icon', 'kota'));
      }
    }

   
   
   public function detail_hotel($slug)
   {

   	$hotel = Hotel::with('CategoriesHotel')->where('slug', $slug)->first();
    $category = CategoryKamar::with('kamar', 'diskon')->where('hotel_id', $hotel->id)->get();

    $reviews = Review::where('hotel_id', $hotel->id)->get();
    $icon_hotel = json_decode($hotel->fasilitas_icon_hotel, TRUE);
    $fasilitas_hotel = json_decode($hotel->fasilitas_text_hotel, TRUE);


    $no = 0;
    foreach ($category as $ct)
      {

    $icon[] = json_decode($ct->kamar->fasilitas_icon_kamar , TRUE); 
    $fasilitas[] = json_decode($ct->kamar->fasilitas_text_kamar , TRUE); 
    
    // Jumlah Stock Kamar
    $reservasi[] = Reservasi::where('category_kamar_id', $ct->id)->where('check_in','<=', Carbon::now())->where('check_out','>=', Carbon::now())->count();
    $stock_kamar[] = $ct->kamar->jumlah_kamar;
    if ($reservasi[$no] == $stock_kamar[$no]) {
        $stock[] = true;
    }else{
        $stock[] = false;
    }
   
   // Harga
    $kamar[] = $ct;
    $harga_awal[] = $kamar[$no]['harga'];

        if ($kamar[$no]['diskon']) {

          if ($kamar[$no]['diskon']['kode_diskon'] == null) {

          if ($kamar[$no]['diskon']['diskon_start'] <= Carbon::now() && $kamar[$no]['diskon']['diskon_end'] >= Carbon::now())
            {

            if ($kamar[$no]['diskon']['type'] == "persen") {
              $harga[] = (int)$harga_awal[$no] - ((int)$harga_awal[$no] * (int)$kamar[$no]['diskon']['diskon']/100);

            }elseif($kamar[$no]['diskon']['type'] == "potongan harga"){
              $harga[] =  (int)$harga_awal[$no] - (int)$kamar[$no]['diskon']['diskon'];
            }
           }else {
              $harga[] = $harga_awal[$no];
           }
          }elseif($kamar[$no]['diskon']['kode_diskon'] != null){
             $harga[] = $harga_awal[$no];
          }
          
        }elseif(!$kamar[$no]['diskon']) {
          $harga[] = $harga_awal[$no];
        }

      $no++;

      } 

      return view('site.detail_hotel', compact('hotel', 'category','harga','stock','icon','fasilitas', 'icon_hotel', 'fasilitas_hotel', 'reviews'));
   }

  

   public function about()
   {

    $negara = CategoryHotel::get();
    $hotel = Hotel::take(3)->with('CategoriesKamar')->get();
    $harga = [];
    foreach($hotel as $ht){
        $harga[] = CategoryKamar::where('hotel_id',$ht->id)->select('harga')->orderBy('harga','asc')->first();
        $icon[] = json_decode($ht->fasilitas_icon_hotel, TRUE);
    }

    return view('site.about', compact('hotel','harga', 'icon'));

   }

   public function contact_us()
   {
    return view('site.contact_us');
   }

   public function popular()
   {
     $hotels = Hotel::with('CategoriesHotel')->latest()->paginate(9);

      
          $icon = [];
          foreach ($hotels as $ht) {

            $icon[] = json_decode($ht->fasilitas_icon_hotel, TRUE);
         } 
    return view('site.popular', compact('hotels','icon'));
   }
}

