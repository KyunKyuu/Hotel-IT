<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kamar;
class SiteController extends Controller
{
   public function home()
   {
   	return view('site.home');
   }

   public function kamar()
   {
   	$kamar = Kamar::latest()->paginate(6);
   	return view('site.kamar', compact('kamar'));
   }
   
   public function detail_kamar($slug)
   {
   	$detail = Kamar::where('slug', $slug)->first();
       return view('site.detail_kamar', compact('detail'));
   }
}
