@include('porcupine.header')


<!-- Product Section Start -->
<section class="container" id="product">
    <div class="main-txt">
        <h3>Products</h3>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-4  d-none  d-lg-block ">
            <h3 style="color: #388B6F;" class="text-decoration-underline">
                Category
            </h3> <br>

            @foreach ($category as $data)
                <a href="{{ url('show_product/' . $data->id) }}" class="text-success">
                    <h6>{{ $data->category_name }}</h6>
                    <hr>
                </a>
            @endforeach
        </div>
        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="row">
                @foreach ($product as $data)
                    <div class="col-sm-6 col-md-6 col-lg-4 p-4">
                        <div class="card" style="width: 100%;">
                            <img src="{{ asset('uploads/product/' . $data->image) }}"
                                class="card-img-top img-fluid custom-card-image" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">{{ $data->name }}</h4>
                                <p class="card-text">{{ Str::limit($data->description, 100) }}</p>
                                @if ($data->discount_price != null)
                                    <p class="text-decoration-line-through card-text  "> Price - <span>
                                            ${{ $data->price }} </span>
                                    </p>
                                    <p class=" card-text text-danger">Discount Price -
                                        ${{ $data->discount_price }} </p>
                                @else
                                    <p class="card-text  "> Price - ${{ $data->price }} </p>
                                @endif

                                <a href="{{ url('product_detail/' . $data->id) }}" class="btn btn-success col-5">See
                                    More</a>
                                <a href="{{ url('/addtocart') }}" class="btn btn-outline-success col-6">Add to cart</a>


                            </div>
                        </div>
                    </div>
                @endforeach
                <span>
                    {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
                </span>
            </div>
        </div>
    </div>



</section>
<!-- Product Section End -->





<!--Footer start-->
@include('porcupine.footer')
<!--Footer end-->
