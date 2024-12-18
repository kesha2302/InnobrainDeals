<?php

namespace App\Http\Controllers;

use App\Models\Cartsession;
use App\Models\Category;
use App\Models\Checkout;
use App\Models\Guestorder;
use App\Models\Guestuser;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminhome()
    {
        $totalCustomers = User::count();
        $totalOrders = Order::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalGuestusers = Guestuser::count();
        $totalGuestOrders = Guestorder::count();

        return view('AdminPanel.index',compact('totalCustomers','totalOrders','totalCategories',
        'totalProducts','totalGuestusers','totalGuestOrders'));
    }

    //Customer Details
    public function admincustomerdetail(Request $request)
    {
        $search=$request['search']??"";
        if($search!=""){
            $customer=User::where('fullname',"LIKE","%$search%")->get();
        }
        else{
            $customer=User::all();
        }

        $data=compact('customer', 'search');

        return view('AdminPanel.customersdetail')->with($data);
    }

    // Guest Users Detail
    public function guestuserdetail(Request $request)
    {
        $search=$request['search']??"";
        if($search!=""){
            $guestuser=Guestuser::where('guestorder_id',"LIKE","%$search%")
            ->orWhere('guestorder_id', 'LIKE', "%$search%")
            ->get();
        }
        else{
            $guestuser=Guestuser::all();
        }

        $data=compact('guestuser', 'search');

        return view('AdminPanel.guestusers')->with($data);
    }

    // Register Users Detail
    public function adminorder(Request $request)
    {

        $search=$_REQUEST['search']??"";

        if ($search != "") {
            $orders = Order::whereHas('customer', function($query) use ($search) {
                $query->where('fullname', 'LIKE', "%$search%");
            })->get();
        } else {
            $orders = Order::with('customer')->get();
        }


        foreach ($orders as $order) {
            $productIds = explode(',', $order->product_ids);

            // Get activated product IDs for this order
            $activatedProductIds = DB::table('activatedlink')
                ->where('order_id', $order->order_id)
                ->pluck('activatedproductid')
                ->toArray();

            if (empty($activatedProductIds)) {
                $order->status = 'Pending';
            } elseif (count(array_intersect($productIds, $activatedProductIds)) === count($productIds)) {
                $order->status = 'Activated';
            } else {
                $order->status = 'Partially Activated';
            }
        }

        $data = compact('orders', 'search');
        return view('AdminPanel.orderdetail')->with($data);
    }

    // Register Users Checkout Detail
    public function admincheckout(Request $request)
    {

        $search=$_REQUEST['search']??"";

        if ($search != "") {
            $checkout = Checkout::whereHas('customer', function($query) use ($search) {
                $query->where('fullname', 'LIKE', "%$search%");
            })->get();
        } else {
            $checkout = Checkout::with('customer')->get();
        }

        $data = compact('checkout', 'search');
        return view('AdminPanel.checkoutdetail')->with($data);
    }

    // Guest Users Order Detail
    public function guestorderdetail(Request $request)
    {
        $search=$request['search']??"";
        if($search!=""){
            $guestorders=Guestorder::where('guestorder_id',"LIKE","%$search%")
            ->get();
        }
        else{
            $guestorders=Guestorder::all();
        }

        foreach ($guestorders as $order) {
            $productIds = explode(',', $order->product_ids);

            // Get activated product IDs for this order
            $activatedProductIds = DB::table('guestactivatedlink')
                ->where('guestorder_id', $order->guestorder_id)
                ->pluck('activatedproductid')
                ->toArray();

            if (empty($activatedProductIds)) {
                $order->status = 'Pending';
            } elseif (count(array_intersect($productIds, $activatedProductIds)) === count($productIds)) {
                $order->status = 'Activated';
            } else {
                $order->status = 'Partially Activated';
            }
        }

        $data=compact('guestorders', 'search');

        return view('AdminPanel.guestorders')->with($data);
    }

    public function cartsession()
    {
        $cartsession = Cartsession::with('customer')->get();

        $data = compact('cartsession');
        return view('AdminPanel.cartsession')->with($data);
    }

    public function deleteAll()
    {
        Cartsession::truncate();

        return redirect()->back()->with('delete', 'All cart sessions have been deleted.');
    }
}
