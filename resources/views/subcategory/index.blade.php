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
@include('layouts.alerts')
@include('layouts.sidebar')
@include('layouts.header')

@foreach($categories as $category)
    @foreach($category->subcategories as $subcategory)
        <div class="modal fade"
             id="deleteConfirm{{$subcategory->id}}"
             tabindex="-1"
             aria-labelledby="deleteConfirm{{$subcategory->id}}"
             aria-hidden="true">
            <div class="modal-dialog"
                 style="margin-top: 10rem;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="exampleModalLabel">
                            Confirmacion</h5>
                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Esta seguro que desea eliminar
                        la subcategoria
                        '{{ $subcategory->subcategory_name }}
                        ' asociada a la
                        categoria {{$category->category_name }}
                        ?
                        <br><br>
                        Esta accion es irreversible y
                        podria afectar a todos los
                        libros
                        asociados a esta subcategoria.
                    </div>
                    <div
                        class="modal-footer justify-content-between">
                        <button type="button"
                                class="btn bg-gradient-dark mb-0"
                                data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <form method="POST"
                              action="{{ route('subcategory.delete',$subcategory->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn bg-gradient-danger mb-0">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach


<style>
    .btn-secondary :hover {
        box-shadow: 0 14px 26px -12px rgba(0, 0, 0, 0.4), 0 4px 23px 0 rgba(0, 0, 0, 0.15), 0 8px 10px -5px rgba(0, 0, 0, 0.2) !important;
    }
</style>

<main>
    <div class="container">
        <div class="section text-left my-4">
            <div class="row">

                <div class="col">

                    <h2 class="title">Subcategorias</h2>
                </div>
                <div class="col" style="text-align: end; max-width: fit-content;">
                    @if(count($categories) > 0)
                        <a href="{{route('subcategory.create')}}" class="btn btn-sm btn-warning">Crear subcategoria</a>
                    @else
                        <a type="button" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip"
                           data-bs-placement="bottom" title="Es necesario crear al menos una categoria primero"
                           data-container="body" data-animation="true"
                           style="box-shadow: 0 3px 3px 0 rgb(0 0 0 / 15%), 0 3px 1px -2px rgb(146 146 146 / 20%), 0 1px 5px 0 rgb(0 0 0 / 15%); cursor: not-allowed !important;">Crear
                            subcategoria</a>
                    @endif

                </div>
            </div>

            <h3 class="text-center text-secondary">Libros</h3>

            <div class="row">
                <div class="col mx-3">
                    <div class="accordion" id="accordionRental">

                        @forelse($categories as $category)
                            @if($category->category_type == 0)
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="heading{{$category->id}}">
                                    <button class="accordion-button border-bottom font-weight-bold py-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{$category->id}}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{$category->id}}">
                                        <div class="row" style="display: contents">
                                            <div class="col-6">
                                                <h5 class="text-secondary font-weight-bolder opacity-9">{{$category->category_name}}</h5>

                                            </div>
                                            <div class="col-6 text-end">
                                                <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                      title="Esta subcategoria tiene {{count($category->subcategories)}} subcategorias asociadas"
                                                      class="badge bg-gradient-warning">{{count($category->subcategories)}}</span>
                                            </div>
                                        </div>

                                        <i class="collapse-close expand_more text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>


                                        <i class="collapse-open text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapse{{$category->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="heading{{$category->id}}"
                                     data-bs-parent="#accordionRental" style="">
                                    <div class="accordion-body text-sm opacity-8">
                                        @if(count($category->subcategories) > 0)
                                            <hr class="horizontal dark my-auto">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="table-responsive">
                                                            <table class="table align-items-center mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Codigo
                                                                    </th>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Nombre
                                                                    </th>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Creada
                                                                    </th>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Actualizada
                                                                    </th>
                                                                    <th class="text-secondary opacity-7"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($category->subcategories as $subcategory)

                                                                    <tr>
                                                                        <td class="align-middle text-center">
                                                                            <p class="mb-0">{{ $subcategory->id }}</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="mb-0">{{ $subcategory->subcategory_name }}</p>
                                                                        </td>
                                                                        <td class="align-middle text-center text-sm">
                                                                            <p class="mb-0">{{ $subcategory->created_at }}</p>
                                                                        </td>
                                                                        <td class="align-middle text-center text-sm">
                                                                            <p class="mb-0">{{ $subcategory->updated_at }}</p>
                                                                        </td>
                                                                        <td class="align-middle"
                                                                            style="text-align: center;">


                                                                            <a href="{{ route('subcategory.show', $subcategory->id) }}"
                                                                               class="text-secondary mx-3 font-weight-normal"
                                                                               data-original-title="Edit user">
                                                                                Visualizar
                                                                            </a>

                                                                            <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                                               class="text-secondary mx-3 font-weight-normal"
                                                                               data-original-title="Edit user">
                                                                                Editar
                                                                            </a>


                                                                            <a href=""
                                                                               class="text-secondary font-weight-normal"
                                                                               data-bs-toggle="modal"
                                                                               data-bs-target="#deleteConfirm{{$subcategory->id}}"
                                                                               data-toggle="tooltip"
                                                                               data-original-title="Delete user">
                                                                                Eliminar
                                                                            </a>

                                                                        </td>

                                                                    </tr>

                                                                @endforeach


                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col">
                                                    {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                                                    <p class="display-4" style="font-size: x-large"> No existen
                                                        subcategorias para esta
                                                        categoria.</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                            <div class="row">
                                <div class="col">
                                    {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                                    <p class="display-4" style="font-size: x-large"> No existen
                                        categorias.</p>
                                </div>
                            </div>

                        @endforelse


                    </div>
                </div>
            </div>

            <h3 class="mt-5 text-center text-secondary">Productos</h3>
            <div class="row">
                <div class="col mx-3">
                    <div class="accordion" id="accordionRental">

                        @forelse($categories as $category)
                            @if($category->category_type == 1)
                            <div class="accordion-item">
                                <h5 class="accordion-header" id="heading{{$category->id}}">
                                    <button class="accordion-button border-bottom font-weight-bold py-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{$category->id}}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{$category->id}}">
                                        <div class="row" style="display: contents">
                                            <div class="col-6">
                                                <h5 class="text-secondary font-weight-bolder opacity-9">{{$category->category_name}}</h5>

                                            </div>
                                            <div class="col-6 text-end">
                                                <span data-bs-toggle="tooltip" data-bs-placement="left"
                                                      title="Esta subcategoria tiene {{count($category->subcategories)}} subcategorias asociadas"
                                                      class="badge bg-gradient-warning">{{count($category->subcategories)}}</span>
                                            </div>
                                        </div>

                                        <i class="collapse-close expand_more text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>


                                        <i class="collapse-open text-xs pt-1 position-absolute end-0 me-3"
                                           aria-hidden="true"></i>
                                    </button>
                                </h5>
                                <div id="collapse{{$category->id}}" class="accordion-collapse collapse"
                                     aria-labelledby="heading{{$category->id}}"
                                     data-bs-parent="#accordionRental" style="">
                                    <div class="accordion-body text-sm opacity-8">
                                        @if(count($category->subcategories) > 0)
                                            <hr class="horizontal dark my-auto">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="card">
                                                        <div class="table-responsive">
                                                            <table class="table align-items-center mb-0">
                                                                <thead>
                                                                <tr>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Codigo
                                                                    </th>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Nombre
                                                                    </th>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Creada
                                                                    </th>
                                                                    <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                                                        Actualizada
                                                                    </th>
                                                                    <th class="text-secondary opacity-7"></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($category->subcategories as $subcategory)

                                                                    <tr>
                                                                        <td class="align-middle text-center">
                                                                            <p class="mb-0">{{ $subcategory->id }}</p>
                                                                        </td>
                                                                        <td>
                                                                            <p class="mb-0">{{ $subcategory->subcategory_name }}</p>
                                                                        </td>
                                                                        <td class="align-middle text-center text-sm">
                                                                            <p class="mb-0">{{ $subcategory->created_at }}</p>
                                                                        </td>
                                                                        <td class="align-middle text-center text-sm">
                                                                            <p class="mb-0">{{ $subcategory->updated_at }}</p>
                                                                        </td>
                                                                        <td class="align-middle"
                                                                            style="text-align: center;">


                                                                            <a href="{{ route('subcategory.show', $subcategory->id) }}"
                                                                               class="text-secondary mx-3 font-weight-normal"
                                                                               data-original-title="Edit user">
                                                                                Visualizar
                                                                            </a>

                                                                            <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                                               class="text-secondary mx-3 font-weight-normal"
                                                                               data-original-title="Edit user">
                                                                                Editar
                                                                            </a>


                                                                            <a href=""
                                                                               class="text-secondary font-weight-normal"
                                                                               data-bs-toggle="modal"
                                                                               data-bs-target="#deleteConfirm{{$subcategory->id}}"
                                                                               data-toggle="tooltip"
                                                                               data-original-title="Delete user">
                                                                                Eliminar
                                                                            </a>

                                                                        </td>

                                                                    </tr>

                                                                @endforeach


                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col">
                                                    {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                                                    <p class="display-4" style="font-size: x-large"> No existen
                                                        subcategorias para esta
                                                        categoria.</p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                            <div class="row">
                                <div class="col">
                                    {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                                    <p class="display-4" style="font-size: x-large"> No existen
                                        categorias.</p>
                                </div>
                            </div>
                        @endforelse


                    </div>
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
{{--    <script>--}}
{{--        $('.modal-dialog').parent().on('show.bs.modal', function(e){        $(e.relatedTarget.attributes['data-target'].value).appendTo('body'); })--}}
{{--    </script>--}}
</body>
</html>

