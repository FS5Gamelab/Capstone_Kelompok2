<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Mart - Shopping Cart</title>
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
        .product-name {
            font-weight: 400;
            color: #333;
        }
        .product-price {
            color: #0cc0df;
            font-weight: 400;
        }
        .cart-table th, .cart-table td {
            vertical-align: middle;
        }
        .cart-table .product-img {
            max-width: 100px;
        }
        .btn-remove {
            color: #ff0000;
        }
        .btn-remove:hover {
            color: #cc0000;
        }
        .total-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0cc0df;
        }
        .btn-checkout {
            background-color: #0cc0df;
            color: #fff;
        }
        .btn-checkout:hover {
            background-color: #fff;
            color: #0cc0df;
            border: 1px solid #0cc0df;
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
                                <a class="nav-link" href="#"><span class="material-icons">shopping_cart</span></a>
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

        <!-- Shopping Cart Section -->
        <section class="row-sm py-5" id="shopping-cart">
            <div class="container">
                <h2 class="text-center mb-4" style="font-weight: 700; color: #0cc0df;">Shopping Cart</h2>
                <div class="table-responsive">
                    <table class="table cart-table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $item)
                            @php
                                $total += ($item->amount * $item->product->price)
                            @endphp
                            <tr>
                                <td>
                                    <img src="{{ $item->product->image ? asset('storage/Products/'.$item->product->image) : asset('storage/Default/brand.png') }}" class="img-fluid product-img" alt="{{ $item->product->name }}">
                                    <span class="product-name">{{ $item->product->name }}</span>
                                </td>
                                <td class="product-price">{{ $item->product->price }}</td>
                                <td>
                                    <input type="number" name="amount" class="form-control quantity-input form-control-sm" value="{{ $item->amount }}" min="1">
                                </td>
                                <td class="product-price">Rp{{ $item->amount * $item->product->price }}</td>
                                <td>
                                    <button class="btn btn-remove"><span class="material-icons">delete</span></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-4">
                    <span class="total-price me-3">Total: Rp{{ $total }}</span>
                    <a href="{{ route('checkout') }}" class="btn btn-checkout">Checkout</a>
                </div>
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
