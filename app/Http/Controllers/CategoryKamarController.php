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
        $categories = CategoryKamar::paginate(7);
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
            'ukuran' => 'required',
            'harga' => 'required',
        ]);

        $kamar = $request->all();

        CategoryKamar::create($kamar);

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
        $data = $request->all();
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
