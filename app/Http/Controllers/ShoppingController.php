<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Stripe\Charge;
use Stripe\Stripe;
use App\Product;

class ShoppingController extends Controller
{
    public function addToCart(){
        $pdt=Product::find(request()->pdt_id);
       
        $cartItem = Cart::add([
            'id'=>$pdt->id,
            'name'=>$pdt->name,
            'qty'=>request()->qty,
            'price'=>$pdt->price,
            'weight'=>'10'
            

        ]);
        
        Cart::associate($cartItem->rowId,'App\Product');
        return redirect()->route('cart');
        }
    public function cartCheckOut(){
        return view('checkout');
    }


    public function cart(){
        return view('cart');
    }
    public function pay(){
       
       Stripe::setApiKey('sk_test_Md3qBgnBH6XVlVJtWNySMiDZ00pOB2VAJ9');
        
        $charge= Charge::create([
            'amount' => Cart::total() *100,

            'currency' => 'usd',

            'description'=>'udemy totorial',

            'source' =>request()->stripeToken

        ]);
        dd('done payment');
    }

}
