@extends('layouts.dashboard')

@section('content')
<div class="content container-fluid h-100 d-flex flex-column">
    <div class="row py-3">
        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-2">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Name</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-success bg-success-subtle d-flex align-items-center rounded">trending_up</span>
                        <span class="fs-i2 ps-1 text-truncate">99.999.999</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-2">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Name</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-danger bg-danger-subtle d-flex align-items-center rounded">trending_down</span>
                        <span class="fs-i2 ps-1 text-truncate">99.999.999</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-0">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Name</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-success bg-success-subtle d-flex align-items-center rounded">trending_up</span>
                        <span class="fs-i2 ps-1 text-truncate">99.999.999</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Name</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-danger bg-danger-subtle d-flex align-items-center rounded">trending_down</span>
                        <span class="fs-i2 ps-1 text-truncate">99.999.999</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-fill">
        <div class="col-12 p-2">
            <canvas id="chart-line" class="chart-canvas shadow"></canvas>
        </div>
    </div>
</div>
<div class="content bg-success container-fluid h-100">

</div>
@endsection