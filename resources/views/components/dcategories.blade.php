<div class="col-12 col-lg-6 col-xl-6 col-xxl-4 p-2">
    <a class="nav-link d-flex bg-white rounded border overflow-hidden" href="/dashboard/categories/{{ $url }}">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <img class="img-fluid" src="{{ $img }}" alt="{{ $alt }}">
        </div>
        <div class="col-8 ps-2">
            <div class="fw-bold col-12 text-nowrap overflow-hidden text-truncate">{{ $slot }}</div>
            <div class="fs-7 col-12 d-flex">
                <p>{{ $desc }}</p>
            </div>
            <div class="col-12">
                ABC
            </div>
        </div>
        
    </a>
</div>