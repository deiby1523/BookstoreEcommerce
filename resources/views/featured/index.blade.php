<!doctype html>
<html lang="es">


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

@include('layouts.alerts')

<style>
    .badge-success {
        color: #339537;
        background-color: #bce2be;
    }

    .badge.badge-secondary {
        background-color: #d7d9e1;
        color: #6c757d;
    }

    .badge-sm {
        padding: .45em .775em;
        font-size: .65em;
        border-radius: .375rem;
    }
</style>

<div class="page-header" style="background-image: url({{asset('img/bg-20.jpg')}}); height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>


<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('dashboard.interface')}}" class="btn bg-gradient-faded-secondary" style="max-width: 233px; width: -webkit-fill-available;"><svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">
            <div class="row">

                <div class="col">

                    <h2 class="title">Destacados</h2>
                </div>
                <div class="col" style="text-align: end"><a href="{{ route('featured.create') }}" class="btn btn-sm btn-warning">Crear tipo</a></div>
            </div>
            @php if(isset($featured_types)){
$nfeatured = count($featured_types);
} @endphp
            @if($nfeatured > 0)
                <div class="card">
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
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Estado
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Creada
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Actualizada
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($featured_types as $featured)

                                <tr>
                                    <td class="align-middle text-center ">
                                        <p class=" mb-0">{{ $featured->id }}</p>
                                    </td>
                                    <td>
                                        <p class=" mb-0">{{ $featured->featured_type_name }}</p>
                                    </td>
                                    @if($featured->active)
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm badge-success">Activado</span>
                                    </td>
                                    @else
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm badge-secondary">Desactivado</span>
                                    </td>
                                    @endif
                                    <td class="align-middle text-center  ">
                                        <p class=" mb-0">{{ $featured->created_at }}</p>
                                    </td>
                                    <td class="align-middle text-center ">
                                        <p class=" mb-0">{{ $featured->updated_at }}</p>
                                    </td>
                                    <td class="align-middle" style="text-align: center;">


                                        <a href=""
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Visualizar
                                        </a>

                                        <a href=""
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Editar
                                        </a>


                                        <a href="" class="text-secondary font-weight-normal "
                                           data-bs-toggle="modal" data-bs-target="#deleteConfirm{{$featured->id}}"
                                           data-toggle="tooltip" data-original-title="Delete user">
                                            Eliminar
                                        </a>

                                    </td>
                                    <div class="modal fade" id="deleteConfirm{{$featured->id}}" tabindex="-1"
                                         aria-labelledby="deleteConfirm{{$featured->id}}" aria-hidden="true">
                                        <div class="modal-dialog" style="margin-top: 10rem;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Esta seguro que desea eliminar la seccion de libros destacados
                                                    '{{ $featured->featured_type_name }}' ?
                                                    <br><br>
                                                    Esta accion es irreversible.
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn bg-gradient-dark mb-0"
                                                            data-bs-dismiss="modal">Cancelar
                                                    </button>
                                                    <form method="POST"
                                                          action="">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-gradient-danger mb-0">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <br>
                <div class="row">
                    <div class="col">
                        <p class="display-4" style="font-size: x-large"> No existen
                            destacados.</p>
                    </div>
                </div>
            @endif
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

