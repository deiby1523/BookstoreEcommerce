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
            <a class="btn bg-transparent mb-0 mt-lg-auto" href="{{route('subcategory.index')}}">
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

            <h2 class="title">Ver subcategoria</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">


                    <div class="card-body pb-2">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col">
                                    <h2 style="width: fit-content"><span
                                            style="font-weight: 300;">{{$category->category_name}}</span> ><span
                                            style="font-weight: 300;"> {{$subcategory->subcategory_name}} </span></h2>
                                    <div class="display-4 text-md">Creada el {{$subcategory->created_at}} y ultima vez
                                        actualizada el {{$subcategory->updated_at}}</div>
                                </div>

                            </div>
                            <p class="mt-3">{{$subcategory->subcategory_description}}</p>
                        </div>
                        <br>
                        <div class="row">
                            <div class="card">
                                <div id="loader" style="align-self: center; margin: 8px"></div>
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0" id="table">
                                        <h5 class="my-1 mx-4 text-secondary font-weight-bolder opacity-9 text-center p-2">{{$subcategory->category->category_type == 0 ? 'Libros' : 'Productos'}}</h5>
                                        <thead>
                                        <tr>
                                            <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Código
                                            </th>
                                            <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Nombre
                                            </th>
                                            <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                Estado
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @if ($subcategory->category->category_type == 0)
                                                @forelse($subcategory->books as $book)
                                                    <tr>
                                                        <td class="align-middle text-center ">
                                                            <p class=" mb-0">{{ $book->book_isbn }}</p>
                                                        </td>
                                                        <td>
                                                            <p class=" mb-0">{{ $book->book_title }}</p>
                                                        </td>
                                                        <td class="align-middle text-center text-sm"><!--dump($book->active == 1) -->
                                                            <span class="badge badge-sm badge-{{$book->active ? 'success' : 'secondary'}}">{{$book->active ? 'Activado' : 'Desactivado'}}</span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <br>
                                                    <div class="row mt-5">
                                                        <div class="col">
                                                            <p class="display-4" style="font-size: x-large"> Aún no hay libros asociados a esta subcategoría</p>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            @else

                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-start">
                                <a href="{{route('subcategory.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Volver
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
