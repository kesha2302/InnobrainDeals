<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session('cart', []);
        $totalAmount = 0;


        foreach ($cart as $item) {
            // $itemTotal = $item['price'] * $item['quantity'];
            // $priceToUse = $item['discount_price'] ?? $item['price'];
            $priceToUse = ($item['discount_price'] > 1) ? $item['discount_price'] : $item['price'];
            $itemTotal = $priceToUse;
            $totalAmount += $itemTotal;
        }

        session(['totalAmount' => $totalAmount]);
        // $cart = session()->get('cart');
        $cart = Session::get('cart', []);

        if (!$cart) {
            $cart = [];
        }
        Log::info('Cart contents: ', $cart);
        return view('frontend.cartpage',compact('cart', 'totalAmount'));
    }


public function addToCart(Request $request)
{
    $product = Product::find($request->id);

    if (!$product) {
        return response()->json(['message' => 'Product not found'], 404);
    }

    $cart = Session::get('cart', []);

    if (isset($cart[$request->id])) {

        $cart[$request->id]['quantity'] += $request->quantity;
        // return response()->json(['message' => 'Product is already in the cart!']);
    } else {

        $cart[$request->id] = [
            'product_id' => $product->product_id,
            'image' => $product->image,
            'name' => $product->name,
            'price' => $product->price,
            'discount_price' => $product->discount_price,

        ];
    }

    Session::put('cart', $cart);

    $totalItems = count($cart);

    return response()->json(['message' => 'Product added to cart successfully!','totalItems' => $totalItems ]);
}

public function removeFromCart(Request $request)
{
    // $user = Auth::user();

    $id = $request->id; // Get the product ID from the request
    $cart = Session::get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        Session::put('cart', $cart);


        // if (Auth::check()) {

        //     $user = Auth::user();
        //     Cartsession::where('customer_id', $user->customer_id)->delete();
        // }

        // Cartsession::where('customer_id', $user->customer_id)->delete();

        return response()->json(['success' => 'Item removed from the cart successfully!']);
    }

    return response()->json(['message' => 'Item not found in cart'], 404);
}

}
