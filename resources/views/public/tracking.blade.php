<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Tracking</title>
    <link rel="icon" href="{{ asset('assets/img/logo-capstone1.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
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
            padding: 10px 20px;
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
        .tracking-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .tracking-header, .tracking-body, .tracking-footer {
            margin-bottom: 20px;
        }
        .tracking-header {
            text-align: center;
        }
        .tracking-header h1 {
            margin-top: 10px;
            font-weight: 700;
        }
        .order-info, .product-info, .shipping-info {
            margin-bottom: 20px;
        }
        .info-title {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .info-content p {
            margin: 0;
        }
        .product-list {
            width: 100%;
            border-collapse: collapse;
        }
        .product-list th, .product-list td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .product-list th {
            background-color: #f2f2f2;
            font-weight: 600;
        }
        .status-list {
            list-style: none;
            padding-left: 0;
        }
        .status-list li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .status-list li:last-child {
            border-bottom: none;
        }
        .status-time {
            font-size: 12px;
            color: #999;
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
        <header class="row">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('assets/img/logo-capstone1.png') }}" alt="Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{ route('index') }}#product">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('cart') }}"><span class="material-icons">shopping_cart</span></a></li>
                        </ul>
                        <div class="d-flex">
                            <a href="{{ route('login') }}" class="btn btn-login btn-sm">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-signup btn-sm">Sign Up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div class="tracking-container w-50">
            <div class="tracking-header">
                <h1>Order Tracking</h1>
                <div class="order-details">
                    <p>Order Number: ORD7891011</p>
                    <p>Tracking Number: TRK1234567890</p>
                </div>
            </div>

            <div class="tracking-body">
                <div class="order-info">
                    <div class="info-title">Order Information</div>
                    <div class="info-content">
                        <p>Order Date: June 15, 2024</p>
                        <p>Status: Shipped</p>
                    </div>
                </div>

                <div class="product-info">
                    <div class="info-title">Product Information</div>
                    <table class="product-list">
                        <thead>
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" alt="Product Image"></td>
                                <td>Product 1</td>
                                <td>SKU12345</td>
                                <td>2</td>
                                <td>$50</td>
                                <td>$100</td>
                            </tr>
                            <tr>
                                <td><img src="https://via.placeholder.com/50" alt="Product Image"></td>
                                <td>Product 2</td>
                                <td>SKU67890</td>
                                <td>1</td>
                                <td>$75</td>
                                <td>$75</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="shipping-info">
                    <div class="info-title">Shipping Information</div>
                    <div class="info-content">
                        <p>Shipping Method: Standard Shipping</p>
                        <p>Courier Service: XYZ Courier</p>
                        <p>Estimated Delivery: June 20, 2024</p>
                    </div>
                </div>

                <div class="tracking-status">
                    <div class="info-title">Tracking Status</div>
                    <ul class="status-list">
                        <li>
                            <p>Order Placed</p>
                            <span class="status-time">June 15, 2024, 10:00 AM</span>
                        </li>
                        <li>
                            <p>Order Processed</p>
                            <span class="status-time">June 15, 2024, 12:00 PM</span>
                        </li>
                        <li>
                            <p>Shipped</p>
                            <span class="status-time">June 16, 2024, 9:00 AM</span>
                        </li>
                        <li>
                            <p>Out for Delivery</p>
                            <span class="status-time">June 20, 2024, 8:00 AM</span>
                        </li>
                        <li>
                            <p>Delivered</p>
                            <span class="status-time">June 20, 2024, 2:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="tracking-footer">
                <p>Thank you for shopping with us!</p>
            </div>
        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qhM/5AfpC7FzAIC9j6zBgtT4egM9yozT9IhI7YO09mBUQjOeBIyRBrjYe2IHZvLD" crossorigin="anonymous"></script>
</body>
</html>
