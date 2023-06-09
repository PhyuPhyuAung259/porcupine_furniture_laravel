@extends('layouts.adminmaster')
 
@section('admin_content')
    @if(session()->has('message')) <!--successful message condition for session  -->
        <div class="alert alert-success">
            {{session()->get('message')}}
        </div>
    @endif
        <!--adding category to db-->
        <div class="text-center">
            <h2 class="py-2">Add Category</h2>
                @if (isset($category_edit))

                    <form class=" " method="post" action="{{ route('categoryprocess.update', $category_edit->id) }}">
                    @method('PUT')

                @else

                    <form class= "" method="post" action="{{ route('categoryprocess.store') }}">

                @endif

                    @csrf
                        <input type="text" name="name" placeholder="Write category name" value="{{ old('name', $category_edit->category_name ?? '') }}">
                        <input type="submit" class="btn btn-success" name="submit" value="Add Category">
                    </form>
        </div>
        <!--adding category to db-->
        <!--show category data from db-->
        <div class="m-5">
            <table class="table center ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category_Name</th>
                        <th></th>
                        <th></th>
                    </tr>productprocess/create
                </thead>
                <tbody>
                    @foreach($category as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->category_name}}</td>
                            <td><a href="{{url('categoryprocess/'.$data->id.'/edit')}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form action="{{url('categoryprocess',[$data->id])}}" method="POST">
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
  
 
  
 