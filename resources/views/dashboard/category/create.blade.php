@extends('layouts.dashboard')

@section('contents')
    <div class="row justify-content-center py-3">
        <form class="col-11 col-sm-10 col-md-9 col-lg-8 col-xl-7 col-xxl-6 form-light p-3 border rounded shadow" method="post" action="{{ route('categories.store') }}">
            @csrf
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" id="categoryName" placeholder="Enter category name..." required>
                @error('name')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Category Name</label>
                <textarea class="form-control" name="description" id="categoryDescription" rows="4" placeholder="Enter category description (Optional)"></textarea>
                @error('description')
                <div class="text-danger text-truncate">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex">
                <button class="btn btn-success mx-auto" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection