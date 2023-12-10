<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Countries;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkOutCart(){
        $cart = session()->get('cart');
        $countries = Countries::all();
        if($cart){
            foreach ($cart as &$cartItem) {
                $avatars = json_decode($cartItem['avatar']);
                $firstAvatar = isset($avatars[0]) ? $avatars[0] : null;
                $cartItem['firstAvatar'] = $firstAvatar;
            }
        }
        return view('frontend.cart.checkout')
        ->with('cart', $cart)
        ->with('countries', $countries);
    }
    public function deleteCart(Request $request){
        $productId = $request->input('productId');

        $cart = session()->get('cart') ?? [];

        foreach ($cart as $key => $cartItem) {
            if ($cartItem['id'] == $productId) {
                unset($cart[$key]); // Remove the item from the cart
                break;
            }
        }

        session()->put('cart', $cart);

        $cartTotal = array_sum(array_column($cart, 'quantity'));

        session()->put('cartTotal', strval($cartTotal));

        return response()->json([
            'cart' => $cart,
            'cartTotal' => $cartTotal,
            'productId' => $productId,
        ]);
    }
    public function updateCart(Request $request){
        $productId = $request->input('productId');
        $newQty = $request->input('newQty');

        $cart = session()->get('cart') ?? [];

        foreach ($cart as $key => $cartItem) {
            if ($cartItem['id'] == $productId) {
                $cart[$key]['quantity'] = $newQty;
                break;
            }
        }

        session()->put('cart', $cart);

        $cartTotal = array_sum(array_column($cart, 'quantity'));

        session()->put('cartTotal', strval($cartTotal));

        return response()->json([
            'cart' => $cart,
            'cartTotal' => $cartTotal,
            'productId' => $productId,
        ]);
    }
    public function addToCart(Request $request)
    {
        $oldCart = session()->get('cart') ?? [];
        $productId = $request->input('productId');
        $product = Products::find($productId);
        
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $productExists = false;
        
        foreach ($oldCart as $key => $cartItem) {
            if ($cartItem['id'] == $productId) {
                $oldCart[$key]['quantity'] += 1;
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $productData = $product->toArray();
            $productData['quantity'] = 1;
            $oldCart[] = $productData;
        }
        
        session()->put('cart', $oldCart);
        
        $cart = session()->get('cart');
        
        $cartTotal = 0;
        foreach ($oldCart as $cartItem) {
            $cartTotal += $cartItem['quantity'];
        }
        session()->put('cartTotal', strval($cartTotal));

        return response()->json([
            'cart' => $cart,
            'cartTotal' => $cartTotal,
        ]);
    }
    public function index() {
        $cart = session()->get('cart');
        if($cart){
            foreach ($cart as &$cartItem) {
                $avatars = json_decode($cartItem['avatar']);
                $firstAvatar = isset($avatars[0]) ? $avatars[0] : null;
                $cartItem['firstAvatar'] = $firstAvatar;
            }
        }
        return view('frontend.cart.cart')->with('cart', $cart);
    }
}
