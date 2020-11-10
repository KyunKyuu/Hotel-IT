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
        $user = auth()->user();

        if ($user->role == "superadmin") {
            $categories = CategoryKamar::with('hotels')->get();
        }elseif ($user->role == "admin") {
            $categories = CategoryKamar::with('hotels')->where('id_pembuat', $user->id)->get();
        }
       

        return view('dashboard.home pages.category_kamar.kamar', compact('categories'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $hotel = Hotel::where('id_pembuat', $user->id)->first();

        return view('dashboard.home pages.category_kamar.create',  compact('hotel'));
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
            'gambar_kamar' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
            'status_kamar' => 'required',
            'kapasitas_kamar' => 'required|numeric',
            'jumlah_kamar' => 'required|numeric',
            'content' => 'required',

            'fasilitas_icon_kamar' => 'required',
            'fasilitas_icon_kamar2' => 'required',
            'fasilitas_icon_kamar3' => 'required',
            'fasilitas_icon_kamar3' => 'required',
           
            'fasilitas_text_kamar' => 'required',
            'fasilitas_text_kamar2' => 'required',
            'fasilitas_text_kamar3' => 'required',
            'fasilitas_text_kamar3' => 'required',
            
            
            
        ]);

        $fasilitas_icon_kamar = [$request->fasilitas_icon_kamar, $request->fasilitas_icon_kamar1, $request->fasilitas_icon_kamar2, $request->fasilitas_icon_kamar3];

        $fasilitas_text_kamar = [$request->fasilitas_text_kamar, $request->fasilitas_text_kamar1, $request->fasilitas_text_kamar2, $request->fasilitas_text_kamar3];


        $ug = \Str::slug(request('nama_category')); 
        $cel = CategoryKamar::where('slug', $ug)->first();
        if($cel != null){
            $slug = \Str::slug(request('nama_category'.+1));
        }elseif($cel == null){
           $slug = \Str::slug(request('nama_category')); 
        }
        
        $attr = $request->all();
        $attr['slug'] = $slug;
        $attr['id_pembuat'] = auth()->user()->id;
        $category = CategoryKamar::create($attr);

        $gambar = $request->file('gambar_kamar');
        $gambarUrl = $gambar->storeAs("images/kamar", "{$slug}.{$gambar->extension()}");
        $attr['gambar_kamar'] = $gambarUrl;
        $attr['category_id'] = $category->id;
        $attr['fasilitas_icon_kamar'] = json_encode($fasilitas_icon_kamar);
        $attr['fasilitas_text_kamar'] = json_encode($fasilitas_text_kamar);
        $attr['kode_kamar'] = \Str::random(6);
        $kamar = Kamar::create($attr);

        return redirect('/dasboard/category_kamar')->with('success', 'Room Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category= CategoryKamar::with('kamar','hotels')->where('slug', $slug)->first();

        $icon = json_decode($category->kamar->fasilitas_icon_kamar , TRUE);    
        $fasilitas =  json_decode($category->kamar->fasilitas_text_kamar , TRUE);

       return view('dashboard.home pages.category_kamar.show' , compact('category', 'icon', 'fasilitas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kamar = CategoryKamar::with('kamar','hotels')->find($id);


        if(auth()->user()->role == 'admin'){
        if (auth()->user()->id != $kamar->id_pembuat) {
            return redirect()->back();
         }
       }

        $icon = json_decode($kamar->kamar->fasilitas_icon_kamar , TRUE); 
        $fasilitas = json_decode($kamar->kamar->fasilitas_text_kamar , TRUE);
         $hotel = Hotel::where('id_pembuat', auth()->user()->id)->first();
        return view('dashboard.home pages.category_kamar.edit', compact('kamar', 'hotel', 'icon', 'fasilitas'));
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
        $fasilitas_icon_kamar = [$request->fasilitas_icon_kamar, $request->fasilitas_icon_kamar1, $request->fasilitas_icon_kamar2, $request->fasilitas_icon_kamar3];

        $fasilitas_text_kamar = [$request->fasilitas_text_kamar, $request->fasilitas_text_kamar1, $request->fasilitas_text_kamar2, $request->fasilitas_text_kamar3];

        $kamar = CategoryKamar::find($id);
        $ug = \Str::slug(request('nama_category')); 
        $cel = CategoryKamar::where('slug', $ug)->first();
        if($cel != null){
            $slug = \Str::slug(request('nama_category'.+1));
        }elseif($cel == null){
           $slug = \Str::slug(request('nama_category')); 
        }

        $data = $request->all();
        $data['slug'] = $slug;
        $kamar->update($data);

        if ($request->file('gambar_kamar')) {
         \Storage::delete($kamar->kamar->gambar_kamar);
        $gambar = $request->file('gambar_kamar');
        $gambarUrl = $gambar->storeAs("images/kamar", "{$slug}.{$gambar->extension()}");
       }else{
        $gambarUrl = $kamar->kamar->gambar_kamar;
       }
        
        $data['gambar_kamar'] = $gambarUrl;
        $data['fasilitas_icon_kamar'] = json_encode($fasilitas_icon_kamar);
        $data['fasilitas_text_kamar'] = json_encode($fasilitas_text_kamar);
    
        $kamar->kamar->update($data);

        return redirect('/dasboard/category_kamar')->with('success', 'Room Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ckamar = CategoryKamar::find($id);
        $ckamar->delete();
        $kamar = Kamar::where('category_id', $id)->first();
        \Storage::delete($kamar->gambar_kamar);
        $kamar->delete();
        return redirect()->back()->with('success', 'Room Deleted Successfully!');
    }
}
