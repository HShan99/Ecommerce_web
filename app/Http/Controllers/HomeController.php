<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype=='1'){

            $totalProducts = Product::all()->count();
            $totalOrders = Order::all()->count();
            $totalCustomers = User::all()->count();
            $totalCustomers -= 1;

            $order = Order::all();
            $totalRevenue = 0;

            foreach($order as $order){
                $totalRevenue += $order->price;
            }

            $orderDelivered = Order::where('delivery_status','=',"delivered")->count();
            $orderProcessing = Order::where('delivery_status','=',"processing")->count();
            return view('admin.home',compact('totalProducts','totalOrders','totalCustomers','totalRevenue','orderDelivered','orderProcessing'));
        }
        else{
            $product = Product::paginate(3);
            $commentData = Comment::orderby('id','desc')->get();
            $replyData = Reply::all();
            return view('home.userpage',compact('product','commentData','replyData'));
        }
        $product = Product::paginate(3);
        return view('home.userpage',compact('product'));
    }

    public function index(){
        $product = Product::paginate(3);
        $commentData = Comment::orderby('id','desc')->get();
        $replyData = Reply::all();
        return view('home.userpage',compact('product','commentData','replyData'));
    }

    public function product_details($id){
        $product_details = Product::find($id);
        return view('home.product_details',compact('product_details'));
    }

    public function addToCart(Request $request,$id){
        if(Auth::id()){
            $user = Auth::user();
            $product = Product::find($id);

            $productExistId = Cart::where('product_id','=',$id)->where('user_id','=',$user->id)->get('id')->first();

            if( $productExistId){

                $cart = Cart::find($productExistId)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                if($product->discount_price){
                    $cart->price = ($product->discount_price * $cart->quantity);
                }
                else{
                    $cart->price = ($product->price * $cart->quantity);
                }

                $cart->save();
                return redirect()->back()->with('message','Product Added to Cart');

            }
            else{
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



                return redirect()->back()->with('message','Product Added to Cart');
            }


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
        return redirect()->back()->with('message','We have your Order.We will contact you soon.... ');

    }

    public function stripe($totalPrice){
        return view('home.stripe',compact('totalPrice'));
    }



    public function stripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment"
        ]);
        Session::flash('success', 'Payment successful!');
        return back();

    }

    public function showOrder(){
        if(Auth::id()){
            $userId = Auth::user()->id;
            $showSpecificOrder = Order::where('user_id','=',"$userId")->get();
            return view('home.order',compact('showSpecificOrder'));
        }
        else{
            return view('auth.login');
        }
    }

    public function cancelOrder($id){
        $cancel_order = Order::find($id);
        if($cancel_order->delivery_status == 'processing'){
            $cancel_order->delete();
            return redirect()->back()->with('message','Order Cancel Successfully');
        }
        else{
            return redirect()->back()->with('message','Can not Order Cancel.Order was Delivered');
        }
    }

    public function comment(Request $request){
        if(Auth::id()){
            $userId = Auth::user()->id;
            $userName = Auth::user()->name;

            $commentData = new Comment();
            $commentData->name = $userName;
            $commentData->user_id = $userId;
            $commentData->comment = $request->comment;
            $commentData->save();

            return redirect()->back();

        }
        else{
            return view('auth.login');
        }
    }

    public function reply(Request $request){
        if(Auth::id()){
            $replyData = new Reply();
            $replyData->name = Auth::user()->name;
            $replyData->user_id = Auth::user()->id;

            $commentData = Comment::all();
            $replyData->comment_id = $request->commentId;
            $replyData->reply = $request->reply;

            $replyData->save();

            return redirect()->back();



        }
        else{
            return view('auth.login');
        }
    }

    public function searchProduct(Request $request){
        $productSearch = $request->search;
        $commentData = Comment::orderby('id','desc')->get();
        $replyData = Reply::all();

        $product = Product::where('title','LIKE',"%$productSearch%")->orWhere('category','LIKE',"%$productSearch%")->paginate(10);
        return view('home.userpage',compact('product','commentData','replyData'));
    }

    public function allProduct(){
        $product = Product::paginate(3);
        $commentData = Comment::orderby('id','desc')->get();
        $replyData = Reply::all();
        return view('home.all_products',compact('product','commentData','replyData'));
    }


    public function productSearch(Request $request){
        $productSearch = $request->search;
        $commentData = Comment::orderby('id','desc')->get();
        $replyData = Reply::all();

        $product = Product::where('title','LIKE',"%$productSearch%")->orWhere('category','LIKE',"%$productSearch%")->paginate(10);
        return view('home.all_products',compact('product','commentData','replyData'));
    }





}