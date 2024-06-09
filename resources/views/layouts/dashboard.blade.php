<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap@5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Font | Ubuntu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!-- Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,200,0,0" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container-fluid p-0 d-flex">
        <x-sidebar></x-sidebar>
        <main class="d-flex col-md-9 col-12 flex-column flex-fill px-3">
            <x-header></x-header>
            <div class="contents flex-fill overflow-y-auto">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- jQuery@3.7.1 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap@5.3.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="/assets/js/chartjs.min.js"></script>
    <script src="/assets/js/script.js"></script>
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
</body>
</html>