<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Mart</title>
    <link rel="icon" href="{{ asset('assets/img/logo-capstone1.png') }}" />

    <!-- Bootstrap@5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Font | Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        header {
            font-weight: 700;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar {
            padding: 10px 20px;
        }
        .navbar-brand img {
            height: 40px;
        }
        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
            margin: 0 10px;
        }
        .navbar-nav .nav-link.active,
        .navbar-nav .nav-link:hover {
            color: #0cc0df;
        }
        .btn-login,
        .btn-signup {
            margin-left: 10px;
            font-weight: 500;
            border-radius: 5px;
        }
        .btn-login {
            background-color: #fff;
            color: #0cc0df;
            border: 1px solid #0cc0df;
        }
        .btn-login:hover {
            background-color: #0cc0df;
            color: #fff;
        }
        .btn-signup {
            background-color: #0cc0df;
            color: #fff;
        }
        .btn-signup:hover {
            background-color: #fff;
            color: #0cc0df;
            border: 1px solid #0cc0df;
        }
        .carousel-item img {
            width: 100%;
            height: 60vh;
            object-fit: cover;
        }
        .product-name {
            font-weight: 700;
            color: #333;
        }
        .product-category {
            color: #999;
        }
        .product-price {
            color: #0cc0df;
            font-weight: 600;
        }
        .product-description {
            color: #666;
            line-height: 1.6;
        }
        .product-options .form-label {
            font-weight: 500;
            color: #333;
        }
        .quantity-input {
            max-width: 80px;
        }
        .btn-cart {
            background-color: #0cc0df;
            color: #fff;
        }
        .btn-cart:hover {
            background-color: #fff;
            color: #0cc0df;
            border: 1px solid #0cc0df;
        }
        .about-section {
            background-color: #ffffff;
            padding: 60px 0;
            text-align: center;
        }
        .about-section h2 {
            font-weight: 700;
            color: #0cc0df;
            margin-bottom: 20px;
        }
        .about-section p {
            color: #666;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
        }
        footer {
            background-color: #02262c;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
        .footer-logo {
            height: 40px;
            margin-bottom: 10px;
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-links a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
        }
        .footer-links a:hover {
            color: #0cc0df;
        }
        .footer-copy {
            margin-top: 10px;
            font-size: 14px;
            font-weight: 100;
        }
        .pagination .page-item .page-link {
            color: #0cc0df;
        }
        .pagination .page-item.active .page-link {
            background-color: #0cc0df;
            border-color: #0cc0df;
            color: #fff;
        }
        .rating {
            color: #ffdd00;
            font-size: 24px;
        }
        .review {
            margin-bottom: 20px;
        }
        .review .review-author {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .review .review-date {
            font-size: 14px;
            color: #999;
        }
        .review .review-text {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header -->
        <header class="row">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('assets/img/logo-capstone1.png') }}" alt="Logo" class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}#product">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.cart') }}"><span class="material-icons">shopping_cart</span></a>
                            </li>
                        </ul>
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn btn-login btn-sm">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-signup btn-sm">Sign Up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Product Detail Section -->
        <section class="row py-5" id="product">
            <div class="container">
                <div class="row">
                    <!-- Product Image Slideshow -->
                    <div class="col-md-6">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ $product->image ? asset('storage/Products/'.$product->image) : asset('storage/Default/brand.png') }}" class="d-block w-100" alt="{{ $product->name }}">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="col-md-6">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-category text-muted">{{ $product->subCategory->name }}</p>
                        <h3 class="product-price">Rp{{ $product->price }},00</h3>
                        <p class="product-description">{{ $product->description }}</p>

                        <!-- Product Options -->
                        <form class="product-options" action="{{ route('product.show', $product->code) }}" method="post">
                            @csrf
                            {{-- <div class="mb-3">
                                <label for="productColor" class="form-label">Warna</label>
                                <select class="form-select form-select-sm" id="productColor">
                                    <option selected>Pilih warna</option>
                                    <option value="1">Merah</option>
                                    <option value="2">Biru</option>
                                    <option value="3">Hijau</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="productSize" class="form-label">Ukuran</label>
                                <select class="form-select form-select-sm" id="productSize">
                                    <option selected>Pilih ukuran</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select>
                            </div> --}}
                            <div class="mb-3">
                                <label for="productQuantity" class="form-label">Kuantitas</label>
                                <input type="number" class="form-control quantity-input form-control-sm" name="amount" id="productQuantity" value="1" min="1">
                            </div>
                            <button type="submit" class="btn btn-cart btn-md mt-3" id="btn-cart">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Customer Reviews Section -->
        <section class="row py-5">
            <div class="container">
                <h3 class="mb-4">Customer Reviews</h3>
                <div class="review">
                    <div class="review-author">Jonathan Jaelani</div>
                    <div class="rating">
                        <span class="material-icons">star</span>
                        <span class="material-icons">star</span>
                        <span class="material-icons">star</span>
                        <span class="material-icons">star_half</span>
                        <span class="material-icons">star_outline</span>
                    </div>
                    <div class="review-date">June 12, 2024</div>
                    <div class="review-text">Great product! High quality and fast delivery.</div>
                </div>
                <div class="review">
                    <div class="review-author">Bambang Smith</div>
                    <div class="rating">
                        <span class="material-icons">star</span>
                        <span class="material-icons">star</span>
                        <span class="material-icons">star</span>
                        <span class="material-icons">star</span>
                        <span class="material-icons">star</span>
                    </div>
                    <div class="review-date">June 10, 2024</div>
                    <div class="review-text">Absolutely love it! Will definitely buy again.</div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section row" id="about">
            <div class="container">
                <h2>About Mega Mart</h2>
                <p>Welcome to Mega Mart, your number one source for all things products. We're dedicated to giving you the very best of products, with a focus on dependability, customer service, and uniqueness.</p>
            </div>
        </section>

        <!-- Footer -->
        <footer class="row">
            <div class="container d-flex flex-column align-items-center">
                <img src="{{ asset('assets/img/logo-capstone1.png') }}" alt="Logo" class="footer-logo">
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#product">Products</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <div class="footer-copy">
                    <p>&copy; 2024 Mega Mart. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap@5.3.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qhM/5P1Zf6t4k5PxKrXfWjLVEltF2TlAT4LNpYf9OSAjp8XokpBuw95apxQzvZG" crossorigin="anonymous"></script>
</body>
</html>
