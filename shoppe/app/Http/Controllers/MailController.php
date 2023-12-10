<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailNotify;
// use Illuminate\Support\Facades\Redirect;
use App\Models\Histories;


class MailController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userEmail = $user ->email;
        $userName = $user ->name;
        $userPhone = $user ->phone;
        $id_user = $user ->id;
        
        $cartData = session()->get('cart');
        $totalBill = 0;

        if ($cartData) {
            foreach ($cartData as $cartItem) {
                $totalBill += $cartItem['quantity'] * $cartItem['price'];
            }
        }

        // dd($totalBill);
        if($cartData){
            foreach ($cartData as &$cartItem) {
                $avatars = json_decode($cartItem['avatar']);
                $firstAvatar = isset($avatars[0]) ? $avatars[0] : null;
                $cartItem['firstAvatar'] = $firstAvatar;
            }
        }
        $data = [
            'subject' => 'Shoppe Mail',
            'body' => 'Hello This is your order!',
            'cart' => $cartData,
        ];
        try {
            // Mail::to('huulinh250702@gmail.com')->send(new MailNotify($data));
            Mail::to($userEmail)->send(new MailNotify($data));
            // var_dump($data);
            // exit;
            // return Redirect::to('/member/account/check-out-cart')->with('cart', $cartData);
                $history = new Histories();
                $history->email = $userEmail;
                $history->name = $userName;
                $history->phone = $userPhone;
                $history->id_user = $id_user;
                $history->price = $totalBill;
                $history->save();
            // return response()->json(['Great check your mail box']);
            return redirect('/account/check-out-cart')->with('success', 'Your order has been successfully placed.');

        } catch (\Exception $th) {
            // var_dump($th);
            // exit;
            // return response()->json(['sorry']);
            return redirect('/account/check-out-cart')->with('error', 'An error occurred. Please try again later.');

        }    
    }
}
