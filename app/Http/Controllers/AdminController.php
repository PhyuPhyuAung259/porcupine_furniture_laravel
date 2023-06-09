<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
class AdminController extends Controller
{
    public function view_category(Request $request){
          
        $category=category::all();
        return view('admin.category',compact('category'));
    }

    public function add_category(Request $request){
            $data=new category();
            $data->category_name=$request->name;
            $data->save();
            return back()->with('message','Category added successfully!');
    }
}
