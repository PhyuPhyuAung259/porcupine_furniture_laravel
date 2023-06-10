<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class HomeController extends Controller
{
    //
    public function redirect(Request $request){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin/dashboard');
        }
        else{
            return view('porcupine.index');
        }
    }
    //show product 
    public function show_product(Request $request){
        
        $category=category::all();
        $product=product::paginate(3);
         
        return view('porcupine.product',compact('category','product'));
    }
    //show product with category
    public function show_product_with_category(Request $request,$category_id){
        
        $category=category::all();
        $product=product::where('category_id',$category_id)->paginate(3);
        return view('porcupine.product',compact('category','product'));
    }
    //product_detail
    public function product_detail(Request $request,$product_id){
        $product=product::where('id',$product_id)->get();
        return view('porcupine.productdetail',compact('product'));
    }
  
}
