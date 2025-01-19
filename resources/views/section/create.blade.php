<!doctype html>
<html lang="es">

{{-- TODO: Realizar una busqueda y correccion de errroes al crear Secciones --}}

<head>
    <title>Añadir sección</title>
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

@include('section.styles.create')

<div class="page-header" style="background-color: #ff782dbf; height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('section.index')}}"
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

            <h2 class="title">Añadir sección</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{ route('section.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row">

                                {{-- Name --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Nombre</label>
                                    @if(count($errors->get('section_name')) >= 1)
                                        <input name="section_name" id="section_name" class="form-control"
                                               placeholder="Nombre de la sección" aria-label="Full Name"
                                               type="text"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               value="{{app('request')->old('section_name', null)}}">
                                    @else
                                        <input name="section_name" id="section_name" class="form-control"
                                               placeholder="Nombre de la sección" aria-label="Full Name"
                                               type="text" value="{{app('request')->old('section_name', null)}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_name')"></x-input-error>

                                {{-- Main title --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Titulo principal</label>
                                    @if(count($errors->get('section_main_title')) >= 1)
                                        <input name="section_main_title" id="section_main_title" class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="text" placeholder="Ingrese el titulo principal"
                                               value="{{app('request')->old('section_main_title', null)}}">
                                    @else
                                        <input name="section_main_title" id="section_main_title" class="form-control"
                                               type="text" placeholder="Ingrese el titulo principal"
                                               value="{{app('request')->old('section_main_title', null)}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_main_title')"></x-input-error>

                                {{-- Secondary title --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Titulo secundario</label>
                                    @if(count($errors->get('section_secondary_title')) >= 1)
                                        <input name="section_secondary_title" id="section_secondary_title"
                                               class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="text" placeholder="Ingrese el titulo secundario"
                                               value="{{app('request')->old('section_secondary_title', null)}}">
                                    @else
                                        <input name="section_secondary_title" id="section_secondary_title"
                                               class="form-control"
                                               type="text" placeholder="Ingrese el titulo secundario"
                                               value="{{app('request')->old('section_secondary_title', null)}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_secondary_title')"></x-input-error>

                                {{-- Subtitle --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Subtitulo</label>
                                    @if(count($errors->get('section_sub_title')) >= 1)
                                        <input name="section_sub_title" id="section_sub_title" class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="text" placeholder="Ingrese el subtitulo"
                                               value="{{app('request')->old('section_sub_title', null)}}">
                                    @else
                                        <input name="section_sub_title" id="section_sub_title" class="form-control"
                                               type="text" placeholder="Ingrese el subtitulo"
                                               value="{{app('request')->old('section_sub_title', null)}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_sub_title')"></x-input-error>

                                {{-- Secondary subtitle --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Subtitulo secundario</label>
                                    @if(count($errors->get('section_secondary_sub_title')) >= 1)
                                        <input name="section_secondary_sub_title" id="section_secondary_sub_title"
                                               class="form-control"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               type="text" placeholder="Subtitulo secundario"
                                               value="{{app('request')->old('section_secondary_sub_title', null)}}">
                                    @else
                                        <input name="section_secondary_sub_title" id="section_secondary_sub_title"
                                               class="form-control"
                                               type="text" placeholder="Subtitulo secundario"
                                               value="{{app('request')->old('section_secondary_sub_title', null)}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_secondary_sub_title')"></x-input-error>

                                {{-- Text 1 --}}
                                <div class="input-group input-group-static mb-4 mt-md-0 mt-4">
                                    <label>Texto 1</label>
                                    @if(count($errors->get('section_text_1')) >= 1)
                                        <textarea name="section_text_1" class="form-control"
                                                  id="section_text_1" rows="6"
                                                  placeholder="Texto para el espacio 1, mínimo 5 caracteres y máximo 500"
                                                  style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{app('request')->old('section_text_1', null)}}</textarea>
                                    @else
                                        <textarea name="section_text_1" class="form-control"
                                                  id="section_text_1" rows="6"
                                                  placeholder="Texto para el espacio 1, mínimo 5 caracteres y máximo 500">{{app('request')->old('section_text_1', null)}}</textarea>
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_text_1')"></x-input-error>

                                {{-- Text 2 --}}
                                <div class="input-group input-group-static mb-4 mt-md-0 mt-4">
                                    <label>Texto 2</label>
                                    @if(count($errors->get('section_text_2')) >= 1)
                                        <textarea name="section_text_2" class="form-control"
                                                  id="section_text_2" rows="6"
                                                  placeholder="Texto para el espacio 2, mínimo 5 caracteres y máximo 500"
                                                  style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">{{app('request')->old('section_text_2', null)}}</textarea>
                                    @else
                                        <textarea name="section_text_2" class="form-control"
                                                  id="section_text_2" rows="6"
                                                  placeholder="Texto para el espacio 2, mínimo 5 caracteres y máximo 500">{{app('request')->old('section_text_2', null)}}</textarea>
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_text_2')"></x-input-error>


                                {{-- Button Link --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Acción del botón</label>
                                    @if(count($errors->get('section_btn_link')) >= 1)
                                        <input name="section_btn_link" id="section_btn_link" class="form-control"
                                               placeholder="Enlace a una URL (Opcional)" aria-label="Full Name"
                                               type="text"
                                               style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                               value="{{app('request')->old('section_btn_link', null)}}">
                                    @else
                                        <input name="section_btn_link" id="section_btn_link" class="form-control"
                                               placeholder="Enlace a una URL (Opcional)" aria-label="Full Name"
                                               type="text" value="{{app('request')->old('section_btn_link', null)}}">
                                    @endif
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_btn_link')"></x-input-error>

                                {{-- image 1 display --}}
                                <div class="row">
                                    <div class="card mt-5" <?php if (count($errors->get('section_image_1')) >= 1) {
                                        echo("style='box-shadow: 0 0 8px 2px #ff000061;'");
                                    } else {
                                        echo("style='box-shadow: 0 5px 15px -3px rgb(0 0 0 / 26%), 0 -4px 6px -2px rgb(0 0 0 / 5%) !important;'");
                                    } ?>>
                                        <div class="row">
                                            <!-- Card body -->
                                            <div class="col" style="min-width: 250px">
                                                <div class="card-body">
                                                    <h4 class="font-weight-normal mt-3">Imagen 1</h4>
                                                    <p class="card-text mb-4">Asegúrate de que la imagen sea de buena
                                                        resolución para garantizar una visualización óptima.
                                                    </p>
                                                    <x-input-error class="text-danger"
                                                                   :messages="$errors->get('section_image_1')"></x-input-error>
                                                    <div class="row mt-5">
                                                        <div class="col-md-4">

                                                            <a id="falseinput1" class="btn btn-outline-warning">Subir
                                                                Imagen</a>
                                                        </div>
                                                        <div class="col" style="align-self: center;">

                                                            <p id="selected_filename1">No file selected</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card image -->
                                            <div class="col mb-4 text-center" style="min-width: 50%">
                                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
                                                     style="background: none;">
                                                    <img id="section_img_1" class="border-radius-lg w-50"
                                                         src="" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- image input --}}
                                <div class="input-group input-group-static mb-4 mt-4">
                                    <input id="fileinput1" name="section_image_1" type="file" accept=".jpg,.jpeg,.png"
                                           style="display:none;">
                                </div>

                                {{-- image 2 display --}}
                                <div class="row">
                                    <div class="card mt-2" <?php if (count($errors->get('section_image_2')) >= 1) {
                                        echo("style='box-shadow: 0 0 8px 2px #ff000061;'");
                                    } else {
                                        echo("style='box-shadow: 0 5px 15px -3px rgb(0 0 0 / 26%), 0 -4px 6px -2px rgb(0 0 0 / 5%) !important;'");
                                    } ?>>
                                        <div class="row">
                                            <!-- Card body -->
                                            <div class="col" style="min-width: 250px">
                                                <div class="card-body">
                                                    <h4 class="font-weight-normal mt-3">Imagen 2</h4>
                                                    <p class="card-text mb-4">Asegúrate
                                                        de
                                                        que la imagen sea de buena resolución para garantizar una
                                                        visualización óptima.
                                                    </p>
                                                    <x-input-error class="text-danger"
                                                                   :messages="$errors->get('section_image_2')"></x-input-error>
                                                    <div class="row mt-5">
                                                        <div class="col-md-4">

                                                            <a id="falseinput2" class="btn btn-outline-warning">Subir
                                                                Imagen</a>
                                                        </div>
                                                        <div class="col" style="align-self: center;">

                                                            <p id="selected_filename2">No file selected</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Card image -->
                                            <div class="col mb-4 text-center" style="min-width: 50%">
                                                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
                                                     style="background: none;">
                                                    <img id="section_img_2" class="border-radius-lg w-50"
                                                         src="" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- image input --}}
                                <div class="input-group input-group-static mb-4 mt-4">
                                    <input id="fileinput2" name="section_image_2" type="file" accept=".jpg,.jpeg,.png"
                                           style="display:none;">
                                </div>

                                {{-- Tip: para saber el estado de los radios se puede usar el atributo checked --}}

                                {{-- Style select --}}
                                <div class="input-group input-group-static mb-4">
                                    <label>Estilo</label>
                                    @if(count($errors->get('section_style')) >= 1)
                                        <select name="section_style" id="section_style" class="form-control"
                                                style="box-shadow: 0 0 8px 2px #ff000061;">
                                            <option selected disabled hidden value="">-- Seleccione un estilo de
                                                visualización --
                                            </option>
                                            <option value="1">1</option>
                                        </select>
                                    @else
                                        <select name="section_style" id="section_style" class="form-control">
                                            <option selected disabled hidden value="">-- Seleccione un estilo de
                                                visualización --
                                            </option>
                                            <option value="1">1</option>
                                        </select>
                                    @endif

                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_style')"></x-input-error>

                                {{-- Color --}}
                                <div class="mb-2 mt-md-0 mt-4">
                                    <label>Color de énfasis</label>
                                    <div class="row text-center my-4">
                                        <div class="col-2">
                                            <input type="radio" class="btn-check" name="section_color"
                                                   id="warning" autocomplete="off" checked value="1">
                                            <label class="btn btn-outline-warning" for="warning">Naranja</label>
                                        </div>

                                        <div class="col-2">
                                            <input type="radio" class="btn-check" name="section_color"
                                                   id="success" autocomplete="off" value="2">
                                            <label class="btn btn-outline-success" for="success">Verde</label>
                                        </div>

                                        <div class="col-2">
                                            <input type="radio" class="btn-check" name="section_color"
                                                   id="danger" autocomplete="off" value="3">
                                            <label class="btn btn-outline-danger" for="danger">Rojo</label>
                                        </div>

                                        <div class="col-2">
                                            <input type="radio" class="btn-check" name="section_color"
                                                   id="info" autocomplete="off" value="4">
                                            <label class="btn btn-outline-info" for="info">Azul</label>
                                        </div>

                                        <div class="col-2">
                                            <input type="radio" class="btn-check" name="section_color"
                                                   id="primary" autocomplete="off" value="5">
                                            <label class="btn btn-outline-primary" for="primary">Magenta</label>
                                        </div>

                                        <div class="col-2">
                                            <input type="radio" class="btn-check" name="section_color"
                                                   id="secondary" autocomplete="off" value="6">
                                            <label class="btn btn-outline-secondary" for="secondary">Gris</label>
                                        </div>
                                    </div>
                                </div>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('section_color')"></x-input-error>

                            </div>

                            <label class="py-3">Activado</label>
                            <div class="form-check form-switch mb-6">
                                <input class="form-check-input checked:false" type="checkbox" id="active" name="active"
                                       style="scale: 1.3; margin-left: 0.03px">
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('active')"></x-input-error>
                            </div>


                            <div class="row">
                                <div class="col-sm-6 text-start">
                                    <a href="{{route('section.index')}}" class="btn bg-gradient-danger mt-3 mb-0"
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

@include('section.scripts.create')


<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
