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
                    <h4>{{ $data->name }}</h4>
                    <img src="{{ asset('uploads/product/' . $data->image) }}" alt="">

                </div>
                <div class="col-lg-6 col-sm-12 d-flex flex-column justify-content-center">
                    @if ($data->discount_price != null)
                        <h5> Price - <span class="text-decoration-line-through card-text ">
                                ${{ $data->price }} </span>
                        </h5>
                        <h5 class=" card-text text-danger">Discount Price -
                            ${{ $data->discount_price }} </h5>
                    @else
                        <h5 class="card-text  "> Price - ${{ $data->price }} </h5>
                    @endif
                    <h4>About product</h4>
                    <p>{{ $data->description }}</p>
                    <a href="{{ url('/addtocart') }}" class="btn btn-success col-3">Add to cart</a>
                </div>
            </div>

        </div>
    @endforeach
</section>
@include('porcupine.footer')
