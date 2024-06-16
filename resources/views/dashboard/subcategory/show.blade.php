@extends('layouts.dashboard')

@section('contents')
<div class="container-fluid">
    <div class="row py-2">
        <div class="col-6">
            <div class="text-secondary">Name</div>
            <div class="fs-5 text-truncate">{{ $data->name }}</div>
        </div>
        <div class="col-6">
            <div class="text-secondary">Description</div>
            <div class="">{{ $data->description }}</div>
        </div>
    </div>
</div>
<div class="container-fluid py-3 flex-fill overflow-y-auto">
    
</div>
@endsection