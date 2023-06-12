<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Models\order;
use App\Models\order_detail;
use App\Notifications\SendEmailNotification;

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
    public function send_email(Request $request,$id){
        $order=order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request,$id){
        
        $order=order::find($id);
        $details=[
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order, new SendEmailNotification($details));
      
    }
     
}
