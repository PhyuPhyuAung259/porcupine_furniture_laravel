<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\order_detail;
class AdminController extends Controller
{
    public function  order_list(Request $request){
          $order_list=order::where('status',0)->paginate(8);
          return view('admin.order',compact('order_list'));
         
    }
    public function orderdetail_list(Request $request,$id){
        $orderdetail_list=order_detail::where('order_id',$id)->get();
        return view('admin.order',compact('orderdetail_list'));

    }
    public function order_confirm(Request $request,$id){
        $order=order::find($id);
        $order->status=1;
        $order->save();
        return view('admin.dashboard');
    }

     
}
