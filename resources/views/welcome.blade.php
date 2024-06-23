@extends('layouts.user')

@section('styles')
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
        .drop {
            padding: 4px 8px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
    </style>
@endsection

@section('contents')
        <!-- Slideshow -->
        <section class="row">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($products as $index => $item)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                    @endforeach
                </div>
                
                <div class="carousel-inner">
                    @foreach ($products as $item)   
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ asset('storage/Products/' . $item->image) }}" class="d-block w-100" alt="{{ $item->name }}">
                        </div>
                    @endforeach
                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- Show Product -->
        <section class="row py-5" id="product">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
                            <button class="nav-link" id="nav-cat1-tab" data-bs-toggle="tab" data-bs-target="#nav-cat1" type="button" role="tab" aria-controls="nav-cat1" aria-selected="false">Category 1</button>
                            <button class="nav-link" id="nav-cat2-tab" data-bs-toggle="tab" data-bs-target="#nav-cat2" type="button" role="tab" aria-controls="nav-cat2" aria-selected="false">Category 2</button>
                            <button class="nav-link" id="nav-cat3-tab" data-bs-toggle="tab" data-bs-target="#nav-cat3" type="button" role="tab" aria-controls="nav-cat3" aria-selected="false">Category 3</button>
                            <button class="nav-link" id="nav-cat4-tab" data-bs-toggle="tab" data-bs-target="#nav-cat4" type="button" role="tab" aria-controls="nav-cat4" aria-selected="false">Category 4</button>
                        </div>
                    </nav>
                    <div class="input-group w-50">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search products...">
                        <button class="btn btn-search" type="submit">Search</button>    
                    </div>
                </div>

                <div class="row" id="productContainer">
                    <!-- Product Cards -->
                    @foreach ($products as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6 product-card">
                            <div class="card" onclick="window.location.href='{{ route('product.show', $item->code) }}';">
                                <img src="{{ $item->image ? asset('storage/Products/'.$item->image) : asset('storage/Default/brand.png') }}" class="card-img-top" alt="{{ $item->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p class="card-text">{{ substr($item->description, 0, 50) }}...</p>
                                    <p class="card-text">Rp{{ $item->price }},00</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" id="pagination">
                            <!-- Pagination items will be dynamically added here -->
                    </ul>
                </nav>
            </div>
        </section>
@endsection

@section('scripts')
    <script>
        const products = [
                @foreach ($products as $item)
                    {
                        id: {{ $loop->iteration }},
                        code: {{ $item->code }},
                        title: {{ $item->name }},
                        description: {{ $item->description }},
                        price: {{ $item->price }},
                        imgSrc: {{ $item->image ? asset('storage/Products/'.$item->image) : asset('storage/Default/brand.png') }},
                    },
                @endforeach
            ];

            let currentPage = 1;
            const itemsPerPage = 12;

            function displayProducts(page) {
                const productContainer = document.getElementById('productContainer');
                productContainer.innerHTML = '';
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;
                const paginatedItems = products.slice(start, end);

                paginatedItems.forEach(product => {
                    const productCard = `
                        <div class="col-lg-3 col-md-4 col-sm-6 product-card">
                            <div class="card" onclick="window.location.href='/product/${product.code}';">
                                <img src="${product.imgSrc}" class="card-img-top" alt="${product.title}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.title}</h5>
                                    <p class="card-text">${product.description}</p>
                                    <p class="card-text">Price: $${product.price}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    productContainer.insertAdjacentHTML('beforeend', productCard);
                });

                renderPagination();
            }

            function renderPagination() {
                const paginationContainer = document.getElementById('pagination');
                paginationContainer.innerHTML = '';
                const pageCount = Math.ceil(products.length / itemsPerPage);

                for (let i = 1; i <= pageCount; i++) {
                    const pageItem = `
                        <li class="page-item ${i === currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" onclick="goToPage(${i})">${i}</a>
                        </li>
                    `;
                    paginationContainer.insertAdjacentHTML('beforeend', pageItem);
                }
            }

            function goToPage(page) {
                currentPage = page;
                displayProducts(page);
            }

            function searchProducts() {
                const searchTerm = document.getElementById('searchInput').value.toLowerCase();
                const filteredProducts = products.filter(product => product.title.toLowerCase().includes(searchTerm) || product.description.toLowerCase().includes(searchTerm));

                const productContainer = document.getElementById('productContainer');
                productContainer.innerHTML = '';
                filteredProducts.forEach(product => {
                    const productCard = `
                        <div class="col-lg-3 col-md-4 col-sm-6 product-card">
                            <div class="card" onclick="window.location.href='#';">
                                <img src="${product.imgSrc}" class="card-img-top" alt="${product.title}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.title}</h5>
                                    <p class="card-text">${product.description}</p>
                                    <p class="card-text">Price: $${product.price}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    productContainer.insertAdjacentHTML('beforeend', productCard);
                });

                renderPagination();
            }

            document.getElementById('searchInput').addEventListener('input', searchProducts);

            displayProducts(currentPage);
    </script>
@endsection