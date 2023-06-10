<?php

namespace App\Http\Controllers\Porcupine;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\user;
use App\Models\Cart;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //show cart in blade
    public function show_cart(){
        $id=Auth::user()->id;
        $cart=Cart::where('user_id',$id)->get();
         
        return view('porcupine.cart',compact('cart'));
    }
    //save cart data to database
    public function add_to_cart(Request $request,$id){
        
        $user=Auth::user();
        $product=product::find($id);
        $cart=Cart::where('user_id',$user->id)->where('product_id',$id)->get();
        if($cart != null){
            foreach ($cart as $data) {
                $data->quantity=$data->quantity + $request->quantity;
                if ($product->discount_price != null) {
                    $data->price=$product->discount_price;
                    $data->total_price=$product->discount_price * $data->quantity;
                   
                } else {
                    $data->price=$product->price;
                    $data->total_price=$product->price * $data->quantity;
                }
                $data->save();
                return redirect()->back();
            }
        }
        $cart=new Cart();
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;
        $cart->product_name=$product->name;
        $cart->quantity=$request->quantity;
        if ($product->discount_price != null) {
            $cart->price=$product->discount_price;
            $cart->total_price=$product->discount_price * $request->quantity;
           
        } else {
            $cart->price=$product->price;
            $cart->total_price=$product->price * $request->quantity;
        }
        $cart->image=$product->image;
        $cart->product_id=$product->id;
        $cart->save();
        return redirect()->back();

    }
    //delete cart
    public function delete_cart($id){
        $cart=Cart::find($id);
        $cart->delete();
        return redirect()->back();

    }

    //checkout
    public function checkout(Request $request,$id){
        $cart=Cart::where('user_id',$id)->get();
         //dd($checkout_cart);
         $user=Auth::user();
        //  dd($cart);
        return view('porcupine.checkout',compact('cart','user'));
    }
    //confirm_checkout
    public function confirm_checkout(Request $request){
        $request->validate([
            'payment'=>['required'],
            
             
        ]);
        $user=Auth::user();
        $cart=Cart::where('user_id',$user->id)->get();
        $order=new order();
        $order->name=$user->name;
        $order->email=$request->email;
        $order->address=$request->address;
        $order->phone=$request->phone;
        $order->grand_total_amount=$request->grandtotalamount;
        $order->payment_method=$request->payment;
        //payment image store
        if($_REQUEST['payment']!=="COD" ){
        $payment_image=$request->payment_ss;
        $imagename=time().'.'.$payment_image->getClientOriginalExtension();
        $request->payment_ss->move('uploads/payment_image',$imagename);
        $order->payment_image=$imagename;
        }
        else{
            $order->payment_image="Payment is COD";
        }
        $order->save();
        //order_detail save
         
        foreach ($cart as $data) {
            $order_detail=new order_detail();
            $order_detail->product_name=$data->product_name;        
            $order_detail->price=$data->price;  
            $order_detail->quantity=$data->quantity;  
            $order_detail->total_price=$data->total_price;  
            $order_detail->order_id=$order->id;  
            
            
            $product = Product::where('name', $order_detail->product_name)->first();
            // Use `first()` instead of `get()` to retrieve a single product

            if ($product) {
                $quantity = $product->quantity - $order_detail->quantity;
                $product->quantity = $quantity;
                $product->save();
            }
            $order_detail->save();
            return back()->with('message','Thank you for choosing our furniture. We will send a confirmation email once we have checked your order.');
            
             
        }
        
    }
}
