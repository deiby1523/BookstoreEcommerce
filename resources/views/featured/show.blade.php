<!doctype html>
<html lang="es">

<head>
    <title>Destacado</title>
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
            <a class="btn bg-transparent mb-0 mt-lg-auto" href="{{route('featured.index')}}">
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

            <h2 class="title">Ver Destacado</h2>

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
                                <h2>{{$featured->featured_type_name}}</h2>
                                <div class="display-4 text-md">Creado el {{$featured->created_at}} y última vez
                                    actualizada el {{$featured->updated_at}}</div><br>
                                <p>{{$featured->featured_type_description}}</p>
                                <div class="row">
                                    <div class="col-lg-12">

                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @php if(isset($featured->books)){
                        $nfeatured = count($featured->books);
                    } @endphp
                            @if($nfeatured > 0)
                                <div class="card mb-5">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                            <tr>
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                    ISBN
                                                </th>
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                    Nombre
                                                </th>
                                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                    Subcategoría
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($featured->books as $book)
                                                @php

                                                    // Ejemplo de uso
                                                    $number = $book->book_isbn; // Tu número de 13 dígitos
                                                    $isbn = 'ISBN ' . substr($number, 0, 3) . '-'. substr($number, 3, 1). '-'. substr($number, 4, 4). '-'. substr($number, 8, 4). '-'. substr($number, 12, 1);

                                                @endphp
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <p class=" mb-0">{{$isbn}}</p>
                                                    </td>
                                                    <td>
                                                        <p class=" mb-0">{{$book->book_title}}</p>
                                                    </td>

                                                    <td>
                                                        <p class=" mb-0">{{$book->subcategory->subcategory_name}}</p>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <br>
                                <div class="row text-center my-5">
                                    <div class="col">
                                        <p class="display-4" style="font-size: x-large">Aún no se han agregado libros a esta
                                            sección destacada</p>
                                    </div>
                                </div>
                            @endif
                        </div>


                        <br>

                        <div class="row">
                            <div class="col-md-12 text-start">
                                <a href="{{route('featured.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Volver
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
