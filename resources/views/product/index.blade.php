<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos</title>
    <!-- Required meta tags --->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons --->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>

    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->

{{-- aditional styles --}}
@include('product.styles.index')


<div class="page-header" style="background-color: #ff782dbf; height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>


<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('dashboard.products')}}"
               class="btn bg-gradient-faded-secondary" style="max-width: 233px; width: -webkit-fill-available;">
                <svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
                Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">
            <div class="row">

                <div class="col">

                    <h2 class="title">Productos</h2>
                </div>
                <div class="col" style="text-align: end"><a href="{{ route('product.create') }}"
                                                            class="btn btn-sm btn-warning">Crear Producto</a></div>
            </div>

            {{-- Search bar --}}
            <div class="row">
                <div class="container w-60 my-5 shadow-lg p-2" style="border-radius: 10px">
                    <div class="input-group input-group-dynamic">

                                    <span class="input-group-text" id="basic-addon1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></span>


                        <input id="searchProduct" name="searchProduct" type="text" class="form-control"
                               placeholder="Buscar Productos">

                    </div>
                </div>


            </div>


            {{--            <div id="productDisplay">--}}

            {{--            </div>--}}
            @php if(isset($products)){
$nproducts = count($products);
} @endphp
            @if($nproducts > 0)
                <div class="card">
                    <div id="loader" style="align-self: center"></div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0" id="table">
                            <thead>
                            <tr>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Código
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Nombre
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Categoría
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Precio
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Estado
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody id="productDisplay">

                            </tbody>
                        </table>
                        <nav aria-label="Pagination-products" class="mt-5">
                            <ul class="pagination pagination-warning justify-content-center" id="pagination">

                            </ul>
                        </nav>
                        <div class="container" id="searchPageContainer">

                        </div>
                        <div id="infopag"></div>
                        <div id="loading" class="loading-animation"></div>
                    </div>
                    <br>
                    <div class="row" id="noExistsDisplay" style="display: none">
                        <div class="col text-center">
                            <p class="display-4" style="font-size: x-large"> No se encontró</p>
                        </div>
                    </div>
                    @else
                        <br>
                        <div class="row">
                            <div class="col">
                                {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                                <p class="display-4" style="font-size: x-large"> No existen
                                    Productos.</p>
                            </div>
                        </div>
                    @endif
                </div>

        </div>
    </div>
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>

<br><br><br><br>

@include('product.scripts.index')-

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
