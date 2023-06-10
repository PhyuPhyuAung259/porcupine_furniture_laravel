@include('porcupine.header')
@if (session()->has('message'))
    <!--successful message condition for session  -->
    <div class="alert alert-success text-center">
        {{ session()->get('message') }}
    </div>
@endif
<?php $grandTotalAmount = 0; ?>
<div class="container center">
    <form action="{{ url('/confirm_checkout') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <h4 class="text-center my-3">Confirm your contact information</h4>
            <div class="mb-3 col-lg-4 col-md-10 col-sm-10">
                <label for="address" class="form-label">Your Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
            </div>
            <div class="mb-3 col-lg-4 col-md-10 col-sm-10">
                <label for="phone" class="form-label">Your Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>
            <div class="mb-3 col-lg-4 col-md-10 col-sm-10">
                <label for="email" class="form-label">Your Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="row my-3">
            <h4>Check Your Shopping Cart</h4>
            <div class="col-lg-7 col-md-6 col-sm-12 border-end border-secondary">
                @foreach ($cart as $items)
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <img src="{{ asset('uploads/product/' . $items->image) }}" alt="">
                        </div>
                        <div>
                            <h6> Product_Name: {{ $items->product_name }}</h6>
                            <h6> Price: ${{ $items->price }} </h6>
                            <h6> Quantity: {{ $items->quantity }} </h6>
                            <h6> Total_Price: $ {{ $items->total_price }}</h6>
                        </div>
                        <?php $grandTotalAmount = $grandTotalAmount + $items->total_price; ?>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">

                <h6>Choose Payment Method:</h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="payment" value="KBZPay">
                    <label class="form-check-label" for="KBZPay">KBZPay</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="payment" value="WavePay">
                    <label class="form-check-label" for="wavepay">WavePay</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="cod" value="COD">
                    <label class="form-check-label" for="cod">Cash On Delivery</label>
                </div>
                <div class="my-2">
                    <label for="payment_ss" class="text-danger">If you will choose KBZPay or WavePay, please add the
                        transaction screenshot.
                    </label>
                    <input type="file" class="form-control" name="payment_ss" id="payment_ss" />
                </div>
                <div class="mb-3 row">
                    <label for="grandtotalamount" class="col-sm-5 col-lg-5 col-md-5 col-form-label">Grand Total
                        Amount</label>
                    <div class="col-sm-7 col-lg-7 col-md-7">
                        <input type="text" class="form-control" id="grandtotalamount" name="grandtotalamount"
                            value="{{ $grandTotalAmount }}" readonly>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Check Out</button>
                </div>
            </div>
        </div>
    </form>

</div>
@include('porcupine.footer')
