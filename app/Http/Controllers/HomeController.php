<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function lang($lang)
    {
        if (!in_array($lang, ['en', 'fr', 'bn'])) {
            abort(400);
        }

        app()->setLocale($lang);

        session()->put('locale', $lang);

        return redirect()->back();
    }
}
