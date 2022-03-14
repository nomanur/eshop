<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $cat = Category::findOrfail(1);

        // return $cat->product;

        $products = Product::all();
        $categories = Category::all();

        return view('front.home', compact('products', 'categories'));
    }
}
