<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        Log::info('Checkout data saved in session:', [
                       'checkout_data' => $request->session()->get('checkout_data'),
                 ]);
        return view ('Frontend.Checkoutpage');
    }

    public function checkoutSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $name = $request->input('name');
        $contact_number = $request->input('contact_number');
        $email = $request->input('email');


            $request->session()->put('checkout_data', [
                'name' => $name,
                'contact_number' => $contact_number,
                'email' => $email,
            ]);

            return response()->json(['message' => 'Order details saved. Proceed to payment.']);

    }
}
