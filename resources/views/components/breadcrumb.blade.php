@foreach (Request::segments() as $path)

@if ($path != Request::segment(count(Request::segments())))
<li class="breadcrumb-item d-flex"><a class="nav-link" href="{{ $url .= "/".$path }}">{{ Str::ucfirst($path) }}</a></li>
@endif

@endforeach