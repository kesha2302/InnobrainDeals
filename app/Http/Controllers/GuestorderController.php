<?php

namespace App\Http\Controllers;

use App\Models\GuestActivatedlink;
use App\Models\Guestorder;
use App\Models\Guestuser;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class GuestorderController extends Controller
{
    public function viewOrder($gorderId)
{
    $order =Guestorder::where('guestorder_id', $gorderId)->firstOrFail();
    $guser = Guestuser::where('guestorder_id', $gorderId)->firstOrFail();


    $productIds = explode(',', $order->product_ids);
    $productNames = explode(',', $order->product_name);
    $prices = explode(',', $order->price);


    $products = [];
    for ($i = 0; $i < count($productIds); $i++) {
        $isActivated = GuestActivatedlink::where('guestorder_id', $gorderId)
        ->where('activatedproductid', $productIds[$i])
        ->exists();

        $products[] = [
            'id' => $productIds[$i],
            'name' => $productNames[$i],
            'price' => $prices[$i],
            'status' => $isActivated ? 'Activated' : 'Pending',
        ];
    }

    return view('AdminPanel.guestvieworderedproduct', compact('order', 'products','guser'));
}

public function showActivationForm($orderId, $productId)
{
    $order = Guestorder::where('guestorder_id', $orderId)->firstOrFail();
    $guser = Guestuser::where('guestorder_id', $orderId)->firstOrFail();
    $product = Product::where('product_id', $productId)->firstOrFail();



    return view('AdminPanel.guestactivationform', [
        'order' => $order,
        'product' => $product,
        'guser' => $guser,
    ]);
}

public function sendActivation(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    $orderId = $request->order_id;
    $productId = $request->product_id;

    Log::info('Form Details:', [
        'order_id' => $orderId,
        'product_id' => $productId,
        'email' => $request->email,
        'messageContent' => $request->message,
    ]);

    $order = Guestorder::where('guestorder_id', $orderId)->firstOrFail();
    $product = Product::where('product_id', $productId)->firstOrFail();


    $emailData = [
        'email' => $request->email,
        'messageContent' => $request->message,
        'orderId' => $order->guestorder_id,
        'productId' => $product->product_id,
        'productName' => $product->product_name,
    ];

    Mail::send('AdminPanel.guestactivationlinkmail', $emailData, function ($message) use ($request) {
        $message->to($request->email)
            ->subject('Activation Link for Your Purchase');
    });


    GuestActivatedlink::create([
        'guestorder_id' => $order->guestorder_id,
        'product_ids' => $order->product_ids,
        'activatedproductid' => $product->product_id,
    ]);


    Log::info('Redirecting to: ' . route('Adminorder'));
    return redirect()->route('Admin_guestorders')->with('success','Activation link sent successfully');

}

}
