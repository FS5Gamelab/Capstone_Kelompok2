@extends('layouts.dashboard')

@section('contents')
<div class="content container-fluid h-100 d-flex flex-column overflow-auto">
    <div class="row justify-content-center py-3">
        <form class="col-6 py-2 rounded bg-light" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset>

                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" id="productName">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>  
                  <div class="mb-3">
                    <label for="productSize" class="form-label">Product Size</label>
                    <input type="text" class="form-control" name="size" id="productSize">
                    @error('size')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                 <div class="mb-3">
                    <label for="productStock" class="form-label">Product Stock</label>
                    <input type="number" class="form-control" name="stock" id="productStock">
                    @error('stock')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
               <div class="mb-3">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="number" class="form-control" name="price" id="productPrice">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="productStatus" class="form-label">Status</label>
                    <input type="text" class="form-control" name="status" id="productStatus">
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="productDiscount" class="form-label">Discount</label>
                    <select class="form-control" name="discount_id" id="productDiscount">
                        <option value="" selected disabled>Select Discount</option>
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
                    <input type="date" class="form-control" name="expired_at" id="productExpired">
                    @error('expired_at')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              <div class="mb-3">
                    <label for="productCategory" class="form-label">Category</label>
                    <select class="form-control" name="category_id" id="productCategory">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($subcategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
               <div class="mb-3">
                    <label for="productBrand" class="form-label">Brand</label>
                    <select class="form-control" name="brand_id" id="productBrand">
                        <option value="" selected disabled>Select Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <label for="productDescription" class="form-label">Product Description</label>
                    <textarea class="form-control" name="description" id="productDescription" rows="3"></textarea>
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
                </div>
                
                <div id="imagePreview" class="mt-3"></div>

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
            output.innerHTML = '<img src="' + reader.result + '" class="img-fluid" alt="Product Image">';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection