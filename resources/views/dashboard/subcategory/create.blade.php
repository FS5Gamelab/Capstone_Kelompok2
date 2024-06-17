@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('sub-categories.store') }}">
            @csrf
            <div class="mb-3 container-fluid">
                <label for="subCategoryName" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="subCategoryName" placeholder="Enter Sub-Category name..." required>
                @error('name')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <x-search-selection :contents="$categories" :value="old('brand_id', $categories[0]->code)" :text="old('subCategory', $categories[0]->name)" name="category"></x-search-selection>
            <div class="mb-3 container-fluid">
                <label for="subCategoryDescription" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="subCategoryDescription" rows="4" placeholder="Enter sub category description (Optional)"></textarea>
                @error('description')
                <div class="text-danger text-truncate">{{ $message }}</div>
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
    <x-search-selectionjs></x-search-selectionjs>
@endsection