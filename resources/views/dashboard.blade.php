<!doctype html>
<html lang="es">


<head>
    <title>Administrar Libros</title>
    <!-- Required meta tags --->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>
</head>

<body>


@include('layouts.sidebar')
@include('layouts.header')

<main>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="container">
                    <div style="width: 100%; margin: auto;">
                        <h2 class="mb-6">Visitas de la semana</h2>
                        <canvas id="weeklyChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container">
                    <h2>Almacenamiento: <span class="text-xl" style="font-weight: 300; text-transform: none">{{$totalSize}} Mb</span>
                    </h2>
                    <div style="width: 70%; margin: auto;">
                        <canvas id="storageChart" style="width: 400px"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="section text-left my-4">
            <h2 class="title">Libros</h2>
        </div>
        <div class="row my-4">
            <div class="col my-2">
                <a href="{{ route('category.index') }}">
                    <div class="card move-on-hover" style="height: 100%">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1"
                                >{{$nBCategories}}</span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Categorias</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col my-2">
                <a href="{{ route('subcategory.index') }}">
                    <div class="card move-on-hover">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1"
                                > {{$nBSubcategories}}   </span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Sub-categorias</h6>
                        </div>
                    </div>
                </a>

            </div>
        </div>
        <div class="row my-4">
            <div class="col my-2">
                <a href="{{ route('author.index') }}">
                    <div class="card move-on-hover">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1"
                                >{{ $nAuthors }}</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Autores</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col my-2">
                <a href="{{ route('publisher.index') }}">
                    <div class="card move-on-hover">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1"
                                >{{$nPublishers}}</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Editoriales</h6>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col my-2">
                <a href="{{ route('book.index') }}">
                    <div class="card move-on-hover">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1">{{$nBooks}}</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Libros</h6>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">
            <h2 class="title">Productos</h2>
        </div>
        <div class="row my-4">
            <div class="col my-2">
                <a href="{{ route('category.index') }}">
                    <div class="card move-on-hover" style="height: 100%">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1"
                                >{{ $nPCategories }}   </span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Categorias</h6>
                        </div>
                    </div>
                </a>

            </div>
            <div class="col my-2">
                <a href="{{ route('subcategory.index') }}">
                    <div class="card move-on-hover">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1"
                                >{{ $nPSubcategories }}   </span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Sub-categorias</h6>
                        </div>
                    </div>
                </a>

            </div>
        </div>
        <div class="row">
            <div class="col my-2">
                <a href="{{ route('product.index') }}">
                    <div class="card move-on-hover">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1">{{$nProducts}}</span></h1>
                            <h6 class="mb-0 font-weight-bolder">Productos</h6>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">
            <h2 class="title">Interfaz</h2>
        </div>
        <div class="row my-4">
            <div class="col my-2">
                <a href="{{ route('banner.index') }}">
                    <div class="card move-on-hover" style="height: 100%">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status2">{{ $nBanners }} </span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Banners</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row my-4">
            <div class="col my-2">
                <a href="{{ route('featured.index') }}">
                    <div class="card move-on-hover" style="height: 100%">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status1"> {{ $nFeatured_types }} </span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Destacados</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col my-2">
                <a href="{{ route('section.index') }}">
                    <div class="card move-on-hover" style="height: 100%">
                        <div class="card-body text-center">
                            <h1 class="text-gradient text-warning"><span id="status3"> {{ $nSections }}   </span>
                            </h1>
                            <h6 class="mb-0 font-weight-bolder">Secciones</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</main>

<script>
    const ctx = document.getElementById('weeklyChart').getContext('2d');

    const weeklyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($visitsLabels),
            datasets: [{
                label: 'Visitas',
                data: @json($visitsData),
                fill: false,
                borderColor: '#FB8C00', // naranja estilo Material Design
                backgroundColor: '#FB8C00',
                pointBackgroundColor: '#FB8C00',
                pointRadius: 4,
                pointHoverRadius: 6,
                tension: 0.4,
                borderWidth: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // Oculta la leyenda para un look más limpio
                },
                tooltip: {
                    backgroundColor: '#333',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    borderColor: '#FB8C00',
                    borderWidth: 1
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false // Sin líneas de cuadrícula
                    },
                    ticks: {
                        color: '#555',
                        font: {
                            family: 'Roboto',
                            size: 14,
                            weight: '500'
                        }
                    }
                },
                y: {
                    grid: {
                        color: '#eee' // Línea suave
                    },
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        color: '#555',
                        font: {
                            family: 'Roboto',
                            size: 14,
                            weight: '500'
                        }
                    }
                }
            }
        }
    });

    const ctx2 = document.getElementById('storageChart').getContext('2d');

    const storageChart = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: @json($storageLabels),
            datasets: [{
                data: @json($storageData),
                backgroundColor: [
                    '#FB8C00',  // Base de Datos
                    '#008eff',  // libros
                    '#c0ff00',  // Productos
                    '#ff4040',  // Categorías
                    '#9174ff',  // Banners
                    '#ffe700',  // Secciones
                    '#cecece'   // Otro
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        font: {
                            family: 'Roboto',
                            size: 14,
                            weight: '500'
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.label || '';
                            let value = context.parsed;
                            return `${label}: ${value} MB`;
                        }
                    }
                }
            }
        }
    });
</script>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>

</html>
