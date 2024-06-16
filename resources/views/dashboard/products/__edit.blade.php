@extends('layouts.dashboard')

@section('contents')
<div class="content container-fluid h-100 d-flex flex-column overflow-auto">
    <div class="row justify-content-center py-2">
        <form class="col-6 py-2 rounded bg-light" method="POST" action="{{ route('items.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>
                <input type="hidden" name="id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" id="productName" value="{{ $product->name }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 container-fluid">
                        <div class="row">
                            <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                                <label for="productLength" class="form-label">Length</label>
                                <div class="input-group">
                                    <input class="form-control text-end" name="length" id="productLength" type="number" step="0.01" value="{{ old('length', $size['length']) }}">
                                    <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                                </div>
                                    {{-- @php
                                        $product = $product->size;
                                        $product = json_decode($product, true);
                                        dd($product['length']);
                                    @endphp --}}
                                @error('length')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                                <label for="productWidth" class="form-label">Width</label>
                                <div class="input-group">
                                    <input class="form-control text-end" name="width" id="productWidth" type="number" step="0.01" value="{{ old('width', $size['width']) }}">
                                    <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                                </div>
                                @error('width')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                                <label for="productHeight" class="form-label">Height</label>
                                <div class="input-group">
                                    <input class="form-control text-end" name="height" id="productHeight" type="number" step="0.01" value="{{ old('height', $size['height']) }}">
                                    <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-end">m</div>
                                </div>
                                @error('height')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                                <label for="productWeight" class="form-label">Weight</label>
                                <div class="input-group">
                                    <input class="form-control text-end" name="weight" id="productWeight" type="number" step="0.01" value="{{ old('weight', $size['weight']) }}">
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
                                    <input class="form-control text-end" name="stock" id="productStock" type="number" value="{{ old('stock', $product->stock) }}">
                                </div>
                                @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6 col-md d-flex flex-column justify-content-center ps-2 pe-1">
                                Prices
                                <div class="input-group">
                                    <div class="bg-dark-subtle d-flex align-items-center px-1 border rounded-start">Rp</div>
                                    <input class="form-control text-end" name="price" id="productPrice" type="number" value="{{ old('price', $product->price) }}">
                                </div>
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="productStatus" class="form-label">Status</label>
                    <input type="text" class="form-control" name="status" id="productStatus" value="{{ old('status', $product->status) }}">
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="productDiscount" class="form-label">Discount</label>
                    <select class="form-control" name="discount_id" id="productDiscount">
                        <option value="{{ $product->discount_id }}">Select Discount</option>
                        @foreach ($discounts as $discount)
                            <option value="{{ $discount->id }}">{{ $discount->name }}</option>
                        @endforeach
                    </select>
                    @error('discount_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                 <div class="mb-3">
                    <label for="productExpired" class="form-label">Expired</label>
                    <input type="date" class="form-control" name="expired_at" id="productExpired" value="{{ old('expired_at', $product->expired_at ? $product->expired_at->format('Y-m-d') : '') }}">
                    @error('expired_at')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Category</label>
                    <select class="form-control" name="category_id" id="productCategory">
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->category_id ? 'selected' : '' }}>
                                {{ $subcategory->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
               <div class="mb-3">
                    <label for="productBrand" class="form-label">Brand</label>
                    <select class="form-control" name="brand_id" id="productBrand">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Product Description</label>
                    <textarea class="form-control" name="description" id="productDescription" rows="3">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="image" id="productImage" onchange="previewImage(event)">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div id="imagePreview" class="mb-3 text-center mt-2">
                        @if($product->image)
                            <img src="{{ asset('storage/Products/'.$product->image) }}" class="border" height="160px" alt="{{ $product->name }}">
                            @else
    
                        @endif
                    </div>
                </div>
                

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" class="border" height="160px" alt="Product Image">';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection