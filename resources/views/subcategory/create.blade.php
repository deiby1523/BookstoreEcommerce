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

<style>
    .listbox {
        margin-top: 10px !important;
    }
</style>
<script type="module" src="https://unpkg.com/@fluentui/web-components"></script>

<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">
    {{--    <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="container">
        <div class="section text-left my-4">
            <a href="{{ route('subcategory.index') }}" class="text-warning text-sm icon-move-left">
                < volver
            </a>

            <h2 class="title">Crear Subcategoria</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off" action="{{ route('subcategory.save') }}">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="input-group input-group-static mb-4 mt-4">
                                    <label>Categoria</label>
                                    <select name="category_id" id="category_id" class="form-control" name="choices-button" id="choices-button" placeholder="Categoria">
                                            <option selected disabled hidden value="">Selecciona una categoria</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">

                                        <label>Nombre</label>
                                        <input name="subcategory_name" id="subcategory_name" class="form-control" placeholder="ej. Cuentos, Novelas, etc." aria-label="Full Name" type="text">
                                    </div>
                                </div>

                            </div>


                            <div class="input-group input-group-static mb-0 mt-md-0 mt-4">
                                <label>Descripcion</label>
                                <textarea name="subcategory_description" class="form-control" id="subcategory_description" rows="6"
                                          placeholder="Una descripcion breve de la subcategoria"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-start">
                                    <a href="{{route('subcategory.index')}}" class="btn bg-gradient-danger mt-3 mb-0" style="max-width: 233px; width: -webkit-fill-available;">Cancelar
                                    </a>
                                </div>

                                <div class="col-sm-6 text-end">
                                    <button type="submit" class="btn bg-gradient-warning mt-3 mb-0" style="max-width: 233px;width: -webkit-fill-available;">Crear
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
</div>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
