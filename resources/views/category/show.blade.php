<!doctype html>
<html lang="es">


<head>
    <title>Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
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
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->


<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">
    {{--    <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="container">
        <div class="section text-left my-4">
            <a href="{{ route('category.index') }}" class="text-warning text-sm icon-move-left">
                < volver
            </a>

            <h2 class="title">Ver Categoria</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">


                    <div class="card-body pb-2">
                        <div class="col-lg-12">
                            <h2>{{$category->category_name}}</h2>
                            <p>{{$category->category_description}}</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                @if(count($category->subcategories) > 0)
                                    <br>
                                    <h4> Subcategorias </h4>
                                    <ul class="list-group">
                                        @foreach($category->subcategories as $subcategory)
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                {{$subcategory->subcategory_name}}
                                                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Esta subcategoria tiene 0 libros" class="badge bg-gradient-warning">0</span>
                                            </li>

                                        @endforeach
                                    </ul>
                                @else
                                    <p class="display-4" style="font-size: x-large"> No existen
                                        subcategorias para esta
                                        categoria.</p>
                                @endif
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-start">
                                <a href="{{route('category.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Volver
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<div class="container">
    <div class="row">

    </div>
</div>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
