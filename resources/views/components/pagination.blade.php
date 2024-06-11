<div class="content container-fluid py-2 mt-auto"> 
    <div class="row justify-content-center">
        <div class="pages col-12 col-xl-6 col-lg-10 col-md-10 d-flex gap-1 justify-content-center align-items-center fw-bold">
            <div class="col d-flex justify-content-center">
                <a href="{{ $pages->previousPageUrl() == '' ? '#' : $pages->previousPageUrl() }}" class="btn btn-secondary p-1 d-flex bg-secondary rounded">
                    <span class="material-symbols-outlined">chevron_left</span>
                </a>
            </div>
            @php
                $half = floor(9 / 2);
                $start = max($pages->currentPage() - $half, 1);
                $end = min($start + 8, $pages->lastPage());

                $start = max(min($start, $pages->lastPage() - 8), 1);
            @endphp
            @for ($i = $start; $i <= $end; $i++)
            <div class="col d-flex align-items-center justify-content-center">
                <a href="{{ $i != $pages->currentPage() ? $pages->url($i) : "#" }}" class="nav-link link-{{ $i == $pages->currentPage() ? 'dark disabled' : 'secondary' }} d-flex">{{ $i }}</a>
            </div>
            @endfor
            <div class="col d-flex justify-content-center">
                <a href="{{ $pages->nextPageUrl() == '' ? '#' : $pages->nextPageUrl() }}" class="btn btn-secondary p-1 d-flex bg-secondary rounded">
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            </div>
        </div>
    </div>
</div>