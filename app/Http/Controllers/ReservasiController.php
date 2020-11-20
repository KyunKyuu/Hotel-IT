<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{CategoryKamar,User,Reservasi,Kamar, Hotel, ReservasiPembayaran, ReservasiRequest, Diskon};
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Snap;
use phpDocumentor\Reflection\Location;
class ReservasiController extends Controller
{
    public function reservasi_awal(Request $request)
    {
     
    	$request->validate([
    		'check_in' => 'required',
    		'waktu_check_in' => 'required',
        'durasi' => 'required|numeric',
    	]);

        $waktu = $request->waktu_check_in;
        $array_waktu = explode(":", $waktu);
        $jam = $array_waktu[0];
        $menit = $array_waktu[1];

        $check_out = date('Y-m-d H:i', strtotime('+'.$request->durasi.'day +'. $jam . 'hour +'.$menit . 'minutes',  strtotime($request->check_in)));

        $check_in = date('Y-m-d H:i', strtotime('+'. $jam . 'hour +'.$menit . 'minutes',  strtotime($request->check_in)));

        $cek_in = Carbon::parse($check_in)->format('d, F Y H:i');
        $cek_out = Carbon::parse($check_out)->format('d, F Y H:i');

		    $category = CategoryKamar::with('kamar','hotels')->where('id', $request->kamar_id)->first();
        
         $harga_awal = $category->harga * $request->durasi * 1;

        if ($category->diskon) {
              if ($category->diskon->diskon_start <= Carbon::now() && $category->diskon->diskon_end >= Carbon::now()) {
            if($category->diskon->kode_diskon == null){
                 if ($category->diskon->type == "persen") {
                  $harga = (int)$request->harga_awal - ((int)$request->harga_awal * (int)$diskon->diskon/100);
                  session()->put('harga',[
                    'harga' => $harga,
                  ]);
                 }elseif($category->diskon->type == "potongan harga"){
                 $harga =  (int)$harga_awal-(int)$category->diskon->diskon;
                  session()->put('harga',[
                    'harga' => $harga,
                  ]);
                 }
           }elseif($category->diskon->kode_diskon != null){
                $harga = $category->harga * $request->durasi * 1;
                 session()->put('harga',[
                    'harga' => $harga,
                  ]);
          }   
              }else {
                  $harga = $category->harga * $request->durasi;
                  $harga *= 1;
                   session()->put('harga',[
                    'harga' => $harga,
                  ]);
              }

        }elseif (!$category->diskon) {
          $harga = $category->harga * $request->durasi * 1;
           session()->put('harga',[
                    'harga' => $harga,
                  ]);
        }


        $durasi = $request->durasi;
        $jumlah = 1;
        $user = auth()->user();

    	return view('site/reservasi/order', compact('check_in', 'check_out', 'category', 'harga', 'durasi', 'jumlah', 'user', 'harga_awal', 'cek_in', 'cek_out'));
    	
    }



    public function reservasi_akhir(Request $request)
    {

     

    $category = CategoryKamar::with('kamar','hotels')->where('id', $request->id)->first();
    $kamar = $category->kamar;
		$reservasi = Reservasi::where('category_kamar_id', $category->id)->where('check_in','<=', Carbon::now())->where('check_out','>=', Carbon::now())->count();
    $jumlah = 1;
    if ($reservasi == $kamar->jumlah_kamar) {
        return redirect('/hotel/'.$category->hotels->slug)->with('error', 'Room is full');
    }elseif ($reservasi <= $kamar->jumlah_kamar){
       
    	$reservasi = Reservasi::create([
    		'kode_reservasi' => \Str::random(10),
    		'user_id' => auth()->user()->id,
    		'jumlah' => 1,
    		'check_in' => $request->check_in,
    		'check_out' => $request->check_out,
    		'category_kamar_id' => $request->id,
        'durasi_reservasi' => $request->durasi,
    	]);


  // Diskon Id
  if ($category->harga != $request->harga) {

    if ($category->diskon == null) {
      $diskon = null;
    }else{
      $diskon = $category->diskon->id;
    }
  }elseif($category->harga == $request->harga){
    $diskon = null;
  }

		$pembayaran = ReservasiPembayaran::create([
    		'reservasi_id' => $reservasi->id,
        'diskon_id' => $diskon,
        'harga' => $request->harga,
    	]);
    	
  }
    	

    $spesial = [$request->smoke, $request->upstair, $request->rooms, $request->bed];
    $reservasi_request = ReservasiRequest::create([
      'reservasi_id' => $reservasi->id,
      'name_guest' => $request->name_guest,
      'spesial_request' => json_encode($spesial),
      'other_request' => $request->other,

    ]);
      

      // set konfigurasi Midtrans
    // set konfigurasi Midtrans
    Config::$serverKey = config('midtrans.serverKey');
    Config::$isProduction = config('midtrans.isProduction');
    Config::$isSanitized = config('midtrans.isSanitized');
    Config::$is3ds = config('midtrans.is3ds');

    // Buat array untuk di kirim ke midtrans
    $midtrans_params = [
      'transaction_details' => [
        'order_id' => $reservasi->id,
        'gross_amount' => (int)$request->harga,

      ],
      'customer_details' => [
        'first_name' => auth()->user()->name,
        'email' => auth()->user()->email,
      ],
      'item_details' => [
                    [
                        'id'       => (int)$category->id,
                        'price'    => (int)$request->harga,
                        'quantity' => 1,
                        'name'     => ucwords(str_replace('_', ' ', $category->nama_category))
                    ]
                ],
      'enabled_payments' => ['gopay', 'indomaret'],
      'vtweb' => []
      ];
    
    
            
      $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

        return redirect()->away($paymentUrl);
    }

    public function apply_diskon(Request $request)
    {



      $diskon = Diskon::where('kode_diskon', $request->kode_diskon)->where('kamar_id', $request->kamar_id)->where('diskon_start', '<', Carbon::now())->where('diskon_end', '>', Carbon::now())->first();
     
     
      if (!$diskon) {
         return redirect()->back()->with('error', 'Voucher Diskon is invalid, please try again.');
       }elseif($diskon){
              session()->forget('harga');
              if ($diskon->type == "persen") {
                  $harga = (int)$request->harga_awal - ((int)$request->harga_awal * (int)$diskon->diskon/100);

                   session()->put('harga_diskon',[
                    'harga' => $harga,
                  ]);
              }elseif($diskon->type == "potongan harga"){
               
                  $harga = (int)$request->harga_awal-(int)$diskon->diskon;

                  session()->put('harga_diskon',[
                    'harga' => $harga,
                  ]);
              }

              session()->put('diskon', [
              'name'=> $diskon->kode_diskon,
              'diskon' => $diskon->diskon,
              ]);

           
      }
     
       return redirect()->back();
      
    }

    public function delete_diskon()
    {
      session()->forget('diskon');

       return redirect()->back();
    }


}
