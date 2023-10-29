<!doctype html>
<html lang="es">

<head>
    <title>Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>


    {{--    Jquery --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


</head>

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->

<style type="text/css">
    .listbox {
        margin-top: 10px !important;
    }


    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }


    input[type=date]::-webkit-inner-spin-button,
    input[type=date]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=date] {
        -moz-appearance: textfield;
    }

    .selectauthor {
        display: none;
    }

    .show {
        display: block;
    }
</style>

<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">
    {{--    <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="container">
        <div class="section text-left my-4">
            <a href="{{ route('book.index') }}" class="text-warning text-sm icon-move-left">
                < volver
            </a>

            <h2 class="title">Crear Libro</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <form role="form" id="contact-form" method="POST" autocomplete="off"
                          action="{{--{{ route('subcategory.save') }}--}}">
                        @csrf
                        <div class="card-body pb-2">
                            <div class="row">

                                <div class="input-group input-group-static mb-4 mt-4">


                                    <label>Codigo ISBN</label>
                                    <input name="book_isbn" id="book_isbn" class="form-control" aria-label="Full Name"
                                           type="number" autofocus>
                                    <span class="input-group-text" style="right: 18px"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                            <path
                                                d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z"/>
                                        </svg></span>
                                </div>

                                <div class="input-group input-group-static mb-4">
                                    <label>Categoria</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option selected disabled hidden value=""></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label>Subcategoria</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">

                                    </select>

                                </div>
                                <div class="input-group input-group-static mb-4">

                                    <label>Nombre</label>
                                    <input name="subcategory_name" id="subcategory_name" class="form-control"
                                           placeholder="ej. Cuentos, Novelas, etc." aria-label="Full Name"
                                           type="text">
                                </div>
                                <div class="input-group input-group-static mb-4">
                                    <label>Autor</label>
                                    <input value="" readonly="readonly" name="author_name" id="author_name"
                                           placeholder="Seleccione un autor" class="form-control"/>
                                    <input name="author_id" id="author_id" value="" hidden>

                                    <ul name="selectAuthor" id="selectAuthor"
                                        style="width:-webkit-fill-available; position: absolute"
                                        class="mt-6 card selectauthor dropdown-menu"
                                        aria-labelledby="navbarDropdownMenuLink2">

                                        <div class="container mr-1 mt-1 ml-1 mb-1">
                                            <div class="input-group input-group-dynamic">
                                                <span class="input-group-text" id="basic-addon1"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path
      d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></span>
                                                <input id="searchAuthor" name="searchAuthor" type="text"
                                                       class="form-control" placeholder="Buscar autor"
                                                       aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                        <div id="resultsSearch" name="resultSearch">

                                        </div>
                                    </ul>

                                </div>
                            </div>

                            <div class="input-group input-group-static mb-0 mt-md-0 mt-4">
                                <label>Descripcion</label>
                                <textarea name="subcategory_description" class="form-control"
                                          id="subcategory_description" rows="6"
                                          placeholder="Una descripcion breve de la subcategoria"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 text-start">
                                    <a href="{{route('book.index')}}" class="btn bg-gradient-danger mt-3 mb-0"
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
</div>


<script>

    // Cuando haces clic en el input
    document.getElementById('author_name').addEventListener('click', function (event) {
        event.preventDefault(); // Evita el comportamiento predeterminado del select
        var selectAuthor = document.getElementById('selectAuthor');
        selectAuthor.classList.add('show');

        // Agregar un event listener para cerrar la lista si haces clic fuera de ella
    });


    document.addEventListener('click', function (e) {
        if (!selectAuthor.contains(e.target) && e.target.id !== 'author_name') {
            selectAuthor.classList.remove('show');
        }
    });



    // search
    function get_authors(search) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '{{ route('author.searchSelect') }}',
            type: 'POST',
            dataType: 'json',
            data: {'search': search},
        })
            .done(function (authors) {
                var resultsList = ""; // Crear una variable para almacenar la lista de resultados
                authors.forEach(function (author) {
                    // Agregar un atributo data con el valor del autor al elemento <a>
                    resultsList += `<li style="cursor: default;"><a class='dropdown-item' data-author-id="${author.id}" data-author-name="${author.author_name}">${author.author_name}</a></li>`;
                });

                // Insertar la lista completa de resultados en #resultsSearch una vez se han procesado todos los autores
                $("#resultsSearch").html(resultsList);

                // Evento de clic en los elementos <a>
                $("#resultsSearch li a").on("click", function() {
                    selectAuthor.classList.remove('show');
                    // Obtener el valor del atributo data-author-id
                    var authorId = $(this).data("author-id");
                    var authorName = $(this).data("author-name");
                    // Asignar el valor al input con ID "author_name"
                    console.log(authorId)
                    $("#author_name").val(authorName);
                    $("#author_id").val(authorId);
                });
            });
    }


    $(document).on('input', '#searchAuthor', function () {
        var valorbusqueda = $('#searchAuthor').val();
        if (valorbusqueda !== "") {
            get_authors(valorbusqueda);
        } else {
            // Si el campo de búsqueda está vacío, podrías limpiar #resultsSearch o manejarlo de otra manera
            $("#resultsSearch").html("");
        }
    });


    document.addEventListener("DOMContentLoaded", function () {
        var categorySelect = document.getElementById("category_id");
        var subcategorySelect = document.getElementById("subcategory_id");

        // Definir opciones de subcategoría para cada categoría con IDs
        var subcategoryOptions = {
            @foreach($categories as $category)
                {{$category->id}}: [
                    @foreach($category->subcategories as $subcategory)
                {
                    id: "{{$subcategory->id}}", name: "{{$subcategory->subcategory_name}}"
                },
                @endforeach
            ],

            @endforeach

        };
        // Agrega más opciones de subcategoría con IDs según tus necesidades


        // Función para actualizar las opciones de subcategoría
        function updateSubcategories() {
            var selectedCategory = categorySelect.value;
            subcategorySelect.innerHTML = ""; // Limpiar las opciones existentes

            if (subcategoryOptions[selectedCategory]) {
                subcategoryOptions[selectedCategory].forEach(subcategory => {
                    var option = document.createElement("option");
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
            }
        }

        // Llamar a la función al cargar la página para cargar las opciones iniciales
        updateSubcategories();

        // Agregar un evento de cambio al primer select (categoría)
        categorySelect.addEventListener("change", updateSubcategories);

    });

</script>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
