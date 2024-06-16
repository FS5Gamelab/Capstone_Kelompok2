@extends('layouts.dashboard')

@section('contents')
<div class="content container-fluid h-100 d-flex flex-column overflow-auto">
    <div class="row justify-content-center py-2">
        <form class="col-6 py-2 rounded bg-light" method="POST" action="{{ route('brands.update', $brand->code) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>
                <div class="mb-3">
                    <label for="brandName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="brandName" value="{{ $brand->name }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brandDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="brandDescription" rows="3">{{ $brand->description }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <div id="imagePreview" class="mb-3 text-center">
                        @if($brand->image)
                                <img src="{{ asset('storage/Brands/'.$brand->image) }}" class="border" height="160px" alt="{{ $brand->name }}">
                        @endif
                    </div>
                    <label for="productImage" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="productImage" onchange="previewImage(event)">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Update</button>
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
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" class="border" height="160px" alt="Product Image">';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
