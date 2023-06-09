<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;
use App\Models\product_image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=product::all();
        return view('admin.product.list',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category=category::all();
        return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>['required'],
            'description'=>['required'],
            'price'=>['required'],
            'quantity'=>['required'],
            'category_id'=>['required'],
            'image' => ['required'],
        ]);
        $product=new product();
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->category_id=$request->category_id;
        //image store
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('uploads/product',$imagename);
        $product->image=$imagename;
        $product->save();
        
         
        return back()->with('message','Product added successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product_edit=product::find($id);
        $category=category::all();
        return view('admin.product.create',compact('product_edit','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product=product::find($id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->quantity=$request->quantity;
        $product->category_id=$request->category_id;
        //image store
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('uploads/product',$imagename);
        $product->image=$imagename;
        $product->save();
        
         
        return back()->with('message','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product=product::find($id);
        $product->delete();
        return redirect('/productprocess');
    }
}
