<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
        .profile-container {
            background-color: #ffffff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 800px;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-header h1 {
            margin-top: 10px;
            font-weight: 700;
        }
        .profile-section {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: 600;
            margin-bottom: 10px;
        }
        .section-content p {
            margin: 0;
            margin-bottom: 5px;
        }
        .btn-edit-profile {
            margin-top: 10px;
            text-align: center;
        }
        .btn-edit {
            background-color: #0cc0df;
            color: #fff;
        }
        .btn-edit:hover {
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
        <header class="row">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ route('index') }}">
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

        <div class="profile-container">
            <div class="profile-header">
                <h1>User Profile</h1>
                <img src="https://via.placeholder.com/100" alt="User Avatar" class="rounded-circle">
            </div>
            <div class="btn-edit-profile">
                    <button class="btn btn-edit btn-primary btn-sm">Edit Profile</button>
                </div>

            <div class="profile-section">
                <div class="section-title">Personal Information</div>
                <div class="section-content">
                    <p><strong>Name:</strong> Bambang Smith</p>
                    <p><strong>Email:</strong> bambang@example.com</p>
                    <p><strong>Phone:</strong> +123 456 7890</p>
                    <p><strong>Address:</strong> 123 Main Street, City, Country</p>
                </div>
            </div>

            <div class="profile-section">
                <div class="section-title">Order History</div>
                <div class="section-content">
                    <p><strong>Order #1:</strong> Order ID - ORD123456, Date - June 10, 2024, Status - Delivered</p>
                    <p><strong>Order #2:</strong> Order ID - ORD654321, Date - June 15, 2024, Status - Shipped</p>
                </div>
            </div>

            <div class="profile-section">
                <div class="section-title">Payment Methods</div>
                <div class="section-content">
                    <p><strong>Credit Card:</strong> **** **** **** 1234</p>
                    <p><strong>PayPal:</strong> bambang@example.com</p>
                </div>
            </div>

            <div class="profile-section">
                <div class="section-title">Addresses</div>
                <div class="section-content">
                    <p><strong>Home:</strong> 123 Main Street, City, Country</p>
                    <p><strong>Office:</strong> 456 Business Ave, City, Country</p>
                </div>
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
