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
@endsection

@section('contents')
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
@endsection

@section('scripts')
    
@endsection
