<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


}