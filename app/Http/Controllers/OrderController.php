<?php

namespace App\Http\Controllers;

use App\Models\Activatedlink;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    public function viewOrder($orderId)
{
    $order = Order::with('customer')->where('order_id', $orderId)->firstOrFail();

    $productIds = explode(',', $order->product_ids);
    $productNames = explode(',', $order->product_name);
    $prices = explode(',', $order->price);


    $products = [];
    for ($i = 0; $i < count($productIds); $i++) {
        $isActivated = Activatedlink::where('order_id', $orderId)
        ->where('activatedproductid', $productIds[$i])
        ->exists();

        $products[] = [
            'id' => $productIds[$i],
            'name' => $productNames[$i],
            'price' => $prices[$i],
            'status' => $isActivated ? 'Activated' : 'Pending',
        ];
    }

    return view('AdminPanel.vieworderedproduct', compact('order', 'products'));
}

public function showActivationForm($orderId, $productId)
{
    $order = Order::with('customer')->where('order_id', $orderId)->firstOrFail();
    $product = Product::findOrFail($productId);


    return view('AdminPanel.activationfrom', [
        'order' => $order,
        'product' => $product,
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

    $order = Order::where('order_id', $orderId)->firstOrFail();
    $product = Product::where('product_id', $productId)->firstOrFail();


    $emailData = [
        'email' => $request->email,
        'messageContent' => $request->message,
        'orderId' => $order->order_id,
        'productId' => $product->product_id,
        'productName' => $product->product_name,
    ];

    Mail::send('AdminPanel.activationlinkmail', $emailData, function ($message) use ($request) {
        $message->to($request->email)
            ->subject('Activation Link for Your Purchase');
    });

    Activatedlink::create([
        'order_id' => $order->order_id,
        'product_ids' => $order->product_ids,
        'activatedproductid' => $product->product_id,
    ]);


    Log::info('Redirecting to: ' . route('Adminorder'));
    return redirect()->route('Adminorder')->with('success','Activation link sent successfully');

}


}
