<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Hotel, CategoryKamar};
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::with('profile')->where('role', 'admin')->latest()->paginate(10);
       
        $hotel = [];
        foreach($users as $user){
         $hotel[] = Hotel::where('id_pembuat', $user->id)->first();
        }
      

        return view('dashboard/admin/admin', compact('users', 'hotel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'tamu')->latest()->paginate(10);

        return view('dashboard/admin/create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = User::where('email', $request->email)->first();

        $user->update([
            'role' => 'admin',
        ]);

        return redirect()->route('daftar_admin')->with('success', 'Admin Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::with('profile')->findOrFail($id);
        $hotel = Hotel::select('id','nama_hotel')->where('id_pembuat', $admin->id)->first();
        return view('dashboard.admin.show', compact('admin', 'hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->back()->with('success', 'Admin Deleted Successfully!');
    }

    public function remove($id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'role' => 'tamu',
        ]);

        return redirect()->route('daftar_admin')->with('success', 'Admin Remove Successfully!');;
    }
}
