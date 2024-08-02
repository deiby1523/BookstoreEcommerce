<!doctype html>
<html lang="es">

<!-- TODO: Para continuar con el desarrollo de los destacados -->

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
@include('layouts.navigation_txt_dark')
<!-- End Navbar -->


<div class="page-header" style="background-image: url({{asset('img/bg-20.jpg')}}); height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('category.index')}}" class="btn bg-gradient-faded-secondary" style="max-width: 233px; width: -webkit-fill-available;"><svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">

            <h2 class="title">Ver Categoria</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">

                    <div class="col-lg-12 text-center" style="min-width: 50%">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
                             style="background: none;">

                        </div>
                    </div>
                    <div class="card-body pb-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <h2>{{$category->category_name}}</h2>
                                <div class="display-4 text-md">Creada el {{$category->created_at}} y última vez
                                    actualizada el {{$category->updated_at}}</div><br>
                                <p>{{$category->category_description}}</p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @if(count($category->subcategories) > 0)
                                            <br>
                                            <h4> Subcategorias </h4>
                                            <ul class="list-group">
                                                @foreach($category->subcategories as $subcategory)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        {{$subcategory->subcategory_name}}
                                                        <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                              title="Esta subcategoria tiene {{count($subcategory->books)}} libros"
                                                              class="badge bg-gradient-warning">{{count($subcategory->books)}}</span>
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
                            </div>
                            <div class="col-lg-6 text-center">
                                <img id="category_img" class="border-radius-lg w-65"
                                     src="{{asset($category->category_image_url)}}" alt="Imagen de categoria">
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
