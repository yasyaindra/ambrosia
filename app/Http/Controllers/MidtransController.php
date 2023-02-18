<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Transaction;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

class MidtransController extends Controller
{
    //
    public function callback(Request $request){
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $notification = new \Midtrans\Notification();

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        $transaction = Transaction::findOrFail($order_id);


        // Nottifikasi
        if($status == 'capture')
        {
        if($type == 'credit_card')
            {
                if($fraud == 'challenge')
                {
                    $transaction->status = "PENDING";
                } else {
                    $transaction->status = "SUCCESS";
                }
            }
        } else if ($status == "settlement")
        {
            $transaction->status = "SUCCESS";
        } else if($status == "pending") {
            $transaction->status = "PENDING";
        } else if($status == "deny"){
            $transaction->status = "CANCELLED";
        } else if ($status == "expire"){
            $transaction->status = "CANCELLED";
        } else if ($status == 'cancel'){
            $transaction->status = "CANCELLED";
        }

        // Simpan transaksi
        $transaction->save();
        // return ResponseFormatter::success($transaction, 'Transaksi Dibayar!');
    }

    public function success(){
        return view('midtrans.success');
    }

    public function unfinished(){
        return view('midtrans.unfinished');
    }

    public function error(){
        return view('midtrans.error');
    }
}
