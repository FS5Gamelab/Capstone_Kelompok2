<div class="selectContainer col-sm container-fluid">
    <label for="referenceName" class="form-label">{{ $referenceLabel }}</label>
    <input type="hidden" class="selectedValue" name="{{ $referenceRequest }}_id" value="{{ old($referenceRequest."_id", $referenceValue) }}">
    <input type="text" class="selectedName form-control" name="referenceName" id="referenceName" value="{{ old($referenceRequest.'Name', $referenceName) }}" data-request="{{ $referenceRequest }}">
    @error($referenceRequest."_id")
    <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="selectOptions row position-relative d-none">
        <div class="col position-absolute z-1">
            <div class="selectGroups bg-light border d-flex flex-column px-2 py-1">
                @if($referenceData)
                    @foreach ($referenceData as $item)
                        <div class="btn btn-light py-0 mb-1 text-start text-truncate" data-code="{{ $item->code }}">{{ $item->name }}</div>
                    @endforeach
                @else
                    <div class="text-secondary text-start text-truncate">There's nothing here...</div>
                @endif
            </div>
        </div>
    </div>
</div>