<!doctype html>
<html lang="es">
<head>
    <title>Categorías</title>
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
@include('layouts.alerts')
@include('layouts.sidebar')
@include('layouts.header')


<main>
    <div class="container">
        <div class="section text-left my-4">
            <div class="row">

                <div class="col">

                    <h2 class="title">Categorías</h2>
                </div>
                <div class="col" style="text-align: end"><a href="{{route('category.create')}}"
                                                            class="btn btn-sm btn-warning">Crear categoria</a></div>
            </div>
            @php
                    $numCatLib = 0;
                    if(isset($categories)) {
                         foreach ($categories as $cat) {
                             if($cat->category_type == 0) {$numCatLib++;}
                         }
                    }
            @endphp

            @if($numCatLib > 0)
                <div class="card mt-5">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <h5 class="my-1 mx-4 text-secondary font-weight-bolder opacity-9 text-center p-2">Libros</h5>
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Codigo
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Nombre
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Creada
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Actualizada
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                @if($category->category_type == 0)
                                    <tr>
                                        <td class="align-middle text-center ">
                                            <p class=" mb-0">{{ $category->id }}</p>
                                        </td>
                                        <td>
                                            <p class=" mb-0">{{ $category->category_name }}</p>
                                        </td>
                                        <td class="align-middle text-center  ">
                                            <p class=" mb-0">{{ $category->created_at }}</p>
                                        </td>
                                        <td class="align-middle text-center ">
                                            <p class=" mb-0">{{ $category->updated_at }}</p>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">


                                            <a href="{{ route('category.show', $category->id) }}"
                                               class="text-secondary  mx-3 font-weight-normal "
                                               data-toggle="tooltip" data-original-title="Edit user">
                                                Visualizar
                                            </a>

                                            <a href="{{ route('category.edit', $category->id) }}"
                                               class="text-secondary  mx-3 font-weight-normal "
                                               data-toggle="tooltip" data-original-title="Edit user">
                                                Editar
                                            </a>


                                            <a href="" class="text-secondary font-weight-normal "
                                               data-bs-toggle="modal" data-bs-target="#deleteConfirm{{$category->id}}"
                                               data-toggle="tooltip" data-original-title="Delete user">
                                                Eliminar
                                            </a>

                                        </td>
                                        <div class="modal fade" id="deleteConfirm{{$category->id}}" tabindex="-1"
                                             aria-labelledby="deleteConfirm{{$category->id}}" aria-hidden="true">
                                            <div class="modal-dialog" style="margin-top: 10rem;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Esta seguro que desea eliminar la categoria
                                                        '{{ $category->category_name }}' ?
                                                        <br><br>
                                                        Esta accion es irreversible y podria afectar a todos los libros
                                                        asociados a esta categoria.
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn bg-gradient-dark mb-0"
                                                                data-bs-dismiss="modal">Cancelar
                                                        </button>
                                                        <form method="POST"
                                                              action="{{ route('category.delete',$category->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn bg-gradient-danger mb-0">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <br>
                <div class="row mt-5">
                    <div class="col">
                        {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                        <p class="display-4" style="font-size: x-large"> No existen
                            categorías de libros.</p>
                    </div>
                </div>
            @endif
            @php
                $numCatProd = 0;
                if(isset($categories)) {
                     foreach ($categories as $cat) {
                         if($cat->category_type == 1) {$numCatProd++;}
                     }
                }
            @endphp
            @if($numCatProd > 0)
                <div class="card mt-5">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <h5 class="my-1 mx-4 text-secondary font-weight-bolder opacity-9 text-center p-2">Productos</h5>
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Codigo
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Nombre
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Creada
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Actualizada
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                @if($category->category_type == 1)
                                    <tr>
                                        <td class="align-middle text-center ">
                                            <p class=" mb-0">{{ $category->id }}</p>
                                        </td>
                                        <td>
                                            <p class=" mb-0">{{ $category->category_name }}</p>
                                        </td>
                                        <td class="align-middle text-center  ">
                                            <p class=" mb-0">{{ $category->created_at }}</p>
                                        </td>
                                        <td class="align-middle text-center ">
                                            <p class=" mb-0">{{ $category->updated_at }}</p>
                                        </td>
                                        <td class="align-middle" style="text-align: center;">


                                            <a href="{{ route('category.show', $category->id) }}"
                                               class="text-secondary  mx-3 font-weight-normal "
                                               data-toggle="tooltip" data-original-title="Edit user">
                                                Visualizar
                                            </a>

                                            <a href="{{ route('category.edit', $category->id) }}"
                                               class="text-secondary  mx-3 font-weight-normal "
                                               data-toggle="tooltip" data-original-title="Edit user">
                                                Editar
                                            </a>


                                            <a href="" class="text-secondary font-weight-normal "
                                               data-bs-toggle="modal" data-bs-target="#deleteConfirm{{$category->id}}"
                                               data-toggle="tooltip" data-original-title="Delete user">
                                                Eliminar
                                            </a>

                                        </td>
                                        <div class="modal fade" id="deleteConfirm{{$category->id}}" tabindex="-1"
                                             aria-labelledby="deleteConfirm{{$category->id}}" aria-hidden="true">
                                            <div class="modal-dialog" style="margin-top: 10rem;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Esta seguro que desea eliminar la categoria
                                                        '{{ $category->category_name }}' ?
                                                        <br><br>
                                                        Esta accion es irreversible y podria afectar a todos los libros
                                                        asociados a esta categoria.
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn bg-gradient-dark mb-0"
                                                                data-bs-dismiss="modal">Cancelar
                                                        </button>
                                                        <form method="POST"
                                                              action="{{ route('category.delete',$category->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn bg-gradient-danger mb-0">
                                                                Eliminar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <br>
                <div class="row mt-5">
                    <div class="col">
                        {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                        <p class="display-4" style="font-size: x-large"> No existen
                            categorías de productos.</p>
                    </div>
                </div>
            @endif
        </div>

    </div>

    <br><br>


</main>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>

