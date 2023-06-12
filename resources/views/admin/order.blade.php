@extends('layouts.adminmaster')

@section('admin_content')
    <div class=" col-12 px-3  ">
        @if (isset($orderdetail_list))
            <h2 class="text-center py-2">Order Detail List</h2>
        @else
            <h2 class="text-center py-2">All Order</h2>
        @endif

        <!--show Product data from db-->
        <div class=" ">
            @if (isset($orderdetail_list))
                <table class="table center ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order id</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderdetail_list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->order_id }}</td>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            @else
                <table class="table center ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CustomerName</th>
                            <th>Total Amount</th>
                            <th>Address</th>
                            <th>Order_date</th>
                            <th>Payment Method</th>
                            <th>Payment Transcation</th>
                            <th>Order Details</th>
                            <th>Order_State</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_list as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->grand_total_amount }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->order_date }}</td>
                                <td>{{ $data->payment_method }}</td>
                                @if ($data->payment_method == 'COD')
                                    <td>{{ $data->payment_image }}</td>
                                @else
                                    <td>
                                        <a href="uploads/payment_image/{{ $data->payment_image }}" class="lsb-preview">
                                            <img src="uploads/payment_image/{{ $data->payment_image }}" alt=""
                                                width="100px" height="100px">
                                        </a>
                                        <script>
                                            $(window).load(function() {
                                                $.fn.lightspeedBox();
                                            });
                                        </script>

                                    </td>
                                @endif

                                <td><a href="{{ url('orderdetail_list/' . $data->id) }}"
                                        class="btn btn-info">Order_detail</a>
                                </td>
                                <td><a href="{{ url('order_confirm/' . $data->id) }}" class="btn btn-info">Comfirm</a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <span>
                    {!! $order_list->withQueryString()->links('pagination::bootstrap-5') !!}
                </span>
            @endif



        </div>
    </div>
@endsection
