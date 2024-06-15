@extends('layouts.show')

@section('content')
<div class="content container-fluid flex-fill overflow-hidden my-2 bg-danger-subtle">
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">edit</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">delete</button>
    </form>
    {{-- @foreach ($data as $product)    --}}
    <div class="row h-100 bg-warning">
        <div class="col-3">
            <img src="{{ asset('storage/Products/' .$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-9 h-100">
            <div class="container-fluid h-100">
                <div class="row align-items-start h-100 overflow-auto">
                    <div class="col-12 bg-danger">{{ $product->name }}</div>
                    <div class="col-12 bg-danger">{{ $product->code }}</div>
                    <div class="col-12 bg-danger">{{ $product->stock }}</div>
                    <div class="col-12 bg-danger">{{ $product->created_at }}</div>
                    <div class="col-12 bg-danger">{{ $product->expired_at }}</div>
                    <div class="col-12 bg-danger">{{ $product->price }}</div>
                    <div class="col-12 bg-danger">{{ $product->status }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
</div>
@endsection