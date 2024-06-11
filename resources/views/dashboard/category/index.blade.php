@extends('layouts.list')

@section('content')
<div class="content container-fluid flex-fill overflow-auto mt-2">
    <div class="row">
        @foreach ($data as $category)
        <x-dcategories src="/assets/img/sample.jpeg" href="{{ $category->code }}" description="{{ $category->description }}" alt="">{{ $category->name }}</x-dcategories>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
    
@endsection