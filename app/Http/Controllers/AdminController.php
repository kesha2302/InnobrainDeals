<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Checkout;
use App\Models\Guestorder;
use App\Models\Guestuser;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminhome()
    {
        $totalCustomers = User::count();
        $totalOrders = Order::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();

        return view('AdminPanel.index',compact('totalCustomers','totalOrders','totalCategories','totalProducts'));
    }

    //Customer Details
    public function admincustomerdetail()
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
    public function guestuserdetail()
    {
        $search=$request['search']??"";
        if($search!=""){
            $guestuser=Guestuser::where('name',"LIKE","%$search%")
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
    public function adminorder()
    {

        $search=$_REQUEST['search']??"";

        if ($search != "") {
            $order = Order::whereHas('customer', function($query) use ($search) {
                $query->where('fullname', 'LIKE', "%$search%");
            })->get();
        } else {
            $order = Order::with('customer')->get();
        }

        $data = compact('order', 'search');
        return view('AdminPanel.orderdetail')->with($data);
    }

    // Register Users Checkout Detail
    public function admincheckout()
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
    public function guestorderdetail()
    {
        $search=$request['search']??"";
        if($search!=""){
            $guestorders=Guestorder::where('guestorder_id',"LIKE","%$search%")
            ->get();
        }
        else{
            $guestorders=Guestorder::all();
        }

        $data=compact('guestorders', 'search');

        return view('AdminPanel.guestorders')->with($data);
    }
}
