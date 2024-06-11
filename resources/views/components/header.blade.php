<header class="container-fluid d-flex p-0 align-items-center rounded-bottom">
    <button type="button" class="btn ms-3 p-0 d-flex align-items-center me-3 d-md-none" data-z-target="#sidebar">
        <span class="material-symbols-outlined">menu</span>
    </button>
    <div class="pages ps-3 d-flex justify-content-center flex-column flex-fill">
        <div class="route container-fluid text-secondary p-0" >
            <ol class="breadcrumb m-0">
                <x-breadcrumb></x-breadcrumb>
            </ol>
        </div>
        <div class="title text-truncate w-50">{{ $slot }}</div>
    </div>
    <nav class="d-flex py-2 justify-content-end align-items-center">
        <div class="nav-item mx-3 d-flex rounded-circle overflow-hidden border">
            <a class="nav-link d-flex" href="/profile">
                <img class="img-fluid" width="28px" src="/assets/img/app.png" alt="" srcset="">
            </a>
        </div>
    </nav>
</header>