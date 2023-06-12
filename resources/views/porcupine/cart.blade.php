@include('porcupine.header')
<?php $totalgrandprice = 0; ?>

<div class="row">
    <div class="col-lg-12 col-12  ">
        @if (isset($cart))
            <table class="table my-3 mx-3">
                <thead>
                    <th>Product_Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Image</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($cart as $data)
                        <tr>
                            <td>{{ $data->product_name }}</td>
                            <td>{{ $data->quantity }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->total_price }}</td>
                            <td>
                                <img src="{{ asset('uploads/product/' . $data->image) }}"
                                    class="card-img-top img-fluid w-25 h-25" alt="...">
                            </td>
                            <td><a href="{{ url('delete_cart/' . $data->id) }}">
                                    <img src="{{ asset('images/deletefromcart.png') }}" class="w-75 h-75" alt="">
                                </a>
                            </td>
                            <?php $totalgrandprice = $totalgrandprice + $data->total_price; ?>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <h5>Total Grand Price -</h5>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <h5><?php echo $totalgrandprice; ?></h5>
                        </td>
                        <td>
                            <a href="{{ url('checkout/') }}" class="btn btn-success">Check
                                Out</a>
                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        @else
            <div class="text-center m-5">
                <h5 class="text-center text-danger">"Your cart is empty. Start shopping now!"</h5>
                <a href="{{ url('/show_product') }}" class="btn btn-success">Continue Shopping</a>
            </div>

        @endif

    </div>
</div>



@include('porcupine.footer')
