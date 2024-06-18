<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mega Mart - Checkout</title>
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
        .section-title {
            font-weight: 700;
            color: #0cc0df;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .product-name {
            font-weight: 700;
            color: #333;
        }
        .product-price {
            color: #0cc0df;
            font-weight: 600;
        }
        .checkout-table th, .checkout-table td {
            vertical-align: middle;
        }
        .checkout-table .product-img {
            max-width: 100px;
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
                    <a class="navbar-brand" href="#">
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

        <!-- Checkout Section -->
        <section class="row-sm py-5" id="checkout">
            <div class="container">
                <h2 class="section-title">Checkout</h2>

                <!-- Shipping Address -->
                <div class="mb-5">
                    <h4 class="mb-3">Shipping Address</h4>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="recipientName" class="form-label">Recipient Name</label>
                                <input type="text" class="form-control" id="recipientName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="recipientPhone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="recipientPhone" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="shippingAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="shippingAddress" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="shippingCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="shippingCity" required>
                            </div>
                            <div class="col-md-6">
                                <label for="shippingPostalCode" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="shippingPostalCode" required>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Order Summary -->
                <div class="mb-5">
                    <h4 class="mb-3">Order Summary</h4>
                    <div class="table-responsive">
                        <table class="table checkout-table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="https://via.placeholder.com/100x100" class="img-fluid product-img" alt="Product Image">
                                        <span class="product-name">Product Name</span>
                                    </td>
                                    <td class="product-price">$100.00</td>
                                    <td>1</td>
                                    <td class="product-price">$100.00</td>
                                </tr>
                                <!-- Add more product rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="mb-5">
                    <h4 class="mb-3">Payment Method</h4>
                    <form>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard" value="creditCard" checked>
                            <label class="form-check-label" for="creditCard">
                                COD
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="debitCard" value="debitCard">
                            <label class="form-check-label" for="debitCard">
                                Bank Transfer
                            </label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal">
                            <label class="form-check-label" for="paypal">
                                Debit Card
                            </label>
                        </div>
                        <!-- Add more payment methods as needed -->
                    </form>
                </div>

                <!-- Price Details -->
                <div class="mb-5">
                    <h4 class="mb-3">Price Details</h4>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Product Price
                            <span>$100.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Shipping Fee
                            <span>$10.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Service Fee
                            <span>$5.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center total-price">
                            Total
                            <span>$115.00</span>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('invoice') }}" class="btn w-50 btn-checkout btn-lg">Place Order</a>
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
