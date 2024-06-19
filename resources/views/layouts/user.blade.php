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

        #nav-all-tab, #nav-cat1-tab, #nav-cat2-tab, #nav-cat3-tab, #nav-cat4-tab {
            color: #0cc0df;
        }
        .btn-search {
            background-color: #fff;
            color: #0cc0df;
            border: 1px solid #0cc0df;
        }
        .btn-search:hover {
            background-color: #0cc0df;
            color: #fff;
        }
        .product-card {
            margin-bottom: 30px;
            cursor: pointer;
        }
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: #0cc0df;
        }
        .card-text {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
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
                    <img src="{{ asset('assets/img/logo-capstone1.png') }}" alt="Logo" class="d-inline-block align-text-top" href="{{ route('index') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#product">Products</a>
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

        <!-- Slideshow -->
        
        <!-- Product Detail Section -->
            @yield('contents')
        <!-- Show Product -->


        <!-- About Section -->
        <section class="row about-section" id="about">
            <div class="container">
                <h2>About Us</h2>
                <p>Welcome to our store! We offer a wide range of quality products to meet your needs. Our mission is to provide a pleasant shopping experience with a friendly touch. Shop with us and discover the best deals and products!</p>
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
    <!-- jQuery@3.7.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap@5.3.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    @yield('scripts')
</body>
</html>
