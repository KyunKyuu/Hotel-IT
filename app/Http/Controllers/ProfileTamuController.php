<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Tamu,User};
class ProfileTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $profile = auth()->user()->tamu;
       $tamu = auth()->user();
       return view('site.profile.profile', compact('profile', 'tamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        $profile = auth()->user()->tamu;
        
        return view('site.profile.edit', compact('user', 'profile'));

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
        $request->validate([
            'name' => 'required',
            'gambar' => 'image|mimes:png,jpg,jpeg,svg|max:1048',
        ]);

        $user = User::find($id);
        User::where('id',$user->id)
                ->update([
                    'name' => $request->name,
                ]);
        $tamu = Tamu::where('user_id', $user->id)->first();
         
         if ($request->file('gambar')) {
            
         \Storage::delete($tamu->gambar);
        $gambar = $request->file('gambar');
        $gambarUrl = $gambar->storeAs("images/profile", "{$user->name}.{$gambar->extension()}");

       }else{

        $gambarUrl = $tamu->gambar;

       }        
      

        Tamu::where('user_id', $user->id)
                ->update([
                    'alamat' => $request->alamat,
                    'gambar' => $gambarUrl,
                ]);

        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
