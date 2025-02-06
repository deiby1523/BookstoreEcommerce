<!doctype html>
<html lang="es">

<head>
    <title>Crear Producto</title>
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


    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->

{{-- aditional styles--}}
@include('product.styles.create')


<div class="page-header" style="background-color: #ff782dbf; height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>

<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="container">
        <div class="section text-left my-4">
            <a href="{{ route('product.index') }}" class="text-warning text-sm icon-move-left">
                < volver
            </a>
            <h2 class="title">Crear Producto</h2>

            <div class="card">
                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{ route('product.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row">

                                {{-- Title --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Nombre</label>
                                    @if(count($errors->get('product_name')) >= 1)
                                        <input name="product_name" id="product_name" class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="text" placeholder="Nombre del Producto"
                                               value="{{app('request')->old('product_name', null)}}">
                                    @else
                                        <input name="product_name" id="product_name" class="form-control"
                                               type="text" placeholder="Nombre del Producto"
                                               value="{{app('request')->old('product_name', null)}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('product_name')"></x-input-error>

                                {{-- Category select --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Categoría</label>
                                    @if(count($errors->get('category_id')) >= 1)
                                        <select name="category_id" id="category_id" class="form-control"
                                                style="box-shadow: 0 0 8px 2px #ff000061;">
                                            <option selected disabled hidden value=""></option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option selected disabled hidden value=""></option>
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
                                    <label>Subcategoría</label>
                                    @if(count($errors->get('subcategory_id')) >= 1)
                                        <select name="subcategory_id" id="subcategory_id" class="form-control"
                                                style="box-shadow: 0 0 8px 2px #ff000061;">

                                        </select>
                                    @else
                                        <select name="subcategory_id" id="subcategory_id" class="form-control">

                                        </select>
                                    @endif

                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('subcategory_id')"></x-input-error>


                            {{-- Description --}}
                            <div class="input-group input-group-static mb-4 mt-md-0 mt-4">
                                <label>Resumen</label>
                                @if(count($errors->get('product_description')) >= 1)
                                    <textarea name="product_description" class="form-control"
                                              id="product_description" rows="6"
                                              placeholder="Resumen o descripción del Producto"
                                              style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{app('request')->old('product_description', null)}}</textarea>
                                @else
                                    <textarea name="product_description" class="form-control"
                                              id="product_description" rows="6"
                                              placeholder="Resumen o descripción del Producto">{{app('request')->old('product_description', null)}}</textarea>
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
                                           type="number" placeholder="Precio del Producto"
                                           value="{{app('request')->old('product_price', null)}}">
                                @else
                                    <input name="product_price" id="product_price" class="form-control"
                                           type="number" placeholder="Precio del Producto"
                                           value="{{app('request')->old('product_price', null)}}">
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
                                           value="{{app('request')->old('product_discount', null)}}">
                                @else
                                    <input name="product_discount" id="product_discount" class="form-control"
                                           type="number" placeholder="Ingrese en porcentaje un descuento (0 - 100)%"
                                           value="{{app('request')->old('product_discount', null)}}">
                                @endif
                            </div>
                            <x-input-error class="text-danger"
                                           :messages="$errors->get('product_discount')"></x-input-error>

                            {{-- Stock --}}
                            <div class="input-group input-group-static mb-4">
                                <label>Unidades en inventario</label>
                                @if(count($errors->get('product_stock')) >= 1)
                                    <input name="product_stock" id="product_stock" class="form-control"
                                           style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                           type="number" placeholder="Cantidad de unidades en inventario"
                                           value="{{app('request')->old('product_stock', null)}}">
                                @else
                                    <input name="product_stock" id="product_stock" class="form-control"
                                           type="number" placeholder="Cantidad de unidades en inventario"
                                           value="{{app('request')->old('product_stock', null)}}">
                                @endif
                            </div>
                            <x-input-error class="text-danger"
                                           :messages="$errors->get('product_stock')"></x-input-error>

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
                                                <p class="card-text mb-4">Subir imagen con formato .jpg, Asegúrate de
                                                    que la imagen sea de buena resolución para garantizar una visualización óptima.
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
                                                     src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- image input --}}
                            <div class="input-group input-group-static mb-4 mt-4">
                                <input id="fileinput" name="product_image" type="file" accept=".jpg,.jpeg,.png"
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
                                            style="max-width: 233px;width: -webkit-fill-available;">Crear
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

@include('product.scripts.create')

<script src="{{asset('js/plugins/flatpickr.min.js')}}"></script>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
