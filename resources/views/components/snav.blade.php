<div class="nav-item mb-2 {{ $active ? 'active' : '' }}">
    <a class="nav-link p-1 d-flex align-items-center border rounded" href="{{ $active ? "#" : $href }}">
        <span class="material-symbols-outlined">{{ $icon }}</span>
        <span class="flex-fill ps-2 text-nowrap text-truncate">{{ $slot }}</span>
    </a>
</div>