@include('porcupine.header')
<?php $totalgrandprice = 0; ?>
@if ($cart === null)
    <h5 class="text-center text-secondary"> You have no items in your shopping cart.</h5>
@else
    <div class="row">
        <div class="col-lg-10 col-12  ">
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
                            <a href="{{ url('checkout/' . $data->user_id) }}" class="btn btn-success">Check
                                Out</a>
                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif


@include('porcupine.footer')
