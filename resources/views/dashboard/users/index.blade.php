@extends('layouts.dashboard')

@section('content')
<div class="content container-fluid">
    <div class="row py-3">
        <div class="col-12 d-flex gap-2 me-auto">
            <div class="col col-sm-6 col-md-8 col-lg-6 d-flex gap-2 me-auto">
                <form class="input-group" action="">
                    <button type="submit" class="btn border btn-primary input-group-text">Search</button>
                    <input type="text" class="form-control" id="search" placeholder="Type something here..." required>
                </form>
                <button type="button" class="btn btn-secondary d-flex">
                    <span class="material-symbols-outlined fs-4">tune</span>
                </button>
            </div>
            <div class="vr"></div>
            <div class="col-auto d-flex">
                <button type="button col" class="btn btn-success d-flex">
                    <span class="material-symbols-outlined fs-4">add</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="content container-fluid h-75 overflow-auto mt-2">
    <div class="row">
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
        <x-dproducts src="/assets/img/sample.jpeg" href="#" stock="9.999" reg="22 June 2024" exp="22 December 2024" alt="">Nama Product</x-dproducts>
    </div>
</div>
<div class="content container-fluid py-2 mt-auto"> 
    <div class="row">
        <div class="pages col-12 d-flex justify-content-center align-items-center gap-3 fw-bold">
            <a href="#" class="btn btn-secondary p-1 d-flex bg-secondary rounded">
                <span class="material-symbols-outlined">chevron_left</span>
            </a>
            <a href="#" class="nav-link link-dark disabled d-flex">1</a>
            <a href="#" class="nav-link link-secondary d-flex">2</a>
            <a href="#" class="nav-link link-secondary d-flex">3</a>
            <a href="#" class="nav-link link-secondary d-flex">4</a>
            <a href="#" class="nav-link link-secondary d-flex">5</a>
            <a href="#" class="nav-link link-secondary d-flex">6</a>
            <a href="#" class="nav-link link-secondary d-flex">7</a>
            <a href="#" class="nav-link link-secondary d-flex">8</a>
            <a href="#" class="nav-link link-secondary d-flex">9</a>
            <a href="#" class="nav-link link-secondary d-flex">10</a>
            <a href="#" class="btn btn-secondary p-1 d-flex bg-secondary rounded">
                <span class="material-symbols-outlined">chevron_right</span>
            </a>
        </div>
    </div>
</div>
@endsection