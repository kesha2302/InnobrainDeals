<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        Log::info('Checkout data saved in session:', [
                       'checkout_data' => $request->session()->get('checkout_data'),
                 ]);
        return view ('Frontend.Checkoutpage');
    }
}
