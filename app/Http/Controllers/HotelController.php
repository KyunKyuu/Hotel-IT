<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Hotel, CategoryHotel, CategoryKamar, Kamar};
use Carbon\Carbon;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
         //$hotel = Hotel::whereDate('created_at', Carbon::today())->get();
        if ($user->role == "superadmin") {
         $hotel = Hotel::with('categoriesHotel')->select('id','nama_hotel', 'category_hotel_id','kota','slug')->get();
        }elseif ($user->role == "admin") {
         $hotel = Hotel::with('categoriesHotel')->select('id','nama_hotel', 'category_hotel_id','kota','slug')->where('id_pembuat', $user->id)->first();     
        }


        return view('dashboard.home pages.hotel.hotel', compact('hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.home pages.hotel.create',[
            'hotel' => new Hotel(),
            'negara' => CategoryHotel::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $request->validate([
            'nama_hotel' => 'required',
            'gambar_hotel' => 'required|image|mimes:png,jpg,jpeg,svg|max:1048',
            'fasilitas_hotel' => 'required',
            'alamat' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'category_hotel_id' => 'required|int',
            'kota' => 'required',
            'content' => 'required',
            
            'fasilitas_icon_hotel' => 'required',
            'fasilitas_icon_hotel2' => 'required',
            'fasilitas_icon_hotel3' => 'required',
            'fasilitas_icon_hotel3' => 'required',
           
            'fasilitas_text_hotel' => 'required',
            'fasilitas_text_hotel2' => 'required',
            'fasilitas_text_hotel3' => 'required',
            'fasilitas_text_hotel3' => 'required',

        ]);

        $fasilitas_icon_hotel = [$request->fasilitas_icon_hotel, $request->fasilitas_icon_hotel1, $request->fasilitas_icon_hotel2, $request->fasilitas_icon_hotel3];

        $fasilitas_text_hotel = [$request->fasilitas_text_hotel, $request->fasilitas_text_hotel1, $request->fasilitas_text_hotel2, $request->fasilitas_text_hotel3];

        $ug = \Str::slug(request('nama_hotel')); 
        $cel = Hotel::where('slug', $ug)->first();
        if($cel != null){
            $slug = \Str::slug(request('nama_hotel'.+1));
        }elseif($cel == null){
           $slug = \Str::slug(request('nama_hotel')); 
        }


        $attr = $request->all(); 

        $gambar = $request->file('gambar_hotel');
        $gambarUrl = $gambar->storeAs("images/hotel", "{$slug}.{$gambar->extension()}");

        $attr['gambar_hotel'] = $gambarUrl;
        $attr['slug'] = $slug;
        $attr['fasilitas_icon_hotel'] = json_encode($fasilitas_icon_hotel);
        $attr['fasilitas_text_hotel'] = json_encode($fasilitas_text_hotel);
        $attr['id_pembuat'] = auth()->user()->id;
        Hotel::create($attr);
        

        return redirect('/dasboard/hotel')->with('success', 'Hotel Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $hotel = Hotel::where('slug', $slug)->first();
        $icon = [];
       $icon_array = json_decode($hotel->fasilitas , TRUE); 
       foreach ($icon_array as $ic) {
             $icon[] = $ic;
         }

        return view('dashboard.home pages.hotel.show', compact('hotel', 'icon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         $hotel = Hotel::where('slug', $slug)->first();
         if(auth()->user()->role == 'admin'){
         if (auth()->user()->id != $hotel->id_pembuat) {
            return redirect()->back()->with('error', 'Its not your Hotel');
           }
         }

        $negara = CategoryHotel::get();
        $icon = json_decode($hotel->fasilitas_icon_hotel , TRUE); 
        $fasilitas = json_decode($hotel->fasilitas_text_hotel , TRUE);
        return view('dashboard.home pages.hotel.edit', compact('hotel', 'negara', 'icon', 'fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $fasilitas_icon_hotel = [$request->fasilitas_icon_hotel, $request->fasilitas_icon_hotel1, $request->fasilitas_icon_hotel2, $request->fasilitas_icon_hotel3];

        $fasilitas_text_hotel = [$request->fasilitas_text_hotel, $request->fasilitas_text_hotel1, $request->fasilitas_text_hotel2, $request->fasilitas_text_hotel3];

        $hotel = Hotel::find($id);

        $ug = \Str::slug(request('nama_hotel')); 
        $cel = Hotel::where('slug', $ug)->first();
        if($cel != null){
            $slug = \Str::slug(request('nama_hotel'.+1));
        }elseif($cel == null){
           $slug = \Str::slug(request('nama_hotel')); 
        }
       

       if ($request->file('gambar_hotel')) {

         \Storage::delete($hotel->gambar_hotel);
        $gambar = $request->file('gambar_hotel');
        $gambarUrl = $gambar->storeAs("images/hotel", "{$slug}.{$gambar->extension()}");

       }else{

        $gambarUrl = $hotel->gambar_hotel;

       }
     
        $attr = $request->all();
    
        $attr['gambar_hotel'] = $gambarUrl;
        $attr['slug'] = $slug;
        $attr['fasilitas_icon_hotel'] = json_encode($fasilitas_icon_hotel);
        $attr['fasilitas_text_hotel'] = json_encode($fasilitas_text_hotel);
        $hotel->update($attr);

        return redirect('/dasboard/hotel')->with('success', 'Hotel Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        \Storage::delete($hotel->gambar_hotel());
        $hotel->delete();

        $ckamar = CategoryKamar::where('hotel_id', $id)->get();
        foreach ($ckamar as $kamar) {
        $kamar->delete();
        \Storage::delete($kamar->kamar->gambar_kamar());
        $kamar->kamar->delete();
        }
        return redirect()->back()->with('success', 'Hotel Deleted Successfully!');
    }
}
