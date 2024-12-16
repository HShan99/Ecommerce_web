<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.home');
        }
        else{
            $product = Product::paginate(3);
            return view('home.userpage',compact('product'));
        }
        $product = Product::paginate(3);
        return view('home.userpage',compact('product'));
    }

    public function index(){
        $product = Product::paginate(3);
        return view('home.userpage',compact('product'));
    }

    public function product_details($id){
        $product_details = Product::find($id);
        return view('home.product_details',compact('product_details'));
    }

    public function addToCart(Request $request,$id){
        if(Auth::id()){
            $user = Auth::user();
            $product = Product::find($id);

            $cart = new Cart();
            $cart->name  = $user->name;
            $cart->email  = $user->email;
            $cart->phone  = $user->phone;
            $cart->address  = $user->address;

            $cart->product_title = $product->title;

            if($product->discount_price){
                $cart->price = ($product->discount_price * $request->quantity);
            }
            else{
                $cart->price = ($product->price * $request->quantity);
            }


            $cart->quantity = $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->user_id = $user->id;

            $cart->save();



            return redirect()->back();
        }
        else{
            return view('auth.login');
        }
    }

    public function showCart(){

        if(Auth::id()){
            $id = Auth::user()->id;
            $cart = Cart::where('user_id','=',$id)->get();
            return view('home.show_cart',compact('cart'));
        }
        else{
            return redirect('login');
        }

    }

    public function removeCartItem($id){
        $cartItem = Cart::find($id);
        $cartItem->delete();
        return redirect()->back();
    }

    public function cashOrder(){
        $user = Auth::user();
        $user_id = $user->id;

        $cart = Cart::where('user_id','=',$user_id)->get();

        foreach($cart as $cart){
            $order = new Order;

            $order->name = $user->name;
            $order->email = $user->email;
            $order->phone = $user->phone;
            $order->address = $user->address;
            $order->user_id = $user->id;

            $order->product_title = $cart->product_title;
            $order->quality = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->product_id = $cart->product_id;


            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $remove_id = $cart->id;
            $cart_data = Cart::find($remove_id);

            $cart_data->delete();


        }
        return redirect()->back()->with('message','Order Proceed successfully ');

    }

    public function stripe($totalPrice){
        return view('home.stripe',compact('totalPrice'));
    }



    public function stripePost(Request $request,$totalPrice){
        dd($totalPrice);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([

                "amount" => $totalPrice,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment."
        ]);
        return back();
        // return back();->with('message', 'Payment successful!')
    }





}