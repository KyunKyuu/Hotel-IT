<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TransactionSuccess;
use App\Transaction;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Transaction as MidtransTransaction;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $notification = new Notification();

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud =$notification->fraud_status;
        $order_id = $notification->order_id;

        $transaction = Transaction::findOrFail($order_id);

        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->payment_status = 'CHALLENGE';
                } else {
                    $transaction->payment_status = 'SUCCESS';
                }
            }
        }elseif($status == 'settlement'){
            $transaction->payment_status = 'SUCCESS';
        }elseif($status == 'pending'){
            $transaction->payment_status = 'PENDING';
        }elseif($status == 'deny'){
            $transaction->payment_status = 'FAILED';
        }elseif($status == 'expired'){
            $transaction->payment_status = 'EXPIRED';
        }elseif($status == 'cancel'){
            $transaction->payment_status = 'FAILED';
        }

        $transaction->save();

        if($transaction)
        {
            if($status == 'capture' && $fraud == 'accept')
            {
                Mail::to($transaction->user)->send(
                    new TransactionSuccess($transaction)
                );
            }
        }else if($status == 'settlement')
        {
            Mail::to($transaction->user)->send(
                new TransactionSuccess($transaction)
            );
        }else if($status == 'success')
        {
            Mail::to($transaction->user)->send(
                new TransactionSuccess($transaction)
            );
        }else if($status == 'capture' && $fraud == 'challenge')
        {
           return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment Challenge',
                ]
           ]);
        }else
        {
           return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment not settlement',
                ]
           ]);
        }
        
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans notification success',
            ]
       ]);

        
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.success');
    }

    public function unfinishRedirect(Request $request)
    {
        return view('pages.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.failed');
    }
}
