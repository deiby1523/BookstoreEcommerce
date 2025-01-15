<!doctype html>
<html lang="es">


<head>
    <title>Categorías</title>
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

<div class="page-header" style="background-color: #ff782dbf; height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>


<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('dashboard.books')}}" class="btn bg-gradient-faded-secondary" style="max-width: 233px; width: -webkit-fill-available;"><svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">
            <div class="row">

                <div class="col">

                    <h2 class="title">Categorias</h2>
                </div>
                <div class="col" style="text-align: end"><a href="{{route('category.create')}}"
                                                            class="btn btn-sm btn-warning">Crear categoria</a></div>
            </div>
            @php if(isset($categories)){
$ncategories = count($categories);
} @endphp
            @if($ncategories > 0)
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
                            @foreach($categories as $category)

                                <tr>
                                    <td class="align-middle text-center ">
                                        <p class=" mb-0">{{ $category->id }}</p>
                                    </td>
                                    <td>
                                        <p class=" mb-0">{{ $category->category_name }}</p>
                                    </td>
                                    <td class="align-middle text-center  ">
                                        <p class=" mb-0">{{ $category->created_at }}</p>
                                    </td>
                                    <td class="align-middle text-center ">
                                        <p class=" mb-0">{{ $category->updated_at }}</p>
                                    </td>
                                    <td class="align-middle" style="text-align: center;">


                                        <a href="{{ route('category.show', $category->id) }}"
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Visualizar
                                        </a>

                                        <a href="{{ route('category.edit', $category->id) }}"
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Editar
                                        </a>


                                        <a href="" class="text-secondary font-weight-normal "
                                           data-bs-toggle="modal" data-bs-target="#deleteConfirm{{$category->id}}"
                                           data-toggle="tooltip" data-original-title="Delete user">
                                            Eliminar
                                        </a>

                                    </td>
                                    <div class="modal fade" id="deleteConfirm{{$category->id}}" tabindex="-1"
                                         aria-labelledby="deleteConfirm{{$category->id}}" aria-hidden="true">
                                        <div class="modal-dialog" style="margin-top: 10rem;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Esta seguro que desea eliminar la categoria
                                                    '{{ $category->category_name }}' ?
                                                    <br><br>
                                                    Esta accion es irreversible y podria afectar a todos los libros
                                                    asociados a esta categoria.
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn bg-gradient-dark mb-0"
                                                            data-bs-dismiss="modal">Cancelar
                                                    </button>
                                                    <form method="POST"
                                                          action="{{ route('category.delete',$category->id) }}">
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
                        {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                        <p class="display-4" style="font-size: x-large"> No existen
                            categorias.</p>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
<div class="container">
    <div class="row">

    </div>
</div>
{{--  <div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">--}}
{{--    <div class="container">--}}
{{--      <div class="section text-center ">--}}
{{--        <h2 class="title">Your main section here</h2>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}
{{--  <footer class="footer pt-5 mt-5">--}}
{{--    <div class="container">--}}
{{--      <div class=" row">--}}
{{--        <div class="col-md-3 mb-4 ms-auto">--}}
{{--          <div>--}}
{{--            <a href="#">--}}
{{--              <img class="mb-3 footer-logo" src={{asset('img/logo-ct-dark.png')}} alt="main_logo">--}}
{{--            </a>--}}
{{--            <h6 class="font-weight-bolder mb-4">Material Kit 2</h6>--}}
{{--          </div>--}}
{{--          <div>--}}
{{--            <ul class="d-flex flex-row ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-facebook text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-twitter text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-dribbble text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-github text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link pe-1" href="#" target="_blank">--}}
{{--                  <i class="fab fa-youtube text-lg opacity-8"></i>--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Company</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  About Us--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Freebies--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Premium Tools--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Blog--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Resources</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Illustrations--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Bits & Snippets--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Affiliate Program--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Help & Support</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Contact Us--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Knowledge Center--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Custom Development--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Sponsorships--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">--}}
{{--          <div>--}}
{{--            <h6 class="text-sm">Legal</h6>--}}
{{--            <ul class="flex-column ms-n3 nav">--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Terms & Conditions--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Privacy Policy--}}
{{--                </a>--}}
{{--              </li>--}}
{{--              <li class="nav-item">--}}
{{--                <a class="nav-link" href="#" target="_blank">--}}
{{--                  Licenses (EULA)--}}
{{--                </a>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-12">--}}
{{--          <div class="text-center ">--}}
{{--            <p class="text-dark my-4 text-sm font-weight-normal">--}}
{{--              All rights reserved. Copyright ©--}}
{{--              <script>--}}
{{--                document.write(new Date().getFullYear())--}}
{{--              </script> Material Kit by <a href="#" target="_blank">Creative Tim</a>.--}}
{{--            </p>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</footer>--}}

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>

