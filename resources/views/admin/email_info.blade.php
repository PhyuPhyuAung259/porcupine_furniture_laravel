@extends('layouts.adminmaster')
@section('title', 'Sending Mail to user')
@section('admin_content')

    <div class="row">
        <div class=" col-8 px-4 mx-auto">
            <form action="{{ url('send_user_email', $order->id) }}" method="POST">
                @csrf
                <h4 class="text-center my-3 py-4">Sending Mail to <span
                        class="text-decoration-underline">{{ $order->email }}</span>
                </h4>
                <div class="mb-4 row">
                    <label for=" " class="col-sm-2 col-lg-3 col-form-label">Email Greeting</label>
                    <div class="col-sm-10 col-lg-5 ">
                        <input type="text" class="form-control" id="greeting" name="greeting" value="">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for=" " class="col-sm-2 col-lg-3 col-form-label">Email Firstline</label>
                    <div class="col-sm-10 col-lg-5">
                        <input type="text" class="form-control" id="firstline" name="firstline" value="">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for=" " class="col-sm-2 col-lg-3 col-form-label">Email Body</label>
                    <div class="col-sm-10 col-lg-5">
                        <input type="text" class="form-control" id="body" name="body" value="">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for=" " class="col-sm-2 col-lg-3 col-form-label">Email Button</label>
                    <div class="col-sm-10 col-lg-5">
                        <input type="text" class="form-control" id="button" name="button" value="">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for=" " class="col-sm-2 col-lg-3 col-form-label">Email URL</label>
                    <div class="col-sm-10 col-lg-5">
                        <input type="text" class="form-control" id="url" name="url" value="">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for=" " class="col-sm-2 col-lg-3 col-form-label">Email Lastline</label>
                    <div class="col-sm-10 col-lg-5">
                        <input type="text" class="form-control" id="lastline" name="lastline" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-lg-3"></div>
                    <div class="col-sm-4 center">
                        <input type="submit" class="form-control btn btn-success col-auto" id="btn" name="btn"
                            value="Send Email" />
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
