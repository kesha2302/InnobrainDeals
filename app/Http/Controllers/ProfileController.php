<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('Frontend.editprofile', compact('user'));
    }

    public function update(Request $request)
    {

        $user = auth()->user();

        if ($user instanceof User) {

            $user->fullname = $request->input('fullname');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->state = $request->input('state');
            $user->city = $request->input('city');
            $user->pincode = $request->input('pincode');
            $user->contact = $request->input('contact');

            $user->save();

            return redirect('/edit-profile')->with('success', 'Profile updated successfully');
        } else {

            return redirect('/edit-profile')->with('error', 'Failed to update profile. User not found or invalid.');
        }
    }

    public function orderhistory()
    {
        $user = auth()->user();

        $orders = $user->orders;
        // $orders = $user->orders()->orderBy('created_at', 'desc')->paginate(5);
        // $orders = $user->orders ?? collect();
        // $orders = $user->orders()->orderBy('created_at', 'desc')->get();
        return view('Frontend.orderhistory', compact('user', 'orders'));
    }
}
