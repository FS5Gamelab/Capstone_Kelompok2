<div class="mb-3 container-fluid">
    <div class="row">
        <div class="selectContainer col-sm container-fluid">
            <label for="{{ $name }}Name" class="form-label">Category</label>
            <input type="hidden" class="selectedValue" name="{{ $name }}_id" value="{{ $value }}">
            <input type="text" class="selectedName form-control" name="{{ $name }}" id="{{ $name }}Name" value="{{ $text }}">
            <div class="selectOptions row position-relative d-none">
                <div class="col position-absolute z-1">
                    <div class="selectGroups bg-light border d-flex flex-column px-2 py-1">
                        @if($contents)
                        @foreach ($contents as $item)
                            <div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="{{ $item->code }}">{{ $item->name }}</div>
                        @endforeach
                        @else
                        <div class="text-secondary text-start text-truncate">There's nothing here...</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>