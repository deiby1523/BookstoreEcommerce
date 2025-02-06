<!doctype html>
<html lang="es">


<head>
    <title>Crear Categoría</title>
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

    {{--    JQuery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->

<div class="page-header" style="background-color: #ff782dbf; height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('category.index')}}"
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

            <h2 class="title">Crear Categoría</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{ route('category.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pb-2">

                            {{-- type select --}}
                            <div class="input-group input-group-static mb-4 mt-4">
                                <label>Tipo</label>
                                @if(count($errors->get('category_type')) >= 1)
                                    <select name="category_type" id="category_type" class="form-control"
                                            style="box-shadow: 0 0 8px 2px #ff000061;">
                                        <option selected value="0">Categoría de libros</option>
                                        <option value="1">Categoría de productos</option>
                                    </select>
                                @else
                                    <select name="category_type" id="category_type" class="form-control">
                                        <option selected value="0">Categoría de libros</option>
                                        <option value="1">Categoría de productos</option>
                                    </select>
                                @endif

                            </div>
                            <x-input-error class="text-danger"
                                           :messages="$errors->get('category_type')"></x-input-error>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre</label>
                                        @if(count($errors->get('category_name')) >= 1)
                                            <input name="category_name" id="category_name" class="form-control"
                                                   placeholder="Nombre de la categoria" aria-label="Full Name"
                                                   type="text"
                                                   style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                                   value="{{app('request')->old('category_name', null)}}">
                                        @else
                                            <input name="category_name" id="category_name" class="form-control"
                                                   placeholder="Nombre de la categoria" aria-label="Full Name"
                                                   type="text" value="{{app('request')->old('category_name', null)}}">
                                        @endif
                                    </div>
                                    <x-input-error class="text-danger"
                                                   :messages="$errors->get('category_name')"></x-input-error>
                                </div>

                            </div>
                            <div class="input-group input-group-static mb-0 mt-md-0 mt-4">
                                <label>Descripcion</label>
                                @if(count($errors->get('category_description')) >= 1)
                                    <textarea name="category_description" class="form-control" id="category_description"
                                              rows="6"
                                              placeholder="Una descripcion breve de la categoria"
                                              style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{app('request')->old('category_description', null)}}</textarea>
                                @else
                                    <textarea name="category_description" class="form-control" id="category_description"
                                              rows="6"
                                              placeholder="Una descripcion breve de la categoria">{{app('request')->old('category_description', null)}}</textarea>
                                @endif
                            </div>
                            <x-input-error class="text-danger"
                                           :messages="$errors->get('category_description')"></x-input-error>



                            <div class="row">
                                <div class="card mt-5" <?php if (count($errors->get('category_image')) >= 1) {
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
                                                    que la imagen cumpla con una
                                                    relación de aspecto de 5:6 para garantizar una visualización óptima.
                                                </p>
                                                <x-input-error class="text-danger"
                                                               :messages="$errors->get('category_image')"></x-input-error>
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
                                                <img id="category_img" class="border-radius-lg w-50"
                                                     src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group input-group-static mb-4 mt-4">
                                <input id="fileinput" name="category_image" type="file" accept=".jpg,.jpeg,.png,.webp"
                                       style="display:none;">
                            </div>

                            <div class="row">
                                <div class="col-sm-6 text-start">
                                    <a href="{{route('category.index')}}" class="btn bg-gradient-danger mt-3 mb-0"
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

<script>
    $(document).ready(function () {
        $('#falseinput').click(function () {
            $("#fileinput").click();
        });
    });
    $('#fileinput').change(function () {
        $('#selected_filename').text($('#fileinput')[0].files[0].name);
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#category_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>


<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
