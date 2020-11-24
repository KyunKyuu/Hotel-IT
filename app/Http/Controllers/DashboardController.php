<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Hotel,Kamar, CategoryKamar, Reservasi};

class DashboardController extends Controller
{
     

    public function index()
    {	
        $user = auth()->user();
    	if ($user->role == 'superadmin') {

    	$admin = User::where('role', 'admin')->select('id')->count();
    	$tamu = User::where('role', 'tamu')->select('id')->count();
 		$hotel = Hotel::select('id')->count();
 		$kamar = Kamar::select('id')->count();
    	return view('dashboard.index', compact('admin', 'tamu', 'hotel', 'kamar','user'));

    	}elseif($user->role == 'admin'){

        $tel = Hotel::where('id_pembuat', $user->id)->select('id')->first();
        if ($tel != null) {
            
    	$kamar = CategoryKamar::where('id_pembuat', $user->id)->select('id')->get();

        if ($kamar->isEmpty()) {
            $tamu = 0;
            $kamar = 0;
            $pemasukan = 0;

        }else{
       
             foreach ($kamar as $km)
              {
               $tamu = Reservasi::where('category_kamar_id', $km->id)->select('id')->count();
               $kamar = CategoryKamar::where('id_pembuat', $user->id)->select('id')->count();
               $reservasi = Reservasi::where('category_kamar_id', $km->id)->get();
              }

            $pemasukan = 0;
             foreach ($reservasi as $rv)
              {
                
                $pemasukan += $rv->reservasipembayaran->harga;  
               
              }
                 
        }
            
        $hotel = Hotel::where('id_pembuat', $user->id)->select('id')->count();


    	}elseif($tel == null) {
            $kamar = 0;
            $hotel = 0;
            $tamu = 0;
            $pemasukan = 0;
        }

 		
 		
    	return view('dashboard.index', compact('tamu', 'hotel', 'kamar','user', 'pemasukan'));
    	}
    	
    }

    
}
