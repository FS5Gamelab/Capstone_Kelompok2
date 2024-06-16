@extends('layouts.show')

@section('contents')
<div class="content container-fluid flex-fill overflow-hidden my-2 bg-danger-subtle">
    <a href="{{ route('products.edit', $data->id) }}" class="btn btn-primary">edit</a>
    <form action="{{ route('products.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">delete</button>
    </form>
    {{-- @foreach ($data as $product)    --}}
    <div class="row h-100 bg-warning">
        <div class="col-3">
            <img src="{{ asset('storage/Products/' .$data->image) }}" alt="{{ $data->name }}" class="img-fluid">
        </div>
        <div class="col-9 h-100">
            <div class="container-fluid h-100">
                <div class="row align-items-start h-100 overflow-auto">
                    <div class="col-12 bg-danger">{{ $data->name }}</div>
                    <div class="col-12 bg-danger">{{ $data->code }}</div>
                    <div class="col-12 bg-danger">{{ $data->stock }}</div>
                    <div class="col-12 bg-danger">{{ $data->created_at }}</div>
                    <div class="col-12 bg-danger">{{ $data->expired_at }}</div>
                    <div class="col-12 bg-danger">{{ $data->price }}</div>
                    <div class="col-12 bg-danger">{{ $data->status }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
</div>
@endsection