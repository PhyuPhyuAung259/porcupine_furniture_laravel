@extends('layouts.adminmaster')
@section('title', 'Procupine AdminPanel')
@section('admin_content')
    @if (session()->has('message'))
        <!--successful message condition for session  -->
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <!--adding category to db-->
    <div class=" col-8 px-3 mx-auto">
        <h2 class="text-center py-2">Add Product</h2>
        @if (isset($product_edit))
            <form class=" " method="post" action="{{ route('productprocess.update', $product_edit->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
            @else
                <form class="" method="post" action="{{ route('productprocess.store') }}" enctype="multipart/form-data">
        @endif

        @csrf
        <div class="mb-3 row">
            <label for="Name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="name" placeholder="Enter Product Name"
                    value="{{ old('name', $product_edit->name ?? '') }}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" placeholder="Enter product description"
                    value="{{ old('description', $product_edit->description ?? '') }}" rows="7"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <span class="input-group-text">MMK</span>
                    <input type="text" class="form-control" name="price" id="price"
                        placeholder="Enter product price" value="{{ old('price', $product_edit->price ?? '') }}">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="discount_price" class="col-sm-2 col-form-label">Discount Price</label>
            <div class="col-sm-10">
                <div class="input-group mb-3">
                    <span class="input-group-text">MMK</span>
                    <input type="text" class="form-control" name="discount_price" id="discount_price"
                        placeholder="Enter product discount_price"
                        value="{{ old('discount_price', $product_edit->discount_price ?? '') }}">
                    <span class="input-group-text">.00</span>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="quantity" name="quantity"
                    placeholder="Enter product quantity" value="{{ old('quantity', $product_edit->quantity ?? '') }}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="image" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="image" name="image" placeholder="Choose product image"
                    value="{{ old('image', $product_edit->image ?? '') }}" />
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Category" class="col-sm-2 col-form-label">Product Category</label>
            <div class="col-sm-10">
                <select class="form-select form-select-lg form-control" name="category_id" id="category_id"
                    value="{{ old('category_id', $product_edit->category_id ?? '') }}" aria-label="Default select example">
                    <option selected>Choose Product Category</option>
                    @foreach ($category as $data)
                        <option value="{{ $data->category_name }}">{{ $data->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-5"></div>
            <div class="col-sm-4 center">
                <input type="submit" class="form-control btn btn-success" id="btn" name="btn" value="Save" />
            </div>
        </div>

        </form>
    </div>
    <!--adding category to db-->
@endsection
