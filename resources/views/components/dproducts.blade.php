<div class="col-12 col-lg-6 col-xl-6 col-xxl-4 p-2">
    <a class="nav-link d-flex bg-white rounded overflow-hidden" href="{{ $url }}">
        <div class="col-4 d-flex">
            <img class="img-fluid" src="{{ $img }}" alt="{{ $alt }}">
        </div>
        <div class="col-8 ps-2">
            <div class="fw-bold col-12 text-nowrap overflow-hidden text-truncate">{{ $slot }}</div>
            <div class="fs-7 col-12 d-flex">
                <span class="col-5">Stok</span>
                <span class="col-7">{{ $stock }}</span>
            </div>
            <div class="fs-7 col-12 d-flex">
                <span class="col-5">Registered </span>
                <span class="col-7">{{ $reg }}</span>
            </div>
            <div class="fs-7 col-12 d-flex">
                <span class="col-5">Expired </span>
                <span class="col-7">{{ $exp }}</span>
            </div>
        </div>
    </a>
</div>