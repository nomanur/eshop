<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{

    public function categoryproduct($id)
    {
        $cat = Category::findOrFail($id);

        $catproducts = $cat->product;

        return view('front.categoryproduct', compact('catproducts'));
    }

    public function singleproduct($id)
    {
        $product = Product::findOrFail($id);

        //return $cartcount = auth()->user()->cart()->count();

        return view('front.singleproduct', compact('product'));
    }
}
