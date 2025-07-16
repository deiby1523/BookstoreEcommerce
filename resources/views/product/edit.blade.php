<!doctype html>
<html lang="es">

<head>
    <title>Editar Producto</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>


    {{--    Jquery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    @include('product.styles.edit')
</head>

<body>

@include('layouts.sidebar')
@include('layouts.header')

<style>
    .listbox {
        margin-top: 10px !important;
    }


    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }


    input[type=date]::-webkit-inner-spin-button,
    input[type=date]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=date] {
        -moz-appearance: textfield;
    }

    .selectSearch {
        display: none;
    }

    .show {
        display: block;
    }

    input::file-selector-button {
        padding: 7px 7px 7px 7px !important;
        background-color: lightgray !important;
        border-radius: 10px;
    !important
    }
</style>

<main>
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-transparent mb-0 mt-lg-auto" href="{{route('product.index')}}">
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

            <h2 class="title">Editar Producto</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body pb-2">
                            <div class="row">

                                {{-- Name --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Nombre</label>
                                    @if(count($errors->get('product_name')) >= 1)
                                        <input name="product_name" id="product_name" class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="text" placeholder="Nombre del libro"
                                               value="{{$product->product_name}}">
                                    @else
                                        <input name="product_name" id="product_name" class="form-control"
                                               type="text" placeholder="Nombre del libro"
                                               value="{{$product->product_name}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('product_name')"></x-input-error>

                                {{-- Category select --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Categoria</label>
                                    @if(count($errors->get('category_id')) >= 1)
                                        <select name="category_id" id="category_id" class="form-control"
                                                style="box-shadow: 0 0 8px 2px #ff000061;">
                                            <option selected
                                                    value="{{$category->id}}">{{$category->category_name}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option selected
                                                    value="{{$category->id}}">{{$category->category_name}}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    @endif

                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('category_id')"></x-input-error>

                                {{-- Subcategory select --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Subcategoria</label>
                                    @if(count($errors->get('subcategory_id')) >= 1)
                                        <select name="subcategory_id" id="subcategory_id" class="form-control"
                                                style="box-shadow: 0 0 8px 2px #ff000061;">
                                            <option selected
                                                    value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                        </select>
                                    @else
                                        <select name="subcategory_id" id="subcategory_id" class="form-control">
                                            <option selected
                                                    value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                                        </select>
                                    @endif

                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('subcategory_id')"></x-input-error>

                                {{-- Description --}}
                                <div class="input-group input-group-static mb-4 mt-md-0 mt-4">
                                    <label>Descripción</label>
                                    @if(count($errors->get('product_description')) >= 1)
                                        <textarea name="product_description" class="form-control"
                                                  id="product_description" rows="6"
                                                  placeholder="Resumen o descripcion del libro"
                                                  style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{$product->product_description}}</textarea>
                                    @else
                                        <textarea name="product_description" class="form-control"
                                                  id="product_description" rows="6"
                                                  placeholder="Resumen o descripcion del libro">{{$product->product_description}}</textarea>
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('product_description')"></x-input-error>

                                {{-- Price --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Precio</label>
                                    @if(count($errors->get('product_price')) >= 1)
                                        <input name="product_price" id="product_price" class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="number" placeholder="Precio del libro sin iva"
                                               value="{{$product->product_price}}">
                                    @else
                                        <input name="product_price" id="product_price" class="form-control"
                                               type="number" placeholder="Precio del libro sin iva"
                                               value="{{$product->product_price}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('product_price')"></x-input-error>

                                {{-- Discount --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Descuento</label>
                                    @if(count($errors->get('product_discount')) >= 1)
                                        <input name="product_discount" id="product_discount" class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="number" placeholder="Ingrese en porcentaje un descuento (0 - 100)%"
                                               value="{{$product->product_discount}}">
                                    @else
                                        <input name="product_discount" id="product_discount" class="form-control"
                                               type="number" placeholder="Ingrese en porcentaje un descuento (0 - 100)%"
                                               value="{{$product->product_discount}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('product_discount')"></x-input-error>

                                {{-- Active --}}
                                <label>Activado</label>
                                <div class="form-check form-switch py-2">
                                @if(count($errors->get('active')) >= 1)
                                    @if($product->active)
                                            <input class="form-check-input checked:true" type="checkbox" id="active"
                                                   name="active" checked>
                                        @else
                                            <input class="form-check-input checked:false" type="checkbox" id="active"
                                                   name="active">
                                        @endif
                                    @else
                                    @if($product->active)
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

                                {{-- image display --}}
                                <div class="row">
                                    <div class="card mt-5" <?php if (count($errors->get('product_image')) >= 1) {
                                        echo("style='box-shadow: 0 0 8px 2px #ff000061;'");
                                    } else {
                                        echo("style='box-shadow: 0 5px 15px -3px rgb(0 0 0 / 26%), 0 -4px 6px -2px rgb(0 0 0 / 5%) !important;'");
                                    } ?>>
                                        <div class="row">
                                            <!-- Card body -->
                                            <div class="col" style="min-width: 250px">
                                                <div class="card-body">
                                                    <h4 class="font-weight-normal mt-3">Imagen</h4>
                                                    <p class="card-text mb-4">Subir imagen con formato .jpg,.png,.webp
                                                        Asegúrate de
                                                        que la imagen tenga una buena resolución para garantizar una
                                                        visualización óptima.
                                                    </p>
                                                    <x-input-error class="text-danger"
                                                                   :messages="$errors->get('product_image')"></x-input-error>
                                                    <div class="row mt-5">
                                                        <div class="col-md-4">

                                                            <a id="falseinput" class="btn btn-outline-warning">Subir
                                                                Imagen</a>
                                                        </div>
                                                        <div class="col" style="align-self: center;">

                                                            <p id="selected_filename">No file selected</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card image -->
                                            <div class="col mb-4 text-center" style="min-width: 50%">
                                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
                                                     style="background: none;">
                                                    <img id="product_img" class="border-radius-lg w-50"
                                                         src="{{asset($product->product_image_url)}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- image input --}}
                                <div class="input-group input-group-static mb-4 mt-4">
                                    <input id="fileinput" name="product_image" type="file" accept=".jpg,.jpeg,.png,.webp"
                                           style="display:none;">
                                </div>

                                {{-- Buttons --}}
                                <div class="row">
                                    <div class="col-sm-6 text-start">
                                        <a href="{{route('product.index')}}" class="btn bg-gradient-danger mt-3 mb-0"
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


@include('product.scripts.edit')

<script src="{{asset('js/plugins/flatpickr.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
