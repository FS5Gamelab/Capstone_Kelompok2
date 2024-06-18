<header class="container-fluid bg-dark">
    <div class="row">
        <div class="col d-flex d-md-none py-2">
            <a href="#" class="nav-link link-light d-flex text-truncate">
                <img src="{{ asset('assets/img/logo-capstone1.png') }}" alt="" class="border bg-light rounded" height="44px">
                <span class="px-3 d-flex justify-content-center align-items-center rounded-end fs-4">Mega Mart</span>
            </a>
        </div>
        <div class="col-md-4 col-lg-6 d-none d-md-flex flex-column">
            <div class="row">
                <x-breadcrumb></x-breadcrumb>
            </div>
            <div class="row align-items-center flex-fill">
                <div class="text-light h5 m-0 text-truncate">
                    {{ $title }}
                </div>
            </div>
        </div>
        <div class="col-auto d-flex d-md-flex ms-auto">
            <nav class="d-flex align-items-center gap-3 py-2">
                <div class="nav-item d-none d-md-block">
                    <button type="button" class="btn btn-dark p-1 d-flex">
                        <span class="material-symbols-outlined">fullscreen</span>
                    </button>
                </div>
                <div class="nav-item d-none d-sm-block">
                    <a href="#" class="btn btn-dark p-1 d-flex position-relative">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="position-absolute top-100 start-100 translate-middle badge rounded-pill text-danger">99</span>
                    </a>
                </div>
                <div class="nav-item d-none d-sm-block">
                    <a href="#" class="btn btn-dark p-1 d-flex position-relative">
                        <span class="material-symbols-outlined">mail</span>
                        <span class="position-absolute top-100 start-100 translate-middle badge rounded-pill text-danger">99</span>
                    </a>
                </div>
                <div class="vr text-light d-none d-sm-block"></div>
                <div class="nav-item d-flex d-md-none">
                    <button type="button" class="btn btn-dark d-flex" data-toggle="#sidebar">
                        <span class="material-symbols-outlined">menu</span>
                    </button>
                </div>
                <div class="nav-item dropdown d-none d-md-block">
                    <a type="button" class="btn btn-dark d-flex align-items-center p-1" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-2 border border-3 border-warning" src="{{ Auth::user()->image ? asset('storage/User/'.Auth::user()->image) : asset('storage/Default/user.png') }}" height="36px" alt="">
                        {{ Str::limit(Auth::user()->name, 15) }}
                    </a>
                    <div class="dropdown-menu mt-1 dropdown-menu-dark p-2 dropdown-menu-end">
                        <div class="nav-item d-flex mb-3">
                            <a href="#" class="nav-link link-light d-flex align-items-center flex-fill">
                                <span class="material-symbols-outlined me-2">person</span>
                                Profile
                            </a>
                        </div>
                        <div class="nav-item d-flex mb-3">
                            <a href="#" class="nav-link link-light d-flex align-items-center flex-fill">
                                <span class="material-symbols-outlined me-2">settings</span>
                                Setting
                            </a>
                        </div>
                        <div class="nav-item dropdown-divider"></div>
                        <div class="nav-item d-flex">
                            <a href="{{ route('logout') }}" class="nav-link link-danger d-flex align-items-center flex-fill">
                                <span class="material-symbols-outlined me-2">logout</span>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>