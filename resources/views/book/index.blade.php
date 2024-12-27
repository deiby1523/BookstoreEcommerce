<!doctype html>
<html lang="es">

<head>
    <title>Libros</title>
    <!-- Required meta tags --->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons --->
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

{{-- aditional styles --}}
@include('book.styles.index')


<div class="page-header" style="background-image: url({{asset('img/bg-20.jpg')}}); height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>


<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('dashboard.books')}}"
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
            <div class="row">

                <div class="col">

                    <h2 class="title">Libros</h2>
                </div>
                <div class="col" style="text-align: end"><a href="{{route('book.create')}}"
                                                            class="btn btn-sm btn-warning">Crear Libro</a></div>
            </div>

            {{-- Search bar --}}
            <div class="row">
                <div class="container w-60 my-5 shadow-lg p-2" style="border-radius: 10px">
                    <div class="input-group input-group-dynamic">

                                    <span class="input-group-text" id="basic-addon1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg></span>


                        <input id="searchBook" name="searchBook" type="text" class="form-control"
                               placeholder="Buscar libros">

                    </div>
                </div>


            </div>


            {{--            <div id="bookDisplay">--}}

            {{--            </div>--}}
            @php if(isset($books)){
$nbooks = count($books);
} @endphp
            @if($nbooks > 0)
                <div class="card">
                    <div id="loader" style="align-self: center"></div>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0" id="table">
                            <thead>
                            <tr>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    ISBN
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Titulo
                                </th>
                                <th class="text-center  text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Editorial
                                </th>
                                <th class="text-center text-uppercase text-secondary font-weight-bolder opacity-7">
                                    Precio
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody id="bookDisplay">
                            @php
                                function convertToISBN($number):string {
                                return 'ISBN ' . substr($number, 0, 3) . '-' . substr($number, 3, 1) . '-' . substr($number, 4, 4) . '-' . substr($number, 8, 4) . '-' . substr($number, 12, 1);
                                }
                            @endphp
                            @foreach($books as $book)
                                @php
                                    // Ejemplo de uso


                                    $number = $book->book_isbn; // Tu número de 13 dígitos
                                    $isbn = convertToISBN($number);

                                @endphp
                                <tr>
                                    <td class="align-middle text-center  ">
                                        <p class="mb-0">{{ $isbn }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 truncated-text-large" data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="{{$book->book_title}}">{{ $book->book_title }}</p>
                                    </td>
                                    <td class="align-middle ">
                                        <p class="mb-0 truncated-text-short" data-bs-toggle='tooltip'
                                           data-bs-placement='top'
                                           title='{{$book->publisher_name}}'>{{ $book->publisher_name }}</p>
                                    </td>
                                    <td class="align-middle ">
                                        <p class="mb-0">$ {{ number_format($book->book_price) }}</p>
                                    </td>

                                    <td class="align-middle" style="text-align: center;">


                                        <a href="{{ route('book.show', $book->id) }}"
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Show user">
                                            Visualizar
                                        </a>

                                        <a href="{{ route('book.edit', $book->id) }}"
                                           class="text-secondary  mx-3 font-weight-normal "
                                           data-toggle="tooltip" data-original-title="Edit user">
                                            Editar
                                        </a>


                                        <a href="" class="text-secondary font-weight-normal "
                                           data-bs-toggle="modal" data-bs-target="#deleteConfirm{{$book->id}}"
                                           data-toggle="tooltip" data-original-title="Delete user">
                                            Eliminar
                                        </a>

                                    </td>
                                    <div class="modal fade" id="deleteConfirm{{$book->id}}" tabindex="-1"
                                         aria-labelledby="deleteConfirm{{$book->id}}" aria-hidden="true">
                                        <div class="modal-dialog" style="margin-top: 10rem;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Esta seguro que desea eliminar el libro
                                                    '{{ $book->book_title }}' ?
                                                    <br><br>
                                                    Esta accion es irreversible.
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn bg-gradient-dark mb-0"
                                                            data-bs-dismiss="modal">Cancelar
                                                    </button>
                                                    <form method="POST"
                                                          action="{{ route('book.delete',$book->id) }}">
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
                        <div id="loading" class="loading-animation"></div>
                    </div>
                    <br>
                    <div class="row" id="noExistsDisplay" style="display: none">
                        <div class="col text-center">
                            <p class="display-4" style="font-size: x-large"> No se encontró el libro</p>
                        </div>
                    </div>
                    @else
                        <br>
                        <div class="row">
                            <div class="col">
                                {{--                                                    <h3 class="title mt-3">{{$category->category_name}}</h3>--}}
                                <p class="display-4" style="font-size: x-large"> No existen
                                    libros.</p>
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
</div>

<br><br><br><br>

@include('book.scripts.index')

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
