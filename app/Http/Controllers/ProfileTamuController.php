<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Profile,User};
class ProfileTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $profile = auth()->user()->profile;
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
    public function edit($email)
    {
        $user = User::where('email', $email)->first();
        $profile = auth()->user()->profile;
        
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
            'no_telpon' =>  'required|numeric',
            'gambar' => 'image|mimes:png,jpg,jpeg,svg|max:1048',

        ]);

        $attr = $request->all();
        $user = User::find($id);
        $user->update($attr);

        $tamu = Profile::where('user_id', $user->id)->first();
         
         if ($request->file('gambar')) {
            
         \Storage::delete($tamu->gambar);
        $gambar = $request->file('gambar');
        $gambarUrl = $gambar->storeAs("images/profile", "{$user->name}.{$gambar->extension()}");

       }else{

        $gambarUrl = $tamu->gambar;

       }   

       $attr['gambar'] = $gambarUrl;
       $tamu->update($attr);

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
