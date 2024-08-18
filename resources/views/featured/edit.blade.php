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
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('featured.index')}}" class="btn bg-gradient-faded-secondary" style="max-width: 233px; width: -webkit-fill-available;"><svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver
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
                                    <textarea name="featured_type_description" class="form-control" id="featured_type_description"
                                              rows="6"
                                              placeholder="Una descripcion breve de la sección de destacados" style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{$featured->featured_type_description}}</textarea>
                                @else
                                    <textarea name="featured_type_description" class="form-control" id="featured_type_description"
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
                                <label class="form-check-label" for="active">Activado</label>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('active')"></x-input-error>
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
