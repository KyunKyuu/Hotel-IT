<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Hotel, CategoryHotel};
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel = Hotel::latest()->paginate(7);
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
            'fasilitas' => 'required',
            'alamat' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'category_hotel_id' => 'required|int',
            'kota' => 'required',
        ]);

        $attr = $request->all(); 
        $slug = \Str::slug(request('nama_hotel'));

        $gambar = $request->file('gambar_hotel');
        $gambarUrl = $gambar->storeAs("images/hotel", "{$slug}.{$gambar->extension()}");
        $attr['gambar_hotel'] = $gambarUrl;
        $attr['slug'] = $slug;

        Hotel::create($attr);
        

        return redirect('/dasboard/hotel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);

        return view('dashboard.home pages.hotel.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $hotel = Hotel::find($id);
        $negara = CategoryHotel::get();
        return view('dashboard.home pages.hotel.edit', compact('hotel', 'negara'));
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
        $hotel = Hotel::find($id);
        $slug = \Str::slug(request('nama_hotel'));

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
        $hotel->update($attr);

        return redirect('/dasboard/hotel');
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
        \Storage::delete($hotel->gambar_hotel);
        $hotel->delete();
        return redirect()->back();
    }
}
