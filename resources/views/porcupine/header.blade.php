<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porcupine Furniture</title>

    <!-- Style Css Link -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Style Css Link -->

    <!-- Font Awesome Cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Font Awesome Cdn -->

    <!--bootsrtap CDN-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!--bootstrap CDN-->
</head>

<body>

    <!-- Header Start -->
    <div class="header">
        <nav>
            <input type="checkbox" id="show-search">
            <input type="checkbox" id="show-menu">
            <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
            <div class="content">
                <div class="logo"><a href="index.html">
                        <h1>Procupine</h1>
                    </a></div>

                <ul class="links">
                    <li><a href="{{ url('/') }}" id="first">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="{{ url('/show_product') }}">Products</a></li>
                    <li><a href="#service">Service</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#review">Reviews</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('show_cart') }}">
                                    <img src="{{ asset('images/addtocart.png') }}" class="w-50 h-50" alt="">
                                </a></li>
                        @else
                            <li><a href="{{ route('login') }}">LogIn</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
            {{-- <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
            <form action="#" class="search-box">
                <input type="text" placeholder="Search" required>
                <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
            </form> --}}

        </nav>
    </div>
    <!-- Header End -->
