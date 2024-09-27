<!doctype html>
<html lang="es">

<!-- TODO: continuar trabajando en el modulo de destacados -->

<head>
    <title>Destacados</title>
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

<div class="page-header" style="background-image: url({{asset('img/bg-20.jpg')}}); height: 500px">
    {{-- <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('featured.index')}}"
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

            <h2 class="title">Editar Destacados</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{ route('featured.update',$featured->id) }} ">
                        @csrf
                        @method('PUT')
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre</label>
                                        @if(count($errors->get('category_name')) >= 1)
                                        <input value="{{featured->featured_type_name}}" name="featured_type_name"
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
                            <div class="input-group input-group-static mb-0 mt-md-0 mt-4">
                                <label>Descripción</label>
                                @if(count($errors->get('featured_name_description')) >= 1)
                                <textarea name="featured_type_description" class="form-control"
                                          id="featured_type_description"
                                          rows="6"
                                          placeholder="Una descripcion breve de la sección de destacados"
                                          style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{$featured->featured_type_description}}</textarea>
                                @else
                                <textarea name="featured_type_description" class="form-control"
                                          id="featured_type_description"
                                          rows="6"
                                          placeholder="Una descripcion breve de la sección de destacados">{{$featured->featured_type_description}}</textarea>
                                @endif
                            </div>
                            <x-input-error class="text-danger"
                                           :messages="$errors->get('featured_type_description')"></x-input-error>

                            <div class="form-check form-switch py-5">
                                @if(count($errors->get('active')) >= 1)
                                <input class="form-check-input checked:false" type="checkbox" id="active" name="active">
                                @else
                                <input class="form-check-input checked:false" type="checkbox" id="active" name="active">
                                @endif
                                <label class="form-check-label" for="active">Activado</label> <!-- TODO: Arreglar lo del check activado -->
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('active')"></x-input-error>
                            </div>

                            <div class="row">
                                <div class="col-2">
                                    <h4>
                                        Libros
                                    </h4>
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-static mb-4" style="width: inherit; right: -30%">
                                        <input readonly="readonly" name="author_name" id="author_name"
                                               placeholder="Seleccione un autor" class="form-control w-70"/>
                                        <input name="author_id" id="author_id" hidden>

                                        <ul name="selectAuthor" id="selectAuthor"
                                            style="width:-webkit-fill-available; position: absolute"
                                            class="mt-6 card selectSearch dropdown-menu"
                                            aria-labelledby="navbarDropdownMenuLink2">

                                            <div class="container mr-1 mt-1 ml-1 mb-1">
                                                <div class="input-group input-group-dynamic">
                                                <span class="input-group-text" id="basic-addon1"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path
                                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></span>
                                                    <input id="searchAuthor" name="searchAuthor" type="text"
                                                           class="form-control" placeholder="Buscar autor"
                                                           aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            <div id="authorOptions" name="authorOptions">

                                            </div>
                                        </ul>

                                    </div>

                                </div>   <!-- TODO: Continuar trabajando para poder añadir libros a los destacados, mirar ERP -->
                                <div class="col-2">
                                    <a style="float: right;" class="btn btn-outline-success" href="">Agregar Libro</a>
                                </div>
                            </div>
                            <div class="card mb-5"> <!-- TODO: Todo este fragmento de codigo no es responsive -->
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Codigo
                                            </th>
                                            <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Nombre
                                            </th>
                                            <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                                Imagen
                                            </th>
                                            <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">

                                            </th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="align-middle text-center ">
                                                <p class=" mb-0">8349038904890</p>
                                            </td>
                                            <td>
                                                <p class=" mb-0"> Un libro con un nombre cualquiera </p>
                                            </td>

                                            <td>
                                                <p class=" mb-0"> (Imagen del libro) </p>
                                            </td>

                                            <td class="align-middle" style="text-align: center;">
                                                <a href="" class="btn btn-sm btn-outline-danger"
                                                   data-bs-toggle="modal"
                                                   data-toggle="tooltip" data-original-title="Delete featured">
                                                    Eliminar
                                                </a>
                                                <!--                                                data-bs-target="#deleteConfirm{{$featured->id}}"-->
                                            </td>
                                            <!--                                            <div class="modal fade" id="deleteConfirm{{$featured->id}}" tabindex="-1"-->
                                            <!--                                                 aria-labelledby="deleteConfirm{{$featured->id}}" aria-hidden="true">-->
                                            <!--                                                <div class="modal-dialog" style="margin-top: 10rem;">-->
                                            <!--                                                    <div class="modal-content">-->
                                            <!--                                                        <div class="modal-header">-->
                                            <!--                                                            <h5 class="modal-title" id="exampleModalLabel">-->
                                            <!--                                                                Confirmacion</h5>-->
                                            <!--                                                            <button type="button" class="btn-close"-->
                                            <!--                                                                    data-bs-dismiss="modal"-->
                                            <!--                                                                    aria-label="Close"></button>-->
                                            <!--                                                        </div>-->
                                            <!--                                                        <div class="modal-body">-->
                                            <!--                                                            Esta seguro que desea eliminar la seccion de libros-->
                                            <!--                                                            destacados-->
                                            <!--                                                            '{{ $featured->featured_type_name }}' ?-->
                                            <!--                                                            <br><br>-->
                                            <!--                                                            Esta accion es irreversible.-->
                                            <!--                                                        </div>-->
                                            <!--                                                        <div class="modal-footer justify-content-between">-->
                                            <!--                                                            <button type="button" class="btn bg-gradient-dark mb-0"-->
                                            <!--                                                                    data-bs-dismiss="modal">Cancelar-->
                                            <!--                                                            </button>-->
                                            <!--                                                            <form method="POST"-->
                                            <!--                                                                  action="{{ route('featured.delete',$featured->id) }}">-->
                                            <!--                                                                @csrf-->
                                            <!--                                                                @method('DELETE')-->
                                            <!--                                                                <button type="submit"-->
                                            <!--                                                                        class="btn bg-gradient-danger mb-0">-->
                                            <!--                                                                    Eliminar-->
                                            <!--                                                                </button>-->
                                            <!--                                                            </form>-->
                                            <!--                                                        </div>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 text-start">
                                    <a href="{{route('featured.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Cancelar
                                    </a>
                                </div>

                                <div class="col-md-6 text-end">
                                    <button type="submit" class="btn bg-gradient-warning mt-3 mb-0">Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
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
