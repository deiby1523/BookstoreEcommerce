<style>

    @media (min-width: 992px) {
        .dropdown-xl {
            width: 75rem;
            z-index: auto;
            left: -400% !important;
        }
    }

    @media (min-width: 1300px) {
        .dropdown-xl {
            width: 75rem;
            z-index: auto;
            left: -300% !important;
        }
    }

    .dropdown-item {
        width: 95% !important;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .selectSearch {
        display: none;
    }

    .show {
        display: block;
    }

    .listbox {
        margin-top: 10px !important;
    }

</style>

<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3  shadow-none w-100 my-3 navbar-dark">
    <div class="container" style="max-width: 100%">
        <a class="navbar-brand text-dark text-8xl" style="margin-right: 0;" href="#">
            <img src="{{asset('img/logos/Logo_Home.jpeg')}}" alt="Logo" style="max-width: 200px"
                 class="navbar-brand-img">
        </a>

        <button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse bg-white navbar-collapse w-100 pt-3 pb-2 py-lg-0 ps-lg-5" id="navigation"
             style="border-radius: 10px; padding-left: 10px !important;">
            <ul class="navbar-nav navbar-nav-hover">
                <li class="nav-item mx-2 ms-lg-6">
                    <a href="{{route('home')}}" class="nav-link ps-2 d-flex cursor-pointer align-items-center">

                        inicio
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a id="dropdownBooks" role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Libros
                        <img src="{{asset('img/down-arrow-dark.svg')}}" alt="down-arrow"
                             class="arrow ms-auto ms-md-2">
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-xl p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownBooks" data-bs-popper="static">
                        <div class="row d-none d-lg-block">
                            <div class="col-12 px-4 py-2">
                                <div class="row">
                                    @for($i = 0; $i < round(count($categories)/2); $i++)
                                    <div class="col-3 position-relative">

                                        @for($j = $i; $j < ($i+2); $j++)
                                        @if(($i+$j) < count($categories))
                                        <div
                                            class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">

                                            {{$categories[$i+$j]->category_name}}


                                        </div>
                                        @forelse($categories[$i+$j]->subcategories as $subcategory)
                                        <form action="{{route('book.search2')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="category" id="category"
                                                   value="{{$categories[$i+$j]->id}}">
                                            <input type="hidden" name="subcategory" id="subcategory"
                                                   value="{{$subcategory->id}}">

                                            <button type="submit" class="dropdown-item border-radius-md">
                                                <span>{{$subcategory->subcategory_name}}</span>
                                            </button>
                                        </form>
                                        @empty
                                        <p>No hay subcategorías para {{$categories[$i+$j]->category_name}}</p>
                                        @endforelse
                                        @endif
                                        @endfor
                                        @if($i != ((count($categories)/2)-1))
                                        <hr class="vertical dark" style="width: 3px; margin-right: 10px">
                                        @endif
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-none">
                            @forelse($categories as $category)
                            <div style="color: #344767"
                                 class="dropdown-header font-weight-bolder d-flex align-items-center px-0">
                                {{$category->category_name}}
                            </div>
                            @forelse($category->subcategories as $subcategory)
                            <a href="#" class="dropdown-item border-radius-md">
                                {{$subcategory->subcategory_name}}
                            </a>
                            @empty
                            <p>No hay subcategorías para {{$category}}</p>
                            @endforelse
                            @empty
                            No hay categorías
                            @endforelse

                        </div>
                    </div>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center">

                        productos
                    </a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center">

                        nosotros
                    </a>
                </li>
                <li class="nav-item mx-4" style="width:500px">


                    <ul name="selectProduct" id="selectProduct"
                        style="width:inherit; position: absolute; margin-top: -12px; margin-left: 5%"
                        class="selectSearch dropdown-menu show" aria-labelledby="navbarDropdownMenuLink2">

                        <div class="container mr-1 mt-1 ml-1 mb-1">
                            <div class="input-group input-group-dynamic is-filled">
                                <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                                      width="16" height="16"
                                                                                      fill="currentColor"
                                                                                      class="bi bi-search"
                                                                                      viewBox="0 0 16 16"><path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg></span>
                                <input id="searchNav" name="searchNav" type="text" class="form-control"
                                       placeholder="Buscar Libro" aria-label="Libro" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div id="searchResults" name="searchResults">

                        </div>
                    </ul>


                    <!--                   Version anterior del buscador-->

                    <!--                    <div class="input-group input-group-dynamic">-->
                    <!---->
                    <!---->
                    <!--                        <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg></span>-->
                    <!---->
                    <!---->
                    <!--                        <input id="searchNav" name="searchNav" type="text" class="form-control" placeholder="Buscar Libro">  TODO: arreglar el diseño del buscador -->
                    <!---->
                    <!--                        <div id="searchResults" name="searchResults">-->
                    <!---->
                    <!--                        </div>-->
                    <!---->
                    <!---->
                    <!--                    </div>-->


                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                @if(Auth::user() !== null)
                <li class="nav-item dropdown dropdown-hover mx-2" style="margin-right: 3.5rem !important;">
                    <a class="nav-link ps-2 d-flex align-items-center user-select-none cursor-default">
                        {{ Auth::user()->name }} <img src="{{asset('img/down-arrow-white.svg')}}" alt="down-arrow"
                                                      class="arrow ms-auto ms-md-2">
                    </a>
                    <div
                        class="dropdown-menu ms-n3 dropdown-menu-animation dropdown p-3 border-radius-lg mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages">
                        <div class="d-none d-lg-block">
                            @if(Auth::user()->role->role_name == 'admin')
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Administrar
                            </h6>
                            <a href="{{ route('dashboard.books') }}" class="dropdown-item border-radius-md">
                                <span>Libros</span>
                            </a>
                            <a href="#" class="dropdown-item border-radius-md">
                                <span>Productos</span>
                            </a>

                            @endif

                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-1">
                                Cuenta
                            </h6>
                            <a href="#" class="dropdown-item border-radius-md">
                                <span>Editar perfil</span>
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @method('POST')
                                @csrf
                                <button type="submit" class="dropdown-item border-radius-md">
                                    <span>Cerrar sesion</span>
                                </button>
                            </form>
                        </div>
                        <div class="d-lg-none">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                Opciones
                            </h6>
                            <a href="#" class="dropdown-item border-radius-md">
                                <span>opcion 1</span>
                            </a>

                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
                                Cuenta
                            </h6>
                            <a href="#" class="dropdown-item border-radius-md">
                                <span>Editar perfil</span>
                            </a>
                            <a href="#" class="dropdown-item border-radius-md">
                                <span>Cerrar sesion</span>
                            </a>
                        </div>
                    </div>

                </li>
                @else
                <li class="nav-item mx-2">
                    <a href="{{route('register')}}" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                        Registrarse
                    </a>
                </li>
                <li class="nav-item ms-lg-auto my-auto ms-3 ms-lg-0 mt-2" style="margin-top: 2px !important">
                    <a class="btn btn-sm  bg-gradient-warning mb-0 me-1 mt-2 mt-md-0"
                       href={{route('login')}}>Iniciar Sesión</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<!-- Script para abrir y cerrar el menú -->

<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        // Selector del botón de la hamburguesa
        var $navbarToggler = $('.navbar-toggler');

        // Selector del menú desplegable
        var $navigation = $('#navigation');

        // Manejador de eventos para el clic en el botón de la hamburguesa
        $navbarToggler.on('click', function () {
            // Alternar la clase 'show' en el menú desplegable
            if ($navigation.classList.contains("show")) {
                $navigation.classList.remove("show");
            } else {
                $navigation.classList.add("show");
            }
        });

        // Manejador de eventos para cerrar el menú cuando se hace clic fuera de él
        $(document).on('click', function (event) {
            if (!$navbarToggler.is(event.target) && !$navigation.is(event.target) && $navigation.has(event.target).length === 0) {
                // Si se hace clic fuera del botón de la hamburguesa y el menú, cierra el menú
                $navigation.removeClass('show');
            }
        });


    });
</script>
<script>
    // products
    // Event click to display the search box
    document.getElementById('searchNav').addEventListener('click', function (event) {
        event.preventDefault(); // Bypasses the default behavior of the select
        var searchResults = document.getElementById('searchResults');
        searchResults.classList.add('show');


    });

    // author
    // 'input' event using the debounce function
    $(document).on('input', '#searchNav', function () {
        var searchValue = $('#searchNav').val();
        if (searchValue !== "" && searchValue!=" ") {
            ProductDelayedRequest(searchValue);
        } else {
            ProductDelayedRequest(searchValue);
            var searchResults = document.getElementById('searchResults');
            $("#searchResults").html("");
            searchResults.classList.remove('show');
        }
    });

    // products
    // Event to close the search box if you click outside of it
    document.addEventListener('click', function (e) {
        console.log(e.target.id)
        if (e.target.id !== 'searchNav') {
            var searchResults = document.getElementById('searchResults');
            $("#searchResults").html("");
            searchResults.classList.remove('show');
        }
    });

    // Author
    // Ajax request according to what's in the search box
    function get_products(search) {
        console.log(search);
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
            url: '{{ route('book.searchNav') }}',
            type: 'POST',
            dataType: 'json',
            data: {'search': search}
        })
            .done(function (books) {
                var resultsList = ""; // Create a variable to store the list of results
                books.forEach(function (book) {
                    // Add a data attribute with the value of the book to the <a> element.
                    resultsList += `<li style="cursor: default;"><a class='dropdown-item'><div class="row"><div class="col-3"> <img style="width: 90%; border-radius: 10px" src="{{asset('${book.book_image_url}')}}" alt=""></div> <div class="col-6" style="white-space: normal; align-content: center; font-size: large"> ${book.book_title}</div></div></a></li>`;
                });

                // Insert the complete list of results in #searchResults after all products have been processed
                $("#searchResults").html(resultsList);

            });
    }

    // TODO: Comprobar si esta funcionando el debounce

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


    // search
    // Wrapped Ajax function with debounce
    const ProductDelayedRequest = debounce(function (search) {
        get_products(search);
    }, 500); // 300ms delay, adjustable based on your needs


</script>

