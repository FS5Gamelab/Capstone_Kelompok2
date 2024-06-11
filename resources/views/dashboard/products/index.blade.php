@extends('layouts.list')

@section('content')
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

@section('scripts')
    
@endsection