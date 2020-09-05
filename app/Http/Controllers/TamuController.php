<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Reservasi};
use Carbon\Carbon;
class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $tamu = User::where('role', 'tamu')->select('name','email','id',)->get();
        
        return view('dashboard.tamu.lengkap', compact('tamu'));
    }

    public function check_in_today()
    {

        $reservasi = Reservasi::whereDate('check_in', Carbon::today())->paginate(8);
        $count = Reservasi::whereDate('check_in', Carbon::today())->count();
        return view('dashboard.tamu.check_in', compact('reservasi', 'count'));
    }

     public function check_out_today()
    {

        $reservasi = Reservasi::whereDate('check_out', Carbon::today())->paginate(8);
        $count = Reservasi::whereDate('check_out', Carbon::today())->count();
        return view('dashboard.tamu.check_out', compact('reservasi', 'count'));
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
        $detail_tamu = User::findOrFail($id);
        $reservasi = Reservasi::where('user_id', $id)->paginate(5);
        return view('dashboard.tamu.show', compact('detail_tamu', 'reservasi'));
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
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->back();
    }

    // public function getdata()
    // {
    //     $tamu = User::select('users.*')->where('role', 'tamu');

    //     return \DataTables::eloquent($tamu)->toJson();
    // }
}
