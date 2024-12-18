<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use PDF;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $data = new category();

        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product(){

        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request){
         $product = new Product();

         $product->title = $request->title;
         $product->description = $request->description;

         $image = $request->image;
         $imagename = time().'.'.$image->getClientOriginalExtension();
         $request->image->move('product',$imagename);
         $product->image = $imagename;

         $product->category = $request->category;
         $product->quantity = $request->quantity;
         $product->price = $request->price;
         $product->discount_price = $request->discount_price;

         $product->save();

         return redirect()->back()->with('message','Product Added Successfully');
    }

    public function show_product(){

        $productData = Product::all();
        return view('admin.show_product',compact('productData'));
    }

    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function edit_product($id){
        $editProduct = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product',compact('editProduct','category'));
    }

    public function edit_product_confirm(Request $request, $id){
        $editProductConfirm = Product::find($id);

        $editProductConfirm->title = $request->title;
        $editProductConfirm->description = $request->description;
        $editProductConfirm->category = $request->category;
        $editProductConfirm->quantity = $request->quantity;
        $editProductConfirm->price = $request->price;
        $editProductConfirm->discount_price = $request->discount_price;


        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $editProductConfirm->image = $imagename;
        }

        $editProductConfirm->save();

        return redirect()->back()->with('message','Product Updated Successfully');
    }

    public function order(){
        $data = Order::all();
        return view('admin.order',compact('data'));
    }

    public function statusChange($id){
        $data = Order::find($id);

        $data->delivery_status = "Delivered";
        $data->payment_status = "Paid";

        $data->save();

        return redirect()->back();
    }

    public function printPdf($id){
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');

    }

    public function search(Request $request){
        $searchText = $request->search;

        $data = Order::where('name', 'LINK',"%searchText%")->get();
        return view('admin.order', compact('data'));
    }


}