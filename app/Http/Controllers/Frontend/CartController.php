<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    // public function addToCart(Request $request)
    // {
    //     $cartTotal = $request->input('cartTotal');
    //     $currentCartTotal = session('cartTotal', 0);
    //     $newCartTotal = $currentCartTotal + $cartTotal;
    //     session(['cartTotal' => $newCartTotal]);

    //     return response()->json([
    //         'cartTotal' => $newCartTotal,
    //     ]);
    // }

    public function index()
    {
        return view('frontend.cart.cart');
    }
}
