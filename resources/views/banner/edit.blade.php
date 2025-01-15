<!doctype html>
<html lang="es">


<head>
    <title>Editar Banner</title>
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
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('banner.index')}}" class="btn bg-gradient-faded-secondary" style="max-width: 233px; width: -webkit-fill-available;"><svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">

            <h2 class="title">Editar Banner</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{ route('banner.update',$banner->id) }} " enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre</label>
                                        @if(count($errors->get('banner_name')) >= 1)
                                            <input value="{{$banner->banner_name}}" name="banner_name"
                                                   id="banner_name" class="form-control"
                                                   placeholder="Nombre de anuncio" aria-label="Full Name"
                                                   type="text"
                                                   style="box-shadow: 0 0 8px 2px #ff000061; border-radius: 10px !important;">
                                        @else
                                            <input value="{{$banner->banner_name}}" name="banner_name"
                                                   id="banner_name" class="form-control"
                                                   placeholder="Nombre del anuncio" aria-label="Full Name"
                                                   type="text">
                                        @endif
                                    </div>
                                    <x-input-error class="text-danger"
                                                   :messages="$errors->get('banner_name')"></x-input-error>
                                </div>

                            </div>

                            <div class="form-check form-switch py-3">
                                @if(count($errors->get('active')) >= 1)
                                    @if($banner->active)
                                        <input class="form-check-input checked:true" type="checkbox" id="active"
                                               name="active" checked>
                                    @else
                                        <input class="form-check-input checked:false" type="checkbox" id="active"
                                               name="active">
                                    @endif
                                @else
                                    @if($banner->active)
                                        <input class="form-check-input checked:true" type="checkbox" id="active"
                                               name="active" checked>
                                    @else
                                        <input class="form-check-input checked:false" type="checkbox" id="active"
                                               name="active">
                                    @endif
                                @endif
                                <label class="form-check-label" for="active">Activado</label>
                                <x-input-error class="text-danger"
                                               :messages="$errors->get('active')"></x-input-error>
                            </div>

                            <div class="row">
                                <div class="card mt-5" <?php if (count($errors->get('banner_image')) >=1 ) { echo ("style='box-shadow: 0 0 8px 2px #ff000061;'");} else { echo("style='box-shadow: 0 5px 15px -3px rgb(0 0 0 / 26%), 0 -4px 6px -2px rgb(0 0 0 / 5%) !important;'");} ?>>
                                    <div class="row">
                                        <!-- Card body -->
                                        <div class="col-5">
                                            <div class="card-body">
                                                <h4 class="font-weight-normal mt-3">Imagen</h4>
                                                <p class="card-text mb-4">Subir imagen con formato .jpg, Asegúrate de
                                                    que la imagen sea ancha y de buena resolución.
                                                </p>
                                                <x-input-error class="text-danger"
                                                               :messages="$errors->get('banner_image')"></x-input-error>
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
                                        <div class="col-7 mb-4 text-center">
                                            <div class="card-header p-0 position-relative mt-n4 z-index-2"
                                                 style="background: none;">
                                                <img id="banner_img" class="border-radius-lg w-100"
                                                     src="{{asset($banner->banner_image_url)}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input-group input-group-static mb-4 mt-4">
                                <input id="fileinput" name="banner_image" type="file" accept=".jpg,.jpeg,.png,.webp"
                                       style="display:none;">
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-start">
                                    <a href="{{route('banner.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Cancelar
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
            $('#banner_img').attr('src', e.target.result);
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
