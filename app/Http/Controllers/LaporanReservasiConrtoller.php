<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\{CategoryKamar,Reservasi};
use PDF;
class LaporanReservasiConrtoller extends Controller
{
     public function laporan_reservasi(Request $request)
    {  

    $start = Carbon::now()->startOfMonth()->format('Y-m-d H:i:s');
         //DAN ENDOFMONTH UNTUK MENGAMBIL TANGGAL TERAKHIR DIBULAN YANG BERLAKU SAAT INI
    $end = Carbon::now()->endOfMonth()->format('Y-m-d H:i:s');
    $user = auth()->user();

    //JIKA USER MELAKUKAN FILTER MANUAL, MAKA PARAMETER DATE AKAN TERISI
    if ($request->date != '') {
        //MAKA FORMATTING TANGGALNYA BERDASARKAN FILTER USER
        $date = explode(' - ' ,request()->date);
        $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
        $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';
    }

    //BUAT QUERY KE DB MENGGUNAKAN WHEREBETWEEN DARI TANGGAL FILTER
        $kamars = CategoryKamar::where('id_pembuat', $user->id)->get();

        foreach($kamars as $kamar){
            if($user->role == 'admin') {
                $histories[] = Reservasi::with('user', 'CategoryKamar')->where('category_kamar_id', $kamar->id)->whereBetween('check_in', [$start, $end])->latest()->get();
            }elseif($user->role == 'superadmin'){
                $histories[] = Reservasi::with('user', 'CategoryKamar')->whereBetween('check_in', [$start, $end])->latest()->get();
            }
        }

        
    //KEMUDIAN LOAD VIEW
       
            return view('dashboard.laporan_reservasi.laporan', compact('histories'));
        
    }

    public function laporan_reservasi_pdf($daterange)
    {
     $user = auth()->user();    
    $date = explode('+', $daterange); //EXPLODE TANGGALNYA UNTUK MEMISAHKAN START & END
    //DEFINISIKAN VARIABLENYA DENGAN FORMAT TIMESTAMPS
    $start = Carbon::parse($date[0])->format('Y-m-d') . ' 00:00:01';
    $end = Carbon::parse($date[1])->format('Y-m-d') . ' 23:59:59';

    //KEMUDIAN BUAT QUERY BERDASARKAN RANGE CREATED_AT YANG TELAH DITETAPKAN RANGENYA DARI $START KE $END
    $kamars = CategoryKamar::where('id_pembuat', $user->id)->get();

        foreach($kamars as $kamar){
            if($user->role == 'admin') {
                $histories[] = Reservasi::with('user', 'CategoryKamar')->where('category_kamar_id', $kamar->id)->whereBetween('check_in', [$start, $end])->latest()->get();
            }elseif($user->role == 'superadmin'){
                $histories[] = Reservasi::with('user', 'CategoryKamar')->whereBetween('check_in', [$start, $end])->latest()->get();
            }
        }
    //LOAD VIEW UNTUK PDFNYA DENGAN MENGIRIMKAN DATA DARI HASIL QUERY
    $pdf = PDF::loadView('dashboard.laporan_reservasi.laporan_pdf', compact('histories', 'date'));
    //GENERATE PDF-NYA
    return $pdf->stream();
    }
}
