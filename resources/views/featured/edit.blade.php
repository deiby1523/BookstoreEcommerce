<!doctype html>
<html lang="es">

<head>
    <title>Destacados</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <meta name="csrf_token" content="{{ csrf_token() }}"/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    {{-- aditional styles --}}
    @include('featured.styles.index')
    @include('featured.styles.edit')
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

            <h2 class="title">Editar Destacados</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="featuredForm" method="POST" autocomplete="off"
                          action="{{ route('featured.update',$featured->id) }} ">
                        @csrf
                        @method('PUT')
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre</label>
                                        @if(count($errors->get('featured_type_name')) >= 1)
                                            <input value="{{$featured->featured_type_name}}" name="featured_type_name"
                                                   id="featured_type_name" class="form-control"
                                                   placeholder="Nombre de la sección destacada" aria-label="Full Name"
                                                   type="text"
                                                   style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">
                                        @else
                                            <input value="{{$featured->featured_type_name}}" name="featured_type_name"
                                                   id="featured_type_name" class="form-control"
                                                   placeholder="Nombre de la sección destacada" aria-label="Full Name"
                                                   type="text">
                                        @endif
                                    </div>
                                    <x-input-error class="text-danger"
                                                   :messages="$errors->get('featured_type_name')"></x-input-error>
                                </div>

                            </div>
                            <div class="input-group input-group-static mb-4 mt-md-0 mt-4">
                                <label>Descripción</label>
                                @if(count($errors->get('featured_name_description')) >= 1)
                                    <textarea name="featured_type_description" class="form-control"
                                              id="featured_type_description"
                                              rows="6"
                                              placeholder="Una descripción breve de la sección de destacados"
                                              style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{$featured->featured_type_description}}</textarea>
                                @else
                                    <textarea name="featured_type_description" class="form-control"
                                              id="featured_type_description"
                                              rows="6"
                                              placeholder="Una descripción breve de la sección de destacados">{{$featured->featured_type_description}}</textarea>
                                @endif
                            </div>
                            <x-input-error class="text-danger"
                                           :messages="$errors->get('featured_type_description')"></x-input-error>

                            <label class="form-check-label" for="active">Activado</label>
                            <div class="form-check form-switch py-2 mb-5">
                            @if(count($errors->get('active')) >= 1)
                                @if($featured->active)
                                        <input class="form-check-input checked:true" type="checkbox" id="active"
                                               name="active" checked>
                                    @else
                                        <input class="form-check-input checked:false" type="checkbox" id="active"
                                               name="active">
                                    @endif
                                @else
                                @if($featured->active)
                                        <input class="form-check-input checked:true" type="checkbox" id="active"
                                               name="active" checked>
                                    @else
                                        <input class="form-check-input checked:false" type="checkbox" id="active"
                                               name="active">
                                    @endif
                                @endif
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('active')"></x-input-error>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-2">
                            <h4>
                                Libros
                            </h4>
                        </div>
                        <div class="col-8">
                            <form role="form" action="{{route('featured.addBook')}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="input-group input-group-static mb-4"
                                     style="width: inherit; right: -20%">
                                    <input readonly="readonly" name="book_title" id="book_title"
                                           placeholder="Seleccione un libro" class="form-control w-70"/>
                                    <input type="hidden" name="featured_type_id" id="featured_type_id"
                                           value="{{$featured->id}}">
                                    <input id="book_id" name="book_id" hidden>

                                    <ul id="selectBook"
                                        style="width:-webkit-fill-available; position: absolute"
                                        class="mt-6 card selectSearch dropdown-menu">

                                        <div class="container mr-1 mt-1 ml-1 mb-1">
                                            <div class="input-group input-group-dynamic">
                                                <span class="input-group-text" id="basic-addon1"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path
                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></span>
                                                <input id="searchBook" name="searchBook" type="text"
                                                       class="form-control" placeholder="Buscar libro">
                                            </div>
                                        </div>
                                        <div id="bookOptions">

                                        </div>
                                    </ul>

                                    <div class="col-2">
                                        <button type="submit" style="float: right;"
                                                class="btn btn-outline-success btn-sm">Agregar
                                            Libro
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
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
                                        <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">

                                        </th>
                                        <th class="text-secondary opacity-7"></th>
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

                                            <td class="align-middle" style="text-align: center;">
                                                <a href="" class="text-secondary  mx-3 font-weight-normal "
                                                   data-bs-toggle="modal"
                                                   data-toggle="tooltip" data-original-title="Delete featured"
                                                   data-bs-target="#deleteConfirm{{$book->id}}">
                                                    Eliminar
                                                </a>

                                            </td>
                                            <div class="modal fade" id="deleteConfirm{{$book->id}}" tabindex="-1"
                                                 aria-labelledby="deleteConfirm{{$book->id}}" aria-hidden="true">
                                                <div class="modal-dialog" style="margin-top: 10rem;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Esta seguro que desea eliminar el libro
                                                            '{{ $book->book_title }}' de esta sección de destacados?
                                                            <br><br>
                                                            Esta acción es irreversible.
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn bg-gradient-dark mb-0"
                                                                    data-bs-dismiss="modal">Cancelar
                                                            </button>
                                                            <form method="POST"
                                                                  action="{{ route('featured.delBook',[$featured->id,$book->id]) }}">
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

                    <div class="row">
                        <div class="col-md-6 text-start">
                            <a href="{{route('featured.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Cancelar
                            </a>
                        </div>

                        <div class="col-md-6 text-end">
                            <button type="submit" form="featuredForm" class="btn bg-gradient-warning mt-3 mb-0">
                                Guardar
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@include('featured.scripts.edit')

<script src="{{asset('js/plugins/flatpickr.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
