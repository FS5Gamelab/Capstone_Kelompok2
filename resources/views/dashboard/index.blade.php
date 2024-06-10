@extends('layouts.dashboard')

@section('content')
<div class="content container-fluid h-100 d-flex flex-column">
    <div class="row py-3">
        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-2">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Uang Masuk</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-success bg-success-subtle d-flex align-items-center rounded">trending_up</span>
                        <span class="fs-i2 ps-1 text-truncate">Rp11,45jt</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-2">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Uang Keluar</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-danger bg-danger-subtle d-flex align-items-center rounded">trending_down</span>
                        <span class="fs-i2 ps-1 text-truncate">Rp4.675.340</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 mb-2 mb-sm-0">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Pengunjung</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-success bg-success-subtle d-flex align-items-center rounded">trending_up</span>
                        <span class="fs-i2 ps-1 text-truncate">258.439</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="d-flex shadow rounded">
                <span class="material-symbols-outlined fs-1 bg-warning col-3 d-flex align-items-center justify-content-center rounded-start">box</span>
                <div class="col-9 rounded-end bg-light">
                    <div class="col ps-2 fs-i5 text-secondary text-nowrap text-truncate">Anggota</div>
                    <div class="d-flex ps-2 align-items-center">
                        <span class="material-symbols-outlined my-1 fs-i1 fw-bold text-danger bg-danger-subtle d-flex align-items-center rounded">trending_down</span>
                        <span class="fs-i2 ps-1 text-truncate">54.592</span>
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

@section('scripts')
<script>
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Sales",
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#6c757dbe",
            borderWidth: 3,
            fill: true,
            data: [50, 40, 300, 50, 40, 300, 220, 500, 250, 400, 230, 150],
            maxBarThickness: 6

        },
        {
            label: "Visitors",
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#0d6efdbe",
            borderWidth: 3,
            fill: true,
            data: [30, 90, 40, 30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
        },
        {
            label: "Viewing Products",
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#ffc107be",
            borderWidth: 3,
            fill: true,
            data: [40, 140, 290, 290, 30, 90, 40, 30, 90, 340, 330, 300],
            maxBarThickness: 6
        },
        ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
        legend: {
            display: false,
        }
        },
        interaction: {
        intersect: false,
        mode: 'index',
        },
        scales: {
        y: {
            grid: {
            drawBorder: false,
            display: true,
            drawOnChartArea: true,
            drawTicks: false,
            borderDash: [5, 5]
            },
            ticks: {
            display: true,
            padding: 10,
            color: '#b2b9bf',
            font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
            },
            }
        },
        x: {
            grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
            borderDash: [5, 5]
            },
            ticks: {
            display: true,
            color: '#b2b9bf',
            padding: 20,
            font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
            },
            }
        },
        },
    },
    });
</script>
@endsection