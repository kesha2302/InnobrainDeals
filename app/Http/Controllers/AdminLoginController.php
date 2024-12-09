<?php

namespace App\Http\Controllers;

use App\Models\Adminlogindetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function signup()
    {
        return view('AdminPanel.registerpage');
    }

    public function signupdata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:6',

        ]);


        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $user= new Adminlogindetails();
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('/Adminlogin');

        // echo "<pre>";
        // print_r($request->all());
    }

    public function login()
    {
        return view('AdminPanel.loginpage');
    }

    public function logindata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator)
            ->withInput();
        }
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            $request->session()->put('admin_id', $user->admin_id);
            return redirect('/Admin')->with([
                'success' => 'Login successful!',
                'username' => $user->name
            ]);
        }


        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_id');
        Auth::guard('admin')->logout();
        return redirect('/Adminlogin');
    }

    public function resetpassword()
    {
        return view('AdminPanel.resetpassword');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);


        $user = Adminlogindetails::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Reset the password directly
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/Adminlogin');
    }
}
