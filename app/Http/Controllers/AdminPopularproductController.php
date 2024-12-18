<?php

namespace App\Http\Controllers;

use App\Models\PopularProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminPopularproductController extends Controller
{
    public function popularproductview()
    {
        $popularProducts = PopularProduct::with('product')->get();

        return view('AdminPanel.popularproduct', compact('popularProducts'));
    }

    public function adminpopularproductform()
    {
        $popularProductIds = PopularProduct::pluck('product_id')->toArray();
        $products = Product::whereNotIn('product_id', $popularProductIds)->get();

        // $products = Product::all();
        return view('AdminPanel.popularproductform', compact('products'));
    }

    public function popularproductform(Request $request)
    {

        $request->validate([
            'products' => 'required|array|min:1',
            'products.*' => 'exists:products,product_id',
        ], [
            'products.required' => 'Please select at least one product.',
            // 'products.min' => 'Please select at least one product.',
            // 'products.*.exists' => 'One or more selected products are invalid.',
        ]);

        $selectedProducts = $request->input('products');

        foreach ($selectedProducts as $productId) {
            $product = new PopularProduct();
            $product->product_id = $productId;
            $product->save();
        }

        return redirect('Adminpopularproducts');
    }

    public function popularproductdelete($id)
    {
        $product=PopularProduct::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        return redirect('Adminpopularproducts');
    }
}
