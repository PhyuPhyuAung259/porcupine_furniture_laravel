@include('porcupine.header')

<section class="product_detail">
    @foreach ($product as $data)
        <nav aria-label="breadcrumb" class="p-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/show_product') }}">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
            </ol>
        </nav>
        <div class="container">
            <div class="row py-3">
                <div class="col-lg-6 col-sm-12">

                    <img src="{{ asset('uploads/product/' . $data->image) }}" alt="">

                </div>
                <div class="col-lg-6 col-sm-12 d-flex flex-column justify-content-center">
                    <form action="{{ url('addtocart/' . $data->id) }}" method="POST">
                        @csrf
                        <h4>{{ $data->name }}</h4>
                        @if ($data->discount_price != null)
                            <p> <span class="text-decoration-line-through card-text ">
                                    ${{ $data->price }} </span>
                            </p>
                            <p class=" card-text   fw-bolder">
                                ${{ $data->discount_price }} </p>
                        @else
                            <h5 class="card-text  "> Price - ${{ $data->price }} </h5>
                        @endif
                        <p class="text-secondary fw-light">(Additional tax may apply on checkout)</p>
                        <div class="row">
                            @if ($data->quantity <= 5 && $data->quantity > 0)
                                <h6 class="text-danger"> This product left only {{ $data->quantity }} . </h6>
                                <input type="number" id="quantity" name="quantity" min="1" max="5"
                                    class="col-3 mb-2 mx-2" placeholder="Quantity">
                                <button type="submit" class="btn btn-outline-success col-3 mb-1">Add to cart</button>
                            @endif
                            @if ($data->quantity == 0)
                                <h6 class="text-danger">This product is out of stock</h5>
                            @endif
                            @if ($data->quantity == 0)
                                <input type="number" id="quantity" name="quantity" min="1" max="5"
                                    class="col-3 mb-2 mx-2" placeholder="Quantity">
                                <button type="submit" class="btn btn-outline-success col-3 mb-1">Add to cart</button>
                            @endif

                        </div>

                        <h4>Product Details</h4>
                        <p>{{ $data->description }}</p>

                    </form>
                </div>
            </div>

        </div>
    @endforeach
</section>
@include('porcupine.footer')
