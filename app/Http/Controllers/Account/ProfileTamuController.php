<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

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
       
       $user = auth()->user();
       return view('site.profile.profile', compact('user'));
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
        
        return view('site.profile.edit', compact('user'));

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

      
       $attr['tanggal_lahir'] = $request->tanggal_lahir;
       $attr['gambar'] = $gambarUrl;

       $tamu->update($attr);

        return redirect('/profile')->with('success', 'Profile Edit Successfully!');;
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
