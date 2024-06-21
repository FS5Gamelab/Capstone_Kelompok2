@extends('layouts.user')

@section('contents')
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
        <section class="row py-5" id="product">
            <div class="container">
                <div class="row" id="productContainer">
                    <!-- Product Cards -->
                    @foreach ($relations as $item)
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
        <!-- About Section -->
