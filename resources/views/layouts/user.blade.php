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

    @yield('styles')
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
                            <a class="nav-link" aria-current="page" href="/">Products</a>
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
                    @guest     
                    <div class="d-flex">
                        <a href="{{ route('login') }}" class="btn btn-login btn-sm">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-signup btn-sm">Sign Up</a>
                    </div>
                    @else
                    <div class="nav-item dropdown d-none d-md-block">
                        <a type="button" class="drop btn btn-login d-flex align-items-center p-1" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-2" 
                                 src="{{ optional(Auth::user())->image ? asset('storage/User/'.Auth::user()->image) : asset('assets/img/default/user.png') }}" 
                                 height="36px" width="36px" 
                                 alt="{{ optional(Auth::user())->name ?? 'User' }}">
                            {{ Str::limit(optional(Auth::user())->name, 15, '...') }}
                        </a>
                        <div class="dropdown-menu mt-1 dropdown-menu-light p-2 dropdown-menu-end">
                            <div class="nav-item d-flex mb-3">
                                <a href="{{ route('profile') }}" class="nav-link link-dark d-flex align-items-center flex-fill">
                                    <span class="material-symbols-outlined me-2">person</span>
                                    Profile
                                </a>
                            </div>
                            <div class="nav-item d-flex mb-3">
                                <a href="#" class="nav-link link-dark d-flex align-items-center flex-fill">
                                    <span class="material-symbols-outlined me-2">settings</span>
                                    Setting
                                </a>
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="nav-item d-flex" style="cursor: pointer">
                                <a class="nav-link link-danger d-flex align-items-center flex-fill"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="material-symbols-outlined me-2">logout</span>
                                    Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    @endguest
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
