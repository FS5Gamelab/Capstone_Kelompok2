<nav class="d-flex gap-2">
    @foreach (Request::segments() as $path)
        @if ($path != Request::segment(count(Request::segments())))
            <div class="nav-item">
                <a href="{{ $href .= "/".$path }}" class="nav-link link-secondary pe-2">{{ $path === "dashboard" ? "Home" : Str::singular(Str::ucfirst($path)) }}</a>
            </div>
        @endif
    @endforeach
</nav>