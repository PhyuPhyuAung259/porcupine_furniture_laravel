<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category=category::all();
        return view('admin.category',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>['required'],
        ]);
        $data=new category();
        $data->category_name=$request->name;
        $data->save();
        return back()->with('message','Category added successfully!');
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
        $category_edit=category::find($id);
        $category=category::all();
        return view('admin.category',compact('category_edit','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $category=category::find($id);
        $category->category_name=$request->name;
        $category->save();
        return redirect('/categoryprocess')->with('message','Category edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category=category::find($id);
        $category->delete();
        return redirect('/categoryprocess');
    }
}
