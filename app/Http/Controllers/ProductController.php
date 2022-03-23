<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;

        return Product::where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->get();
    }
}
