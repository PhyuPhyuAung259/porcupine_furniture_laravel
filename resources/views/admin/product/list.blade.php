@extends('layouts.adminmaster')
@section('title','Procupine AdminPanel')
@section('admin_content')
<div class=" col-8 px-3  ">
    <h2 class="text-center py-2">Product list</h2>
<!--show Product data from db-->
<div class="m-5">
    <table class="table center ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Quantity</th>
                <th>Category_id</th>
                <th>Image</th>
                <th>Status</th>
            </tr> 
        </thead>
        <tbody>
            @foreach($product as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->discount_price}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->category_id}}</td>
                    <td><img src="uploads/product/{{$data->image}}" alt="" width="100px" height="100px"></td>
                    <td>{{$data->status}}</td>
                    <td><a href="{{url('productprocess/'.$data->id.'/edit')}}" class="btn btn-info">Edit</a></td>
                    <td>
                        <form action="{{url('productprocess',[$data->id])}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE"/>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
 <!--show category data from db-->
@endsection