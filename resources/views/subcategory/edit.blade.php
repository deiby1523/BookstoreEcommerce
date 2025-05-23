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

<style>
    .listbox {
        margin-top: 10px !important;
    }
</style>

<body>
@include('layouts.sidebar')
@include('layouts.header')


<script type="module" src="https://unpkg.com/@fluentui/web-components"></script>

<main>
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-transparent mb-0 mt-lg-auto" href="{{route('subcategory.index')}}"><svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">

            <h2 class="title">Editar Subcategoria</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{ route('subcategory.update',$subcategory->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="input-group input-group-static mb-4 mt-4">
                                    <label>Categoria</label>
                                    @if(count($errors->get('category_id')) >= 1)
                                        <select name="category_id" id="category_id" class="form-control"
                                                name="choices-button" id="choices-button"
                                                style="box-shadow: 0 0 8px 2px #ff000061;">
                                            @foreach($categories as $category2)
                                                @if($category2->id == $category->id)
                                                    <option selected
                                                            value="{{$category2->id}}">{{$category2->category_name}}</option>
                                                @else
                                                    <option
                                                        value="{{$category2->id}}">{{$category2->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="category_id" id="category_id" class="form-control"
                                                name="choices-button" id="choices-button">
                                            @foreach($categories as $category2)
                                                @if($category2->id == $category->id)
                                                    <option selected
                                                            value="{{$category2->id}}">{{$category2->category_name}}</option>
                                                @else
                                                    <option
                                                        value="{{$category2->id}}">{{$category2->category_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @endif


                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('category_id')"></x-input-error>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">

                                        <label>Nombre</label>
                                        @if(count($errors->get('subcategory_name')) >= 1)
                                            <input value="{{$subcategory->subcategory_name}}" name="subcategory_name"
                                                   id="subcategory_name" class="form-control"
                                                   placeholder="Nombre de la subcategoria" aria-label="Full Name"
                                                   type="text"
                                                   style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">
                                        @else
                                            <input value="{{$subcategory->subcategory_name}}" name="subcategory_name"
                                                   id="subcategory_name" class="form-control"
                                                   placeholder="Nombre de la subcategoria" aria-label="Full Name"
                                                   type="text">
                                        @endif
                                    </div>
                                    <x-input-error class="text-danger"
                                                   :messages="$errors->get('subcategory_name')"></x-input-error>
                                </div>

                            </div>


                            <div class="input-group input-group-static mb-0 mt-md-0 mt-4">
                                <label>Descripcion</label>
                                @if(count($errors->get('subcategory_description')) >= 1)
                                    <textarea name="subcategory_description" class="form-control"
                                              id="subcategory_description" rows="6"
                                              placeholder="Una descripcion breve de la subcategoria" style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{$subcategory->subcategory_description}}</textarea>
                                @else
                                    <textarea name="subcategory_description" class="form-control"
                                              id="subcategory_description" rows="6"
                                              placeholder="Una descripcion breve de la subcategoria">{{$subcategory->subcategory_description}}</textarea>
                                @endif
                            </div>
                            <x-input-error class="text-danger"
                                           :messages="$errors->get('subcategory_description')"></x-input-error>

                            <div class="row">
                                <div class="col-sm-6 text-start">
                                    <a href="{{route('subcategory.index')}}" class="btn bg-gradient-danger mt-3 mb-0"
                                       style="max-width: 233px; width: -webkit-fill-available;">Cancelar
                                    </a>
                                </div>

                                <div class="col-sm-6 text-end">
                                    <button type="submit" class="btn bg-gradient-warning mt-3 mb-0"
                                            style="max-width: 233px;width: -webkit-fill-available;">Guardar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
