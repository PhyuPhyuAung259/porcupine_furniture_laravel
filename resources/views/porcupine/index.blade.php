@include('porcupine.header')
@include('porcupine.herosection')
    <!-- Service Start -->
    <section class="offers" id="service">
        <div class="offer-content">
            <div class="row">
                <i class="fa-solid fa-truck-fast"></i>
                <h3>Free Delivery</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="row">
                <i class="fa-solid fa-headset"></i>
                <h3>Support 24/7</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="row">
                <i class="fa-solid fa-rotate-left"></i>
                <h3>30 Day Return</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="row">
                <i class="fa-solid fa-cart-shopping"></i>
                <h3>Secure Shopping</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
    </section>
    <!-- Service End -->

    <!-- Product Section Start -->
    <section class="product" id="product">
        <div class="main-txt">
            <h3>Products</h3>
        </div>
        <div class="card-content">
            <div class="row mx-3">
                <img src="{{asset('images/p1.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/p2.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/p3.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/p4.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
        </div>

        <div class="card-content">
            <div class="row">
                <img src="{{asset('images/p5.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/p6.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/p7.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
            <div class="row">
                <img src="{{asset('images/p8.png')}}" alt="">
                <div class="card-body">
                    <h3>Chair</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                    <h5>Price $999</h5>
                    <button>Order Now</button>
                </div>
            </div>
        </div>

    </section>
    <!-- Product Section End -->





    <!-- Promotion Banner Start -->
    <div class="banner">
        <div class="banner-content">
            <h5>Get Discount Up To 50%</h5>
            <h3>Best Deal For Weak</h3>
            <p>Get up to 50% off this weak and get offer <br>Don't miss</p>
            <button><a href="#products">Order</a></button>
        </div>
    </div>
    <!--Promotion Banner End -->

    <!--Promotion Area Start-->
        @include('porcupine.promotion')
    <!--Promotion Area End-->

    <!-- Our Gallary Start -->
    <div class="gallary">
        <h3>Our Gallary</h3>
        <div class="gallary-img">
            <div class="img1">
                <img src="{{asset('images/g1.png')}}" alt="">
            </div>
            <div class="img1">
                <img src="{{asset('images/g2.png')}}" alt="">
                <img src="{{asset('images/g3.png')}}" alt="">
            </div>
        </div>
    </div>
    <!-- Our Gallary End -->

    <!-- Review Section Start -->
    <section class="review" id="review">
        <div class="main-txt">
            <h3>Customers <span>Review</span></h3>
        </div>

        <div class="review-content">
        <div class="box">
        <div class="img">
            <img src="{{asset('images/pic-1.png')}}" alt="">
        </div>
        <h3>Elon Musk</h3>
        <div class="star">
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, adipisci.</p>

    </div>
        <div class="box">
        <div class="img">
            <img src="{{asset('images/pic-2.png')}}" alt="">
        </div>
        <h3>Elon Musk</h3>
        <div class="star">
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, adipisci.</p>

    </div>
        <div class="box">
        <div class="img">
            <img src="{{asset('images/pic-3.png')}}" alt="">
        </div>
        <h3>Elon Musk</h3>
        <div class="star">
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
            <i class="fa-solid fa-star checked"></i>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. At, adipisci.</p>

    </div>

</div>

    </section>
    <!-- Review Section End -->

    <!--Footer start-->
    @include('porcupine.footer')
    <!--Footer end-->