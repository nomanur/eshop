<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product');
    }

    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'required'
        ])->validate();


        $input = $request->except('image');

        if ($img = $request->file('image')) {
            $image = time() . '_' . $img->getClientOriginalName();
            $img->move('img', $image);
            $input['image'] = $image;
        }

        Session::flash('success', 'Your product created successfully');

        Toastr::success('', 'Your product created successfully');

        Product::create($input);

        return redirect()->back();
    }
}
