<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\{User,Profile};


class ProfileAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $profile = auth()->user()->profile;
       $admin = auth()->user();
       return view('dashboard.profile.profile', compact('profile', 'admin'));
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
        $admin = User::where('email',$email)->first();

        return view('dashboard.profile.edit', compact('admin'));
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

        $admin = Profile::where('user_id', $user->id)->first();
         
         if ($request->file('gambar')) {
            
         \Storage::delete($admin->gambar);
        $gambar = $request->file('gambar');
        $gambarUrl = $gambar->storeAs("images/profile", "{$user->name}.{$gambar->extension()}");

       }else{

        $gambarUrl = $admin->gambar;

       }   

       $attr['gambar'] = $gambarUrl;
       $admin->update($attr);

       return redirect(route('profile_admin'));


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
