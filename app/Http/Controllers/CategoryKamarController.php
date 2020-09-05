<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{CategoryKamar, Kamar, Hotel};
class CategoryKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoryKamar::select('id','hotel_id','nama_category', 'harga')->get();
        $hotel = Hotel::get();
        return view('dashboard.home pages.category_kamar.kamar', compact('categories', 'hotel'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.home pages.category_kamar.create',[
           
            'hotel' => Hotel::get(),
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
            'hotel_id' => 'required',
            'nama_category' => 'required',
            'harga' => 'required|numeric',
            'kode_kamar' => 'required',
            'gambar_kamar' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'status_kamar' => 'required',
            'kapasitas_kamar' => 'required|numeric',
            'jumlah_kamar' => 'required|numeric',
            'content' => 'required',
            'fasilitas_kamar' => 'required',
            'fasilitas_kamar2' => 'required',
            'fasilitas_kamar3' => 'required',
            'fasilitas_kamar4' => 'required',
            'fasilitas_kamar5' => 'required',
            
        
        ]);

        $icon_kamar = [$request->fasilitas_kamar, $request->fasilitas_kamar2, $request->fasilitas_kamar3,$request->fasilitas_kamar4,$request->fasilitas_kamar5];

           
        $slug = \Str::slug(request('nama_category'));
        $attr = $request->all();
        $attr['slug'] = $slug;

        $category = CategoryKamar::create($attr);

        $gambar = $request->file('gambar_kamar');
        $gambarUrl = $gambar->storeAs("images/kamar", "{$slug}.{$gambar->extension()}");
        $attr['gambar_kamar'] = $gambarUrl;
       
        $attr['category_id'] = $category->id;
        $attr['fasilitas_kamar'] = json_encode($icon_kamar);

        $kamar = Kamar::create($attr);

        return redirect('/dasboard/category_kamar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $kamar = CategoryKamar::find($id);
         $hotel = Hotel::get();
        return view('dashboard.home pages.category_kamar.edit', compact('kamar', 'hotel'));
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

        $kamar = CategoryKamar::find($id);
        $slug = \Str::slug(request('nama_category'));
        $data = $request->all();
        $data['slug'] = $slug;
        $kamar->update($data);

        return redirect('/dasboard/category_kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar =CategoryKamar::find($id);
        $kamar->delete();
        return redirect()->back();
    }
}
