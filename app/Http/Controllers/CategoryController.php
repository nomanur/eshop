<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category');
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        Toastr::success('', 'Category created successfully');

        return back();
    }
}
