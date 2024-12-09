<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Frontend.index');
    }
    public function About()
    {
        return view('Frontend.About');
    }
    public function Service()
    {
        return view('Frontend.Service');
    }
    public function Contact()
    {
        return view('Frontend.Contact');
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

