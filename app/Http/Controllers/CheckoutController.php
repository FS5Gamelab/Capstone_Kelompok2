<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, Config $config){
        $config->serverKey = config('midtrans.serverKey');
        $config->isProduction = false;
        $config->isSanitized = true;
        $config->is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'username' => Auth::user()->name,
                'email' => Auth::user()->email
            )
        );
        
        $snapToken = Snap::getSnapToken($params);
    }
}
