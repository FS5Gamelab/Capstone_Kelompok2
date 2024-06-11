@extends('layouts.show')

@section('content')
<div class="content container-fluid flex-fill overflow-hidden my-2 bg-danger-subtle">
    <div class="row h-100 bg-warning">
        <div class="col-3">
            <img src="/assets/img/sample.jpeg" alt="" class="img-fluid">
        </div>
        <div class="col-9 h-100">
            <div class="container-fluid h-100">
                <div class="row align-items-start h-100 overflow-auto">
                    <div class="col-12 bg-danger">ABC</div>
                    <div class="col-12 bg-danger">ABC</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection