<?php

namespace App\Http\Controllers;

use App\Models\Aboutus;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Frontend.index');
    }
    public function About()
    {
        $aboutus = Aboutus::all();
        return view('Frontend.About', compact('aboutus'));
    }
    public function Service()
    {
        return view('Frontend.Service');
    }
    public function Contact()
    {
        $contactus = Contact::all();
        return view('Frontend.Contact', compact('contactus'));
    }
    public function Product()
    {
        return view('Frontend.Product');
    }

    public function banner()
    {
        $banners = Banner::all();
        return view('Frontend.banner', compact('banners'));
    }

    public function allproducts()
    {
        $categories = Category::with('products')->get();

    return view('Frontend.allproducts', compact('categories'));
    }


}

