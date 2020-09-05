<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{CategoryKamar,User,Reservasi,Kamar, Hotel, ReservasiPembayaran};
class ReservasiController extends Controller
{
    public function create_reservasi(Request $request, $id)
    {

        $time = strtotime($request->check_in);
        $t = date('m-d-Y, G:i', strtotime('+'.$request->malam.'day', $time));
        echo $t;
        die();
    	$request->validate([
    		'check_in' => 'required',
    		'jumlah' => 'required|numeric',
    	]);

		$category = CategoryKamar::where('id', $id)->first();
    	$kamar = $category->kamar;
		$jumlah = $kamar->jumlah_kamar;
    	if ($kamar->jumlah_kamar_terisi < $jumlah){
    	$reservasi = Reservasi::create([
    		'kode_reservasi' => \Str::random(10),
    		'user_id' => auth()->user()->id,
    		'jumlah' => $request->jumlah,
    		'check_in' => $request->check_in,
    		'check_out' => $request->check_out,
    		'category_kamar_id' => $id,
    		
    	]);

		$pembayaran = ReservasiPembayaran::create([
    		'reservasi_id' => $reservasi->id,
    	]);
    	
    	
    	$kamar_terisi = (int)$kamar->jumlah_kamar_terisi + (int)$request->jumlah;
    	$kamar->update([
    			'jumlah_kamar_terisi' => $kamar_terisi,
    	]);

    	}

    	if ($kamar->jumlah_kamar_terisi == $jumlah) {
    	$kamar->update([
    		'status_kamar' => 'tidak tersedia',
    	]);
    	}
    	
    	

    	return redirect()->back();
    	
    }

    public function history_reservasi($email)
    {
    	$user = User::where('email', $email)->first();
    	$reservasi = Reservasi::where('user_id', $user->id)->get();
    	
    	return view('site/history_reservasi', compact('reservasi'));

    }



}
