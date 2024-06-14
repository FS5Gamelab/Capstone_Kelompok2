@extends('layouts.dashboard')

@section('content')
<div class="content container-fluid h-100 d-flex flex-column">
    <div class="row justify-content-center py-2">
        <form class="col-6 py-2 rounded bg-light" method="POST" action="{{ route('category.store') }}">
            @csrf
            <fieldset>

                <div class="mb-3">
                    <label for="categoryName" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="categoryName">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="categoryDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="categoryDescription" rows="3"></textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection