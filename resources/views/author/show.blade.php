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
@include('layouts.sidebar')
@include('layouts.header')

<main>
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-transparent mb-0 mt-lg-auto" href="{{route('author.index')}}"><svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">

            <h2 class="title">Ver Autor</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">


                    <div class="card-body pb-2">
                        <div class="col-lg-12">
                            <h2>{{$author->author_name}}</h2>
                            <div class="display-4 text-md">Creado el {{$author->created_at}} y ultima vez actualizado el {{$author->updated_at}}</div>
                        </div>
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                @if(count($author->subcategories) > 0)--}}
{{--                                    <br>--}}
{{--                                    <h4> Subcategorias </h4>--}}
{{--                                    <ul class="list-group">--}}
{{--                                        @foreach($author->subcategories as $subcategory)--}}
{{--                                            <li class="list-group-item d-flex justify-content-between align-items-center">--}}
{{--                                                {{$subcategory->subcategory_name}}--}}
{{--                                                <span data-bs-toggle="tooltip" data-bs-placement="left" title="Esta subcategoria tiene 0 libros" class="badge bg-gradient-wwarning">0</span>--}}
{{--                                            </li>--}}

{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                @else--}}
{{--                                    <p class="display-4" style="font-size: x-large"> No existen--}}
{{--                                        subcategorias para esta--}}
{{--                                        categoria.</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                        </div>--}}
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-start">
                                <a href="{{route('author.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Volver
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
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
