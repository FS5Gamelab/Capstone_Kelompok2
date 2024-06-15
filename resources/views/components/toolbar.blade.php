<div class="position-relative z-0 container-fluid">
    <div class="row mx-2 mt-2 py-2 bg-light border rounded shadow">
        <div class="col">
            <form action="">
                <div class="input-group">
                    <button class="btn p-1 btn-primary d-flex" type="submit">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                    <input class="form-control p-1" type="search" name="search" placeholder="Enter keywords...">
                    <button class="btn p-1 btn-secondary d-flex" type="button">
                        <span class="material-symbols-outlined">tune</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-auto col-sm-2 col-md-4 col-lg-6">
            <nav class="d-flex">
                <div class="nav-item ms-auto">
                    <a href="/{{ Request()->path() }}/create" class="btn p-1 btn-success d-flex">
                        <span class="material-symbols-outlined">add</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>
</div>