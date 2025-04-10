<!doctype html>
<html lang="es">
<head>
    <title>Banners</title>
    <!-- Required meta tags  -->
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
    @include('banner.styles.index')
</head>
<body>
@include('layouts.alerts')
@include('layouts.sidebar')
@include('layouts.header')

<main>
    <div class="container">
        <div class="section text-left my-4">
            <div class="row">

                <div class="col">

                    <h2 class="title">Banners</h2>
                </div>
                <div class="col" style="text-align: end"><a href="{{ route('banner.create') }}"
                                                            class="btn btn-sm btn-warning">Añadir banner</a></div>
            </div>
            @php if(isset($banners)){
$nbanners = count($banners);
} @endphp
            @if($nbanners > 0)
                <div class="card mt-5">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Código
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Nombre
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Estado
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Creado
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Actualizado
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)

                                <tr>
                                    <td class="align-middle text-center ">
                                        <p class=" mb-0">{{ $banner->id }}</p>
                                    </td>
                                    <td>
                                        <p class=" mb-0">{{ $banner->banner_name }}</p>
                                    </td>
                                    @if($banner->active)
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-success">Activado</span>
                                        </td>
                                    @else
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm badge-secondary">Desactivado</span>
                                        </td>
                                    @endif
                                    <td class="align-middle text-center  ">
                                        <p class=" mb-0">{{ $banner->created_at }}</p>
                                    </td>
                                    <td class="align-middle text-center ">
                                        <p class=" mb-0">{{ $banner->updated_at }}</p>
                                    </td>
                                    <td class="align-middle" style="text-align: center;">


                                        <a href="{{ route('banner.show',$banner->id) }}"
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Visualizar
                                        </a>

                                        <a href="{{ route('banner.edit',$banner->id) }}"
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Editar
                                        </a>


                                        <a href="" class="text-secondary font-weight-normal "
                                           data-bs-toggle="modal" data-bs-target="#deleteConfirm{{$banner->id}}"
                                           data-toggle="tooltip" data-original-title="Delete featured">
                                            Eliminar
                                        </a>

                                    </td>
                                    <div class="modal fade" id="deleteConfirm{{$banner->id}}" tabindex="-1"
                                         aria-labelledby="deleteConfirm{{$banner->id}}" aria-hidden="true">
                                        <div class="modal-dialog" style="margin-top: 10rem;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Esta seguro que desea eliminar el banner
                                                    '{{ $banner->banner_name }}' ?
                                                    <br><br>
                                                    Esta acción es irreversible.
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn bg-gradient-dark mb-0"
                                                            data-bs-dismiss="modal">Cancelar
                                                    </button>
                                                    <form method="POST"
                                                          action="{{ route('banner.delete',$banner->id) }}">
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
                <div class="row my-5">
                    <div class="col">
                        <p class="display-4" style="font-size: x-large"> No hay banners</p>
                    </div>
                </div>
            @endif
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

