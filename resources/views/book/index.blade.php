<!doctype html>
<html lang="es">

{{-- TODO: Organizar el codigo y pasar los scripts y CSS a otro archivo --}}

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

<!-- Estilos para mostrar las alertas con un toque más suave -->
<style>
    .mostrar {
        display: block;
        opacity: 1;
    }

    .ocultar {
        opacity: 0;
        pointer-events: none;
    }

    .row-hover:hover {
        background-color: #f8f9fa;
    }
</style>

<style>

    #loading {
        display: none; /* Oculta la animación de carga inicialmente */
    }

    /* Puedes personalizar este estilo según tus necesidades */
    .loading-animation {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>

@if ($message = Session::get('success'))
    <script>
        // Función para mostrar la alerta y ocultarla después de cierto tiempo
        function mostrarAlerta() {
            const alerta = document.getElementById('alert');
            alerta.style.display = 'block';

            // Ocultar la alerta después de 5 segundos (5000 milisegundos)
            setTimeout(function () {
                alerta.style.display = 'none';
            }, 3000);
        }

        // Llama a la función para mostrar la alerta
        mostrarAlerta();
    </script>
    <div class="container" style="max-width: initial;
    padding: unset;
    position: fixed;
    margin-top: 8rem;
    z-index: 1;
}">
        <div id="alert" class="alert blur alert-success text-white font-weight-bold" role="alert"
             style="transition: opacity 0.5s ease-in-out;;box-shadow: none;background-image: initial;margin: 0 10% 10% 10%; position: absolute;
             backdrop-filter: saturate(0%) blur(4px) !important; background-color: rgb(7 255 0 / 15%) !important;   width: -webkit-fill-available;
             z-index: 1;">
            {{$message}}
        </div>
    </div>
    <script>
        function mostrarAlerta() {
            const alerta = document.getElementById('alert');


            setTimeout(function () {
                alerta.classList.add('ocultar');
            }, 3000);


        }

        mostrarAlerta();
    </script>
@endif

@if ($message = Session::get('danger'))

    <div class="container" style="max-width: initial;
    padding: unset;
    position: fixed;
    margin-top: 8rem;
    z-index: 1;
}">
        <div id="alert" class="alert blur alert-danger text-white font-weight-bold" role="alert"
             style="transition: opacity 0.5s ease-in-out;box-shadow: none;background-image: initial;margin: 0 10% 10% 10%; position: absolute;    width: -webkit-fill-available;backdrop-filter: saturate(0%) blur(4px) !important;
    background-color: rgb(7 255 0 / 15%) !important;    z-index: 1;">
            {{$message}}
        </div>
    </div>
    <script>
        function mostrarAlerta() {
            const alerta = document.getElementById('alert');

            setTimeout(function () {
                alerta.classList.add('ocultar');
            }, 3000);

        }

        mostrarAlerta();
    </script>
@endif


<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">
    {{--    <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>


<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="container">
        <div class="section text-left my-4">
            <a href="{{ route('dashboard.books') }}" class="text-warning text-sm icon-move-left">
                < volver
            </a>
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

            <style>
                /* Agrega estilos según tus preferencias para la animación de carga */
                .loader {
                    border: 4px solid rgba(255, 255, 255, 0.3);
                    border-radius: 50%;
                    border-top: 4px solid #fb8c00; /* Color del borde superior */
                    width: 24px;
                    height: 24px;
                    animation: spin 1s linear infinite; /* Nombre de la animación, duración, tipo de interpolación y repetición infinita */
                    margin-right: 10px; /* Espacio entre la animación y el campo de búsqueda */
                }

                /* Definición de la animación */
                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                }
            </style>

            <script>
                $(document).ready(function () {
                    let typingTimer;  // Variable para almacenar el temporizador de escritura
                    const doneTypingInterval = 2000;  // Intervalo de tiempo después del cual se considera que la escritura ha terminado (en milisegundos)
                    let loaderTimeout; // Variable para almacenar el temporizador de la animación de carga

                    // Función para mostrar la animación de carga
                    function showLoader() {
                        // Agrega la clase 'loader' al elemento con ID 'loader'
                        $('#loader').addClass('loader');
                    }


                    // Función para ocultar la animación de carga
                    function hideLoader() {
                        // Elimina la clase 'loader' del elemento con ID 'loader'
                        $('#loader').removeClass('loader');
                    }

                    // Evento keyup para el campo de búsqueda
                    $('#searchBook').keyup(function () {
                        clearTimeout(typingTimer);  // Reinicia el temporizador en cada pulsación de tecla
                        clearTimeout(loaderTimeout);  // Reinicia el temporizador de la animación de carga

                        showLoader();  // Muestra la animación de carga

                        // Inicia un nuevo temporizador para detectar cuando la escritura ha terminado
                        typingTimer = setTimeout(doneTyping, doneTypingInterval);
                    });

                    // Función que se ejecuta cuando la escritura ha terminado
                    function doneTyping() {
                        hideLoader();  // Oculta la animación de carga después de que haya pasado el intervalo de tiempo


                    }
                });
            </script>
            <script>
                // Book
                // Ajax request according to what's in the search box
                function get_books(search) {
                    $.ajax({
                        url: `book/search/${search}`,
                        type: 'GET',
                        dataType: 'json',
                        data: {'search': search},
                    })
                        .done(function (books) {
                            let resultsList = ""; // Create a variable to store the list of results
                            books.forEach(function (book) {

                                resultsList += `<tr>
                                                    <td class='align-middle text-center '><p class=' mb-0'>${book.book_isbn}</p></td>
                                                    <td><p class='mb-0'>${book.book_title}</p></td>
                                                    <td class='align-middle'><p class='mb-0'>${book.publisher_name}</p></td>
                                                    <td class='align-middle' style='text-align: center;'>
                                                        <a href='book/show/${book.id}' class='text-secondary mx-3 font-weight-normal' data-toggle='tooltip' data-original-title='Show user'>
                                                            Visualizar
                                                        </a>
                                                        <a href='book/edit/${book.id}' class='text-secondary mx-3 font-weight-normal' data-toggle='tooltip' data-original-title='Edit user'>
                                                            Editar
                                                        </a>
                                                        <a href='' class='text-secondary font-weight-normal' data-bs-toggle='modal' data-bs-target='#deleteConfirm${book.id}' data-toggle='tooltip' data-original-title='Delete user'>
                                                            Eliminar
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div class='modal fade' id='deleteConfirm${book.id}' tabindex='-1' aria-labelledby='deleteConfirm${book.id}' aria-hidden='true'>
                                                    <div class='modal-dialog' style='margin-top: 10rem;'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                Esta seguro que desea eliminar el libro '${book.book_title}'?
                                                                <br><br>
                                                                Esta accion es irreversible.
                                                            </div>
                                                            <div class='modal-footer justify-content-between'>
                                                                <button type='button' class='btn bg-gradient-dark mb-0' data-bs-dismiss='modal'>Cancelar</button>
                                                                <form method='DELETE' action='book/delete/${book.id}'>
                                                                    <button type='submit' class='btn bg-gradient-danger mb-0'>Eliminar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
                            });

                            // Insert the complete list of results in #bookDisplay after all authors have been processed
                            $("#bookDisplay").html(resultsList);

                            // Obtiene la referencia a la tabla por su ID
                            const table = document.getElementById("table");
                            const display = document.getElementById("noExistsDisplay");

                            // Obtiene todas las celdas <td> de la tabla
                            const data = table.getElementsByTagName("td");

                            // Verifica si hay al menos una celda <td>
                            if (data.length > 0) {
                                // Si hay al menos una celda <td>, muestra la tabla
                                display.style.display = "none"
                                table.style.display = "table";
                            } else {
                                // Si no hay celdas <td>, oculta la tabla
                                display.style.display = "block";
                                table.style.display = "none";
                            }
                        });
                }


                // Function to implement debounce for delaying Ajax calls
                function debounce(func, delay) {
                    let timer;
                    return function () {
                        const context = this;
                        const args = arguments;
                        clearTimeout(timer);
                        timer = setTimeout(() => {
                            func.apply(context, args);
                        }, delay);
                    };
                }


                // book
                // Wrapped Ajax function with debounce
                const BookDelayedRequest = debounce(function (search) {
                    get_books(search);
                }, 2000); // 300ms delay, adjustable based on your needs

                // book
                // 'input' event using the debounce function
                $(document).on('input', '#searchBook', function () {
                    const searchValue = $('#searchBook').val();
                    if (searchValue !== "") {
                        BookDelayedRequest(searchValue);
                    } else {
                        $("#bookDisplay").html("");
                    }
                });
            </script>

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
                                        <p class=" mb-0">{{ $isbn }}</p>
                                    </td>
                                    <td>
                                        <p class=" mb-0">{{ $book->book_title }}</p>
                                    </td>
                                    <td class="align-middle ">
                                        <p class=" mb-0">{{ $book->publisher_name }}</p>
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


<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
