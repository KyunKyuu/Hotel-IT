<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Reservasi, CategoryKamar, Hotel};
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
    
        $user = auth()->user();
        if($user->role == "superadmin"){
        
            $tamu[] = User::select('id','name','email')->latest()->get();

        }elseif($user->role == "admin"){

            $kamar = CategoryKamar::where('id_pembuat', $user->id)->get();

            foreach($kamar as $km){
              $tamu[] = Reservasi::where('category_kamar_id', $km->id)->get();
            }
            
        }
      
        
        
        return view('dashboard.tamu.lengkap', compact('tamu', 'user'));
    }

    public function check_in_today()
    {
        $user = auth()->user();
        if ($user->role == "superadmin") {

         $reservasi = Reservasi::with('categoryKamar')->whereDate('check_in', Carbon::today())->latest()->paginate(8);
         $count = Reservasi::whereDate('check_in', Carbon::today())->count();

        }elseif($user->role == "admin") {

            $categoryKamar = CategoryKamar::where('id_pembuat', $user->id)->get();

            foreach ($categoryKamar as $ct) {
                $reservasi = Reservasi::with('categoryKamar')->whereDate('check_in', Carbon::today())->where('category_kamar_id', $ct->id)->latest()->paginate(8);
                 $count = Reservasi::whereDate('check_in', Carbon::today())->where('category_kamar_id', $ct->id)->count();
            }
               

        }
        return view('dashboard.tamu.check_in', compact('reservasi', 'count','user'));
    }

     public function check_out_today()
    {

        $user = auth()->user();
        if ($user->role == "superadmin") {

         $reservasi = Reservasi::with('categoryKamar')->whereDate('check_out', Carbon::today())->paginate(8);
         $count = Reservasi::whereDate('check_out', Carbon::today())->count();

        }elseif($user->role == "admin") {

        $kamar = CategoryKamar::where('id_pembuat', $user->id)->get();
        foreach ($kamar as $km) {
         $reservasi = Reservasi::with('categoryKamar')->whereDate('check_out', Carbon::today())->where('category_kamar_id', $km->id)->paginate(8);
         $count = Reservasi::whereDate('check_out', Carbon::today())->where('category_kamar_id', $km->id)->count();   
        }

        }
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
        $detail_tamu = User::with('profile')->findOrFail($id);
        $reservasi = Reservasi::with('categoryKamar')->where('user_id', $id)->paginate(5);
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
        return redirect()->back()->with('success', 'Tamu Deleted Successfully!');
    }

    // public function getdata()
    // {
    //     $tamu = User::select('users.*')->where('role', 'tamu');

    //     return \DataTables::eloquent($tamu)->toJson();
    // }
}
