@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="productName" placeholder="Enter product name...">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        <label for="productLength" class="form-label">Length</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="length" min="1" value="1" id="productLength" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('length')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        <label for="productWidth" class="form-label">Width</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="width" min="1" value="1" id="productWidth" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('width')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        <label for="productHeight" class="form-label">Height</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="height" min="1" value="1" id="productHeight" type="number" step="0.01">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                        @error('height')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        <label for="productWeight" class="form-label">Weight</label>
                        <div class="input-group">
                            <input class="form-control text-end" name="weight" min="1" value="1" id="productWeight" type="number" step="0.01">
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
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Stock
                        <div class="input-group">
                            <input class="form-control text-end" name="stock" min="1" value="1" id="productStock" type="number">
                        </div>
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Prices
                        <div class="input-group">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-start">Rp</div>
                            <input class="form-control text-end" name="price" min="1" value="1" id="productPrice" type="number">
                        </div>
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="productExpired" class="form-label">Expired</label>
                <input type="date" class="form-control" name="expired_at" id="productExpired">
                @error('expired_at')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productBrand" class="form-label">Brand</label>
                <select name="brand_id" id="productBrand" class="form-control">
                    <option value="" selected disabled>Select Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->code }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                @error('brand_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productCategory" class="form-label">Sub Category</label>
                <select class="form-control" name="category_id" id="productCategory">
                    <option value="" selected disabled>Select Category</option>
                    @foreach ($categories as $category)
                    <optgroup label="{{ $category->name }}">
                        @if ($category->subCategories->isNotEmpty())
                            @foreach ($category->subCategories as $subCategory)
                                <option value="{{ $subCategory->code }}">{{ $subCategory->name }}</option>
                            @endforeach
                        @else
                            <option disabled>-</option>
                        @endif
                    </optgroup>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="productDescription" rows="4" placeholder="Enter category description (Optional)"></textarea>
                @error('description')
                    <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-label">Tetapkan Produk sebagai Pre-Order?</div>
                <div class="col form-check">
                    <input type="radio" class="form-check-input" name="pre_order" value="1" id="statusTrue">
                    <label for="statusTrue" class="form-label">Ya</label>
                </div>
                <div class="col form-check">
                    <input type="radio" class="form-check-input" name="pre_order" value="0" id="statusFalse" checked>
                    <label for="statusFalse" class="form-label">Tidak</label>
                </div>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div id="imagePreview" class="mb-3 text-center"></div>
                <label for="productImage" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="productImage" onchange="previewImage(event)">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex">
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
</script>
@endsection