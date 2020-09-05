<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User,Hotel,Kamar};
class DashboardController extends Controller
{
     

    public function index()
    {
    	$admin = User::where('role', 'admin')->select('id')->get()->count();
    	$tamu = User::where('role', 'tamu')->select('id')->get()->count();
 		$hotel = Hotel::select('id')->get()->count();
 		$kamar = Kamar::select('id')->get()->count();
    	return view('dashboard.index', compact('admin', 'tamu', 'hotel', 'kamar'));
    }

    
}
