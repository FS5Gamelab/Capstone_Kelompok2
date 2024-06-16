@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="productName" placeholder="Enter category name..." required>
                @error('name')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Length
                        <div class="input-group">
                            <input class="form-control text-end" name="productLength" id="productLength" type="number">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Width
                        <div class="input-group">
                            <input class="form-control text-end" name="productWidth" id="productWidth" type="number">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Height
                        <div class="input-group">
                            <input class="form-control text-end" name="productHeight" id="productHeight" type="number">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                        </div>
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Weight
                        <div class="input-group">
                            <input class="form-control text-end" name="productWeight" id="productWeight" type="number">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">kg</div>
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 container-fluid">
                <div class="row">
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Stock
                        <div class="input-group">
                            <input class="form-control text-end" name="productWeight" id="productWeight" type="number">
                        </div>
                    </div>
                    <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                        Prices
                        <div class="input-group">
                            <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-start">Rp</div>
                            <input class="form-control text-end" name="productWeight" id="productWeight" type="number">
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productBrand" class="form-label">Brand</label>
                <select name="brand_id" id="productBrand" class="form-control">
                    <option value="" selected disabled>Select Brand</option>
                </select>
                @error('brand_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <select name="category_id" id="productCategory" class="form-control">
                    <option value="" selected disabled>Select Category</option>
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productSubCategory" class="form-label">Sub Category</label>
                <select name="subcategory_id" id="productSubCategory" class="form-control">
                    <option value="" selected disabled>Select Sub Category</option>
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="productDiscount" class="form-label">Discount (Optional)</label>
                <select name="discount_id" id="productDiscount" class="form-control">
                    <option value="" selected disabled>Select Discount</option>
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