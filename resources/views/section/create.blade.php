<!doctype html>
<html lang="es">
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
    @include('section.styles.create')

    <!-- CodeMirror CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/theme/dracula.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/addon/hint/show-hint.min.css">
    <style>
        .editor-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .editor-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .editor-column, .preview-column {
            flex: 1;
            min-width: 300px;
        }

        .CodeMirror {
            height: 600px;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .preview-frame {
            width: 100%;
            height: 800px;
            border: 1px solid #eee;
            border-radius: 8px;
            background: white;
        }

        .editor-toolbar {
            margin-bottom: 10px;
            display: flex;
            gap: 10px;
        }

        .btn-editor {
            padding: 6px 12px;
            font-size: 14px;
        }
    </style>
</head>

<body>
@include('layouts.sidebar')
@include('layouts.header')

@php

    $currentPane = 1;

    if(count($errors->get('section_custom_name')) >= 1) {
        $currentPane = 2;
    }
@endphp


<main>
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-transparent mb-0 mt-lg-auto" href="{{route('section.index')}}">
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

            <h2 class="title mb-0">Añadir sección</h2>

            <div class="nav-wrapper position-relative end-0 py-4">
                <input type="hidden" id="selectedTab" value="{{$currentPane}}">
                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 {{$currentPane == 1 ? 'active':''}}"
                           data-bs-toggle="tab"
                           href="#default-tab-pane"
                           role="tab"
                           aria-controls="default"
                           aria-selected="{{$currentPane == 1 ? 'true':'false'}}">
                            Normal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 {{$currentPane == 2 ? 'active':''}}"
                           data-bs-toggle="tab"
                           href="#custom-tab-pane"
                           role="tab"
                           aria-controls="custom"
                           id="btn-custom"
                           aria-selected="{{$currentPane == 2 ? 'true':'false'}}">
                            Personalizada
                        </a>
                    </li>
                </ul>
            </div>


            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade {{$currentPane == 1 ? 'show active':''}}"
                     id="default-tab-pane"
                     role="tabpanel"
                     aria-labelledby="default"
                     tabindex="0">
                    <div class="card">
                        <div class="card d-flex justify-content-center p-4 shadow-lg">
                            <form role="form" method="POST" autocomplete="off" id="default-form"
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
                                                       type="text"
                                                       value="{{app('request')->old('section_name', null)}}">
                                            @endif
                                        </div>
                                        <x-input-error class="text-danger"
                                                       :messages="$errors->get('section_name')"></x-input-error>

                                        {{-- Main title --}}
                                        <div class="input-group input-group-static mb-4">
                                            <label>Titulo principal</label>
                                            @if(count($errors->get('section_main_title')) >= 1)
                                                <input name="section_main_title" id="section_main_title"
                                                       class="form-control"
                                                       style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                                       type="text" placeholder="Ingrese el titulo principal"
                                                       value="{{app('request')->old('section_main_title', null)}}">
                                            @else
                                                <input name="section_main_title" id="section_main_title"
                                                       class="form-control"
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
                                                <input name="section_sub_title" id="section_sub_title"
                                                       class="form-control"
                                                       style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                                       type="text" placeholder="Ingrese el subtitulo"
                                                       value="{{app('request')->old('section_sub_title', null)}}">
                                            @else
                                                <input name="section_sub_title" id="section_sub_title"
                                                       class="form-control"
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
                                                <input name="section_secondary_sub_title"
                                                       id="section_secondary_sub_title"
                                                       class="form-control"
                                                       style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                                       type="text" placeholder="Subtitulo secundario"
                                                       value="{{app('request')->old('section_secondary_sub_title', null)}}">
                                            @else
                                                <input name="section_secondary_sub_title"
                                                       id="section_secondary_sub_title"
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
                                                <input name="section_btn_link" id="section_btn_link"
                                                       class="form-control"
                                                       placeholder="Enlace a una URL (Opcional)" aria-label="Full Name"
                                                       type="text"
                                                       style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                                       value="{{app('request')->old('section_btn_link', null)}}">
                                            @else
                                                <input name="section_btn_link" id="section_btn_link"
                                                       class="form-control"
                                                       placeholder="Enlace a una URL (Opcional)" aria-label="Full Name"
                                                       type="text"
                                                       value="{{app('request')->old('section_btn_link', null)}}">
                                            @endif
                                        </div>
                                        <x-input-error class="text-danger"
                                                       :messages="$errors->get('section_btn_link')"></x-input-error>

                                        {{-- image 1 display --}}
                                        <div class="row">
                                            <div
                                                class="card mt-5" <?php if (count($errors->get('section_image_1')) >= 1) {
                                                echo("style='box-shadow: 0 0 8px 2px #ff000061;'");
                                            } else {
                                                echo("style='box-shadow: 0 5px 15px -3px rgb(0 0 0 / 26%), 0 -4px 6px -2px rgb(0 0 0 / 5%) !important;'");
                                            } ?>>
                                                <div class="row">
                                                    <!-- Card body -->
                                                    <div class="col" style="min-width: 250px">
                                                        <div class="card-body">
                                                            <h4 class="font-weight-normal mt-3">Imagen 1</h4>
                                                            <p class="card-text mb-4">Asegúrate de que la imagen sea de
                                                                buena
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
                                                        <div
                                                            class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
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
                                            <input id="fileinput1" name="section_image_1" type="file"
                                                   accept=".jpg,.jpeg,.png,.webp"
                                                   style="display:none;">
                                        </div>

                                        {{-- image 2 display --}}
                                        <div class="row">
                                            <div
                                                class="card mt-2" <?php if (count($errors->get('section_image_2')) >= 1) {
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
                                                                que la imagen sea de buena resolución para garantizar
                                                                una
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
                                                        <div
                                                            class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
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
                                            <input id="fileinput2" name="section_image_2" type="file"
                                                   accept=".jpg,.jpeg,.png,.webp"
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
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            @else
                                                <select name="section_style" id="section_style" class="form-control">
                                                    <option selected disabled hidden value="">-- Seleccione un estilo de
                                                        visualización --
                                                    </option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
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
                                                    <label class="btn btn-outline-secondary"
                                                           for="secondary">Gris</label>
                                                </div>
                                            </div>
                                        </div>
                                        <x-input-error class="text-danger"
                                                       :messages="$errors->get('section_color')"></x-input-error>

                                    </div>

                                    <label class="py-3">Activo</label>
                                    <div class="form-check form-switch mb-6">
                                        <input class="form-check-input checked:false" type="checkbox" id="active"
                                               name="active"
                                               style="scale: 1.3; margin-left: 0.03px">
                                        <x-input-error class="text-danger"
                                                       :messages="$errors->get('active')"></x-input-error>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6 text-start">
                                            <a href="{{route('section.index')}}"
                                               class="btn bg-gradient-danger mt-3 mb-0"
                                               style="max-width: 233px; width: -webkit-fill-available;">Cancelar
                                            </a>
                                        </div>

                                        <div class="col-sm-6 text-end">
                                            <button type="submit" form="default-form"
                                                    class="btn bg-gradient-warning mt-3 mb-0"
                                                    style="max-width: 233px;width: -webkit-fill-available;">Crear
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{$currentPane == 2 ? 'show active':''}}"
                     id="custom-tab-pane"
                     role="tabpanel"
                     aria-labelledby="custom"
                     tabindex="0">
                    <section id="custom-html" style="scroll-margin-top: 20px;">

                        <div class="card">
                            <form role="form" method="POST" autocomplete="off" id="custom-code-form"
                                  action="{{route('section.saveCustom')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">

                                    {{-- Name --}}
                                    <div class="input-group input-group-static mt-2 mb-4">
                                        <label>Nombre</label>
                                        @if(count($errors->get('section_custom_name')) >= 1)
                                            <input name="section_custom_name" id="section_custom_name"
                                                   class="form-control"
                                                   placeholder="Nombre de la sección" aria-label="Full Name"
                                                   type="text"
                                                   style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;"
                                                   value="{{app('request')->old('section_custom_name', null)}}">
                                        @else
                                            <input name="section_custom_name" id="section_custom_name"
                                                   class="form-control"
                                                   placeholder="Nombre de la sección" aria-label="Full Name"
                                                   type="text"
                                                   value="{{app('request')->old('section_custom_name', null)}}">
                                        @endif
                                    </div>
                                    <x-input-error class="text-danger"
                                                   :messages="$errors->get('section_custom_name')"></x-input-error>


                                    <label class="py-3">Activo</label>
                                    <div class="form-check form-switch mb-6">
                                        <input class="form-check-input checked:false" type="checkbox" id="custom_active"
                                               name="custom_active"
                                               style="scale: 1.3; margin-left: 0.03px">
                                        <x-input-error class="text-danger"
                                                       :messages="$errors->get('custom_active')"></x-input-error>
                                    </div>


                                    <h4 class="card-title">Código Personalizado</h4>
                                    <p class="card-category">Escribe tu propio código HTML y ve la vista previa en
                                        tiempo real</p>


                                </div>
                                <div class="card-body pt-0 pb-0">
                                    <textarea id="section_custom_code" name="section_custom_code"
                                              style="display: none;"></textarea>

                                    <div class="editor-preview-container">
                                        <div class="preview-column">
                                            <h5 class="mt-5 mb-3">Vista Previa</h5>
                                            <iframe id="htmlPreview" class="preview-frame"
                                                    sandbox="allow-scripts allow-same-origin"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="row">
                                        <div class="col-sm-6 text-start">
                                            <a href="{{route('section.index')}}" class="btn bg-gradient-danger"
                                               style="max-width: 233px; width: -webkit-fill-available;">Cancelar
                                            </a>
                                        </div>

                                        <div class="col-sm-6 text-end">
                                            <button type="submit" class="btn bg-gradient-warning"
                                                    form="custom-code-form"
                                                    style="max-width: 233px;width: -webkit-fill-available;">Crear
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</main>


@include('section.scripts.create')
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>

<!-- Scripts -->
<!-- CodeMirror JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/addon/hint/show-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/addon/hint/html-hint.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/addon/edit/closetag.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.2/addon/edit/closebrackets.min.js"></script>


<script>
    function scrollToSection(sectionId) {
        const element = document.getElementById(sectionId);
        if (element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

            // Opcional: Actualizar URL sin recargar
            history.pushState(null, null, `#${sectionId}`);
        }
    }
</script>

<script>
    // Inicializar CodeMirror
    const editor = CodeMirror.fromTextArea(
        document.getElementById('section_custom_code'), {
            mode: 'htmlmixed',
            theme: 'dracula',
            lineNumbers: true,
            autoCloseTags: true,
            autoCloseBrackets: true,
            lineWrapping: true,
            extraKeys: {
                "Tab": "indentMore",
                "Ctrl-Space": "autocomplete",
                "Ctrl-Enter": function (cm) {
                    updateSandboxPreview();
                }
            },
            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
            foldGutter: true
        }
    );

    // Insertar etiquetas comunes
    function insertTag(openTag, closeTag = '') {
        const cursor = editor.getCursor();
        editor.replaceRange(openTag + closeTag, cursor);

        if (closeTag) {
            // Posicionar el cursor entre las etiquetas
            editor.setCursor({
                line: cursor.line,
                ch: cursor.ch + openTag.length
            });
        }

        editor.focus();
    }

    // Actualizar vista previa
    function updateSandboxPreview() {
        const htmlContent = editor.getValue();
        const iframe = document.getElementById('htmlPreview');
        //const customCodeInput = document.getElementById('section_custom_code');

        const fullHtml = `
            <!DOCTYPE html>
            <html>
            <head>
                <base target="_blank">
                <link href="{{asset('css/material-kit.css')}}" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <style>
                    body {
                        font-family: 'Roboto', sans-serif;
                        padding: 20px;
                        margin: 0;
                    }
                    .preview-container {
                        max-width: 100%;
                        overflow-x: auto;
                    }
                </style>
            </head>
            <body>
                <div class="preview-container">
                    ${htmlContent}
                </div>
            </body>
            </html>
        `;
        //customCodeInput.setValue(fullHtml);
        iframe.srcdoc = fullHtml;
    }

    // Actualizar al cambiar contenido
    editor.on('change', debounce(() => {
        updateSandboxPreview();
    }, 500));

    // Función debounce para mejorar rendimiento
    function debounce(func, wait) {
        let timeout;
        return function () {
            const context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                func.apply(context, args);
            }, wait);
        };
    }

    // Inicializar con contenido de ejemplo
    function setDefaultValue() {
        editor.setValue(`<section>
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-md-6 mb-md-0 mb-4">
        <h3>Un título muy atractivo</h3>
        <p class="lead mb-md-5 mb-4">
          Personaliza el color para que coincida con tu marca o visión, añade tu logo, elige la imagen perfecta, agrega controles y más.
        </p>
        <p><span class="me-2">&#9679;</span> Exhibe e integra tu contenido</p>
        <p><span class="me-2">&#9679;</span> Añade enlaces a donde prefieras</p>
        <p><span class="me-2">&#9679;</span> Personaliza la experiencia de tus usuarios</p>
        <p><span class="me-2">&#9679;</span> Demuestra tu creatividad</p>
      </div>
      <div class="col-md-6">
        <div class="blur-shadow-image text-center">
          <img src="https://i.pinimg.com/564x/e4/64/ff/e464ff06f242c59cd30d0262a87fd87d.jpg" alt="imagen-de-ejemplo" class="img-fluid shadow-xl border-radius-lg max-height-500">
        </div>
      </div>
    </div>
  </div>
</section>`);

        updateSandboxPreview();
    }

    const btnCustom = document.getElementById('btn-custom');
    btnCustom.addEventListener('click', function () {
        setDefaultValue();
    });

    document.addEventListener("DOMContentLoaded", () => {
        setTimeout(() => window.dispatchEvent(new Event('resize')), 100);
        setDefaultValue();
    })




</script>

</body>
</html>
