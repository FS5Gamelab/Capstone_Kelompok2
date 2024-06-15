@extends('layouts.dashboard')

@section('contents')
<div class="content container-fluid h-100 d-flex flex-column">
    <div class="row justify-content-center py-2">
        <form class="col-6 py-2 rounded bg-light" method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
            @csrf
            <fieldset>
                <div class="mb-3">
                    <label for="brandName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="brandName">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brandDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="brandDescription" rows="3"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="brandImage" class="form-label">Image</label>
                    <input
                   type="file" class="form-control" name="image" id="brandImage" onchange="previewImage(event)">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div id="imagePreview" class="mb-3"></div>
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
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" class="img-fluid" alt="Product Image">';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection