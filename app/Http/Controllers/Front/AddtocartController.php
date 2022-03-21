<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class AddtocartController extends Controller
{
    public function addtocart($id)
    {
        Cart::create([
            'product_id' => $id,
            'user_id' => auth()->user()->id
        ]);

        return back();
    }
}
