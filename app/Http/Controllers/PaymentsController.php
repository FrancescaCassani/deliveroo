<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway as Gateway;
use App\Order;
use Illuminate\Support\Facades\DB;

class PaymentsController extends Controller
{
    // public function make(Request $request)
    // {
    //     $payload = $request->input('payload', false);

    //     $nonce = $payload['nonce'];

    //     $status = \Braintree\Transaction::sale([
    //             'amount' => $nonce,
    //             'paymentMethodNonce' => $nonce,
    //             'options' => ['submitForSettlement' => True]
    //             ]);
    //     // return response()->json($status);
    //     return view('guests.payment');
    // }

    public function make(Request $request) {

        $data = $request->all();
        // $slug = $data['slug'];

        // dd($data);
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'z3djsm2w4fpsnkqy',
            'publicKey' => 'c58z6ngqz3bxxx8x',
            'privateKey' => 'a503c7d8acba57cfe86a228fb6050403'
        ]);

        $nonceFromTheClient = $data['payment_method_nonce'];

        $total= $data['amount'];

        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
              'submitForSettlement' => False
            ]
        ]);

        return redirect()->route('guests.home');
    }
}
