@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 container-fluid">
                <label for="productName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="productName" placeholder="Enter product name...">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productLength" class="form-label">Length</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="length" min="1" value="{{ old('length', 1) }}" id="productLength" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('length')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productWidth" class="form-label">Width</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="width" min="1" value="{{ old('width', 1) }}" id="productWidth" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('width')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productHeight" class="form-label">Height</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="height" min="1" value="{{ old('height', 1) }}" id="productHeight" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('height')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        <label for="productWeight" class="form-label">Weight</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="weight" min="1" value="{{ old('weight', 1) }}" id="productWeight" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">kg</div>
                        </div>
                        @error('weight')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>            
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        Stock
                        <div class="input-group">
                            <input class="form-control text-end" name="stock" min="1" value="{{ old('stock', 1) }}" id="productStock" type="number">
                        </div>
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center">
                        Prices
                        <div class="input-group">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-start">Rp</div>
                            <input class="form-control text-end" name="price" min="1" value="{{ old('price', 1) }}" id="productPrice" type="number">
                        </div>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-sm">
                        <input type="checkbox" class="form-check-input" name="is_expired" value="1" id="isExpired" {{ old('is_expired') ? 'checked' : '' }}>
                        <label for="isExpired" class="form-label">Product have an expiration date?</label>
                    </div>
                </div>
                <div class="expireDate row {{ old('is_expired') != true ? 'd-none' : '' }}">
                    <div class="col-sm input-group">
                        <label for="productExpired" class="text-bg-dark d-flex align-items-center px-1 rounded-start">Expired at</label>
                        <input type="date" class="form-control" name="expired_at" value="{{ old('expired_at') }}" id="productExpired">
                    </div>
                </div>
                @error('expired_at')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <x-search-selection 
                    :referenceData="$brands" 
                    referenceLabel="Brand" 
                    referenceRequest="brand" 
                    referenceValue="{{ $brands[0]->code }}" 
                    referenceName="{{ $brands[0]->name }}"></x-search-selection>
                </div>
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <x-search-selection 
                    :referenceData="$categories" 
                    referenceLabel="Category" 
                    referenceRequest="sub_category" 
                    referenceValue="{{ $categories[0]->code }}" 
                    referenceName="{{ $categories[0]->name }}"></x-search-selection>
                </div>
            </div>
            <div class="mb-3 container-fluid">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="productDescription" maxlength="225" rows="4" placeholder="Enter category description (Optional)">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="form-label">Tetapkan Produk sebagai Pre-Order?</div>
                <div class="col form-check">
                    <input type="radio" class="form-check-input" name="pre_order" value="1" id="statusTrue" {{ old('pre_order') == 1 ? 'checked' : '' }}>
                    <label for="statusTrue" class="form-label">Ya</label>
                </div>
                <div class="col form-check">
                    <input type="radio" class="form-check-input" name="pre_order" value="0" id="statusFalse" {{ old('pre_order') == 0 ? 'checked' : '' }}>
                    <label for="statusFalse" class="form-label">Tidak</label>
                </div>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div id="imagePreview" class="mb-3 text-center"></div>
                <label for="productImage" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="productImage" onchange="previewImage(event)">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid d-flex">
                <button class="btn btn-success mx-auto" type="submit">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" class="border" height="160px" alt="Product Image">';
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    $('#isExpired').change(function(){
        if ($(this).is(':checked')) {
            $('#productExpired').val('{{ date('Y-m-d') }}');
            $('.expireDate').removeClass('d-none');
        } else {
            $('#productExpired').val('');
            $('.expireDate').addClass('d-none');
        }
    });
</script>
<x-search-selectionjs></x-search-selectionjs>
@endsection