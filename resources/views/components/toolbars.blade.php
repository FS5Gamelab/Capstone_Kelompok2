<div class="content container-fluid">
    <div class="row py-3 gap-1">
        @if (session()->has("response"))
            <div class="col-12">
                <div class="alert alert-{{ session("response")['status'] }} alert-dismissible fade show" role="alert">
                    {{ session("response")['messages'] }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="col-12 d-flex gap-2">
            <form class="input-group" action="">
                <button type="submit" class="btn border btn-primary input-group-text">Search</button>
                <input type="text" class="form-control" id="search" placeholder="Type something here..." required>
            </form>
            <button type="button" class="btn btn-secondary d-flex" data-bs-toggle="collapse" data-bs-target="#searchFilter">
                <span class="material-symbols-outlined fs-4">tune</span>
            </button>
            <a class="btn btn-success d-flex" href="/{{ Request::path() }}/create">
                <span class="material-symbols-outlined fs-4">add</span>
            </a>
        </div>
    </div>
</div>