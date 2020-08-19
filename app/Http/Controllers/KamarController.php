<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Kamar, CategoryKamar};
class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = CategoryKamar::latest()->paginate(7);
       
        return view('dashboard.home pages.kamar.kamar', compact('kamar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.home pages.kamar.create',[
        //     'kamar' => new Kamar(),
        //     'categories' => CategoryKamar::get(),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        // $request->validate([
        //     'kode_kamar' => 'required',
        //     'gambar_kamar' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        //     'fasilitas_kamar' => 'required',
        //     'status_kamar' => 'required',
        //     'kapasitas_kamar' => 'required',
        //     'jumlah_kamar' => 'required',
        //     'category_id' => 'required|int',
        //     'content' => 'required',
        // ]);

        // $attr = $request->all(); 
        // $slug = \Str::slug(request('kode_kamar'));

        // $gambar = $request->file('gambar_kamar');
        // $gambarUrl = $gambar->storeAs("images/kamar", "{$slug}.{$gambar->extension()}");
        // $attr['gambar_kamar'] = $gambarUrl;
        // $attr['slug'] = $slug;

        // Kamar::create($attr);
        

        // return redirect('/dasboard/kamar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $kamar = Kamar::find($id);
       $category = CategoryKamar::where('id', $kamar->category_id)->first();
       return view('dashboard.home pages.kamar.show' , compact('kamar', 'category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = Kamar::find($id);
        $categories = CategoryKamar::get();
        return view('dashboard.home pages.kamar.edit', compact('kamar', 'categories'));
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
        $kamar = Kamar::find($id);
        $slug = \Str::slug(request('kode_kamar'));

       if ($request->file('gambar_kamar')) {

         \Storage::delete($kamar->gambar_kamar);
        $gambar = $request->file('gambar_kamar');
        $gambarUrl = $gambar->storeAs("images/kamar", "{$slug}.{$gambar->extension()}");

       }else{

        $gambarUrl = $kamar->gambar_kamar;

       }
     
        $attr = $request->all();
    
        $attr['gambar_kamar'] = $gambarUrl;
        $attr['slug'] = $slug;
        $kamar->update($attr);

        return redirect('/dasboard/kamar');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar =Kamar::find($id);
        \Storage::delete($kamar->gambar_kamar);
        $kamar->delete();
        return redirect()->back();
    }
}
