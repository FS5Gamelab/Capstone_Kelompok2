@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid flex-fill py-2 overflow-y-auto">
    <div class="row h-100">
        <div class="col-12 col-lg-6">
            <div class="container-fluid h-25 d-flex flex-column bg-secondary-subtle border rounded-top">
                <div class="">
                    <div class="text-secondary">Name</div>
                    <div class="fs-4 text-truncate">{{ $data->name }}</div>
                </div>
                <div class="flex-fill d-flex flex-column overflow-y-auto">
                    <div class="text-secondary">Description</div>
                    <div class=" overflow-y-auto flex-fill">{{ $data->description }}</div>
                </div>
            </div>
            <div class="container-fluid h-75 bg-light border rounded-bottom">B</div>
        </div>
        <div class="col-12 col-lg-6 bg-primary">B</div>
    </div>
</div>
@endsection