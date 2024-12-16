<?php

namespace App\Http\Controllers;

use App\Models\Cartsession;
use App\Models\Checkout;
use App\Models\Guestorder;
use App\Models\Guestuser;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;

class PaymentController extends Controller
{
    public function handlepayment(Request $request)
    {

        $user = Auth::user();

        $totalCost = $request->session()->get('totalAmount');
        $checkoutData = $request->session()->get('checkout_data');
        $cartItems = $request->session()->get('cart', []);


        if(isset($request->razorpay_payment_id) && $request->razorpay_payment_id != '')
        {
            $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
            $payment = $api->payment->fetch($request->razorpay_payment_id);
            $response = $payment->capture(array('amount'=>$totalCost * 100));

            $productIds = [];
            $productNames = [];
            $totalPrices = [];

            foreach ($cartItems as $item) {
                $productIds[] = $item['product_id'];
                $productNames[] = $item['name'];
                $totalPrices[] = $item['price'];

            }

            $productIdsStr = implode(',', $productIds);
            $productNamesStr = implode(',', $productNames);
            $totalPricesStr = implode(',', $totalPrices);

            $orderId = 'order_' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            if ($user) {
                $orderId = 'ORD' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

                // Save cart data in one row
                $orderItem = new Order();

                $orderItem->order_id = $orderId;
                $orderItem->customer_id = $user->customer_id;
                $orderItem->product_ids = $productIdsStr;
                $orderItem->product_name = $productNamesStr;
                $orderItem->price = $totalPricesStr;
                $orderItem->total_cost = $totalCost;
                $orderItem->save();


                  $checkout = new Checkout();
                  $checkout->customer_id = $user->customer_id;
                  $checkout->order_id = $orderId;
                  $checkout->name = $checkoutData['name'];
                  $checkout->email = $checkoutData['email'];
                  $checkout->contact = $checkoutData['contact_number'];
                  $checkout->payment_id = $response['id'];
                  $checkout->total_cost = $totalCost;
                  $checkout->save();

                $email = $user->email;



                $productNames = implode(', ', array_column($cartItems, 'name'));
                $prices = implode(', ', array_column($cartItems, 'price'));

                Mail::send('Frontend.paymentemail', [
                    'user' => $user,
                    'checkout' => $checkout,
                    'orderItem' => $orderItem,
                    'cartItems' => $cartItems,
                    'productNames' => $productNames,
                    'prices' => $prices,
                    'checkoutData' => $checkoutData,
                ], function ($message) use ($user, $checkout, $cartItems) {
                    $message->to($user->email)
                        ->subject('Order Confirmation - Your Order with InnoBrain Deals' . $checkout->order_id . ' has been successfully placed!');

                    foreach ($cartItems as $item) {
                        $message->embedData(file_get_contents(public_path('productsimg/' . $item['image'])), $item['image'], 'image/jpeg');
                    }
                });

                Cartsession::where('customer_id', $user->customer_id)->delete();

            } else {
                $orderId = 'ORD' . str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

                $guestUser = new Guestuser();
                    $guestUser->guestorder_id = $orderId;
                    $guestUser->name = $checkoutData['name'];
                    $guestUser->email = $checkoutData['email'];
                    $guestUser->contact = $checkoutData['contact_number'];
                    $guestUser->payment_id =$response['id'];
                    $guestUser->save();

                    $guestOrder = new Guestorder();
                    $guestOrder->guestorder_id = $orderId;
                    $guestOrder->product_ids = $productIdsStr;
                    $guestOrder->product_name = $productNamesStr;
                    $guestOrder->price = $totalPricesStr;
                    $guestOrder->total_cost = $totalCost;
                    $guestOrder->save();

                    $productNames = implode(', ', array_column($cartItems, 'name'));
                    $prices = implode(', ', array_column($cartItems, 'price'));

                    Mail::send('Frontend.guestpaymentemail', [
                        'guestuser' => $guestUser,
                        'guestorder' => $guestOrder,
                        'cartItems' => $cartItems,
                        'productNames' => $productNames,
                        'prices' => $prices,
                        'checkoutData' => $checkoutData,
                    ], function ($message) use ($guestUser, $guestOrder, $cartItems) {

                        $message->to($guestUser->email)
                            ->subject('Order Confirmation - Your Order with veehaagate.com ' . $guestOrder->guestorder_id . ' has been successfully placed!');

                        foreach ($cartItems as $item) {
                            $message->embedData(file_get_contents(public_path('productsimg/' . $item['image'])), $item['image'], 'image/jpeg');
                        }
                    });

            }

                $request->session()->forget('checkout_data');
                $request->session()->forget('cart');
                $request->session()->forget('totalAmount');

                return redirect('/');

            } else {
               echo "<script>console.error('Payment ID not provided or empty.');</script>";
            }
    }
}
