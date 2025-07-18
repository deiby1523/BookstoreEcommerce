<style>

    /*    TODO: Mover este CSS a un archivo separado o revisar si se puede dejar */

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

    .selectSearch {
        width: 40%;
    }

    @media (max-width: 767.98px) {
        .selectSearch {
            position: relative;
            width: 60%;
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

    .image-search { /* Desktop */
        width: 60px;
        border-radius: 10px;
    }

    @media (max-width: 767.98px) {
        /* Mobile */
        .image-search {
            width: 40px;
            border-radius: 4px;
        }
    }

</style>

<nav
    class="navbar bg-white navbar-expand-lg position-absolute top-0 z-index-3  shadow-none w-100 mb-3 pt-3 navbar-dark">
    <div class="container" style="max-width: 100%">
        <a class="navbar-brand text-dark text-8xl" style="margin-right: 0;" href="#">
            <img src="{{asset('img/logos/Logo_Home.jpeg')}}" alt="Logo" style="max-width: 200px"
                 class="navbar-brand-img">
        </a>

        <button id="navbar-toggler" class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
            <span id="navbar-toggler" class="navbar-toggler-icon mt-2">
                <span id="navbar-toggler" class="navbar-toggler-bar bar1"></span>
                <span id="navbar-toggler" class="navbar-toggler-bar bar2"></span>
                <span id="navbar-toggler" class="navbar-toggler-bar bar3"></span>
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

                {{-- Libros --}}
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
                                    @for($i = 0; $i < round(count($bookCategories)/2); $i++)
                                        <div class="col-3 position-relative">

                                            @for($j = $i; $j < ($i+2); $j++)
                                                @if(($i+$j) < count($bookCategories))
                                                    <div
                                                        class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">

                                                        {{$bookCategories[$i+$j]->category_name}}


                                                    </div>
                                                    @forelse($bookCategories[$i+$j]->subcategories as $subcategory)
                                                        <form action="{{route('book.search2')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="category" id="category"
                                                                   value="{{$bookCategories[$i+$j]->id}}">
                                                            <input type="hidden" name="subcategory" id="subcategory"
                                                                   value="{{$subcategory->id}}">
                                                            <input type="hidden" name="min_price" id="min_price" value="0">
                                                            <input type="hidden" name="max_price" id="max_price" value="300000">
                                                            <button type="submit"
                                                                    class="dropdown-item border-radius-md">
                                                                <span>{{$subcategory->subcategory_name}}</span>
                                                            </button>
                                                        </form>
                                                    @empty
                                                        <p>No hay subcategorías
                                                            para {{$bookCategories[$i+$j]->category_name}}</p>
                                                    @endforelse
                                                @endif
                                            @endfor
                                            @if($i != ((count($bookCategories)/2)-1))
                                                <hr class="vertical dark" style="width: 3px; margin-right: 10px">
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-none">
                            @forelse($bookCategories as $category)
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

                {{-- Productos --}}
                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a id="dropdownProducts" role="button"
                       class="nav-link ps-2 d-flex cursor-pointer align-items-center"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                        <img src="{{asset('img/down-arrow-dark.svg')}}" alt="down-arrow"
                             class="arrow ms-auto ms-md-2">
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-xl p-3 border-radius-xl mt-0 mt-lg-3"
                        aria-labelledby="dropdownProducts" data-bs-popper="static">
                        <div class="row d-none d-lg-block">
                            <div class="col-12 px-4 py-2">
                                <div class="row">
                                    @for($i = 0; $i < round(count($productCategories)/2); $i++)
                                        <div class="col-3 position-relative">

                                            @for($j = $i; $j < ($i+2); $j++)
                                                @if(($i+$j) < count($productCategories))
                                                    <div
                                                        class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">

                                                        {{$productCategories[$i+$j]->category_name}}


                                                    </div>
                                                    @forelse($productCategories[$i+$j]->subcategories as $subcategory)
                                                        <form action="{{route('product.search2')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="category" id="category"
                                                                value="{{$productCategories[$i+$j]->id}}">
                                                            <input type="hidden" name="subcategory" id="subcategory"
                                                                value="{{$subcategory->id}}">
                                                            <input type="hidden" name="min_price" id="min_price" value="0">
                                                            <input type="hidden" name="max_price" id="max_price" value="300000">
                                                            <button type="submit"
                                                                    class="dropdown-item border-radius-md">
                                                                <span>{{$subcategory->subcategory_name}}</span>
                                                            </button>
                                                        </form>
                                                    @empty
                                                        <p>No hay subcategorías
                                                            para {{$productCategories[$i+$j]->category_name}}</p>
                                                    @endforelse
                                                @endif
                                            @endfor
                                            @if($i != ((count($productCategories)/2)-1))
                                                <hr class="vertical dark" style="width: 3px; margin-right: 10px">
                                            @endif
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-none">
                            @forelse($productCategories as $category)
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
                    <a href="{{route('about-us')}}" class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                        nosotros
                    </a>
                </li>
                <li class="nav-item mx-4" style="width:500px">

                    <!--  Search Bar    -->
                    <ul name="selectProduct" id="selectProduct" style="margin-top: -12px;"
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
                                    <a href="{{ route('book.index') }}" class="dropdown-item border-radius-md">
                                        <span>Libros</span>
                                    </a>
                                    <a href="{{ route('product.index') }}" class="dropdown-item border-radius-md">
                                        <span>Productos</span>
                                    </a>
                                    <a href="{{ route('banner.index') }}" class="dropdown-item border-radius-md">
                                        <span>Interfaz</span>
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


<!--                WARNING: NO USAR ESTE SCRIPT JAMAS EN LA VIDA                                                    -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>-->
<!--    MALDITO SCRIPT DE MRD TE RECORDARE POR EL RESTO DE MI VIDA, ME HICISTE PERDER 4 HORAS VALIOSAS     >:C       -->


<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script>

    // TODO: Pasar esto a un archivo JS por separado

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
        if (searchValue !== "" && searchValue != " ") {
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
        if (e.target.id !== 'searchNav') {
            var searchResults = document.getElementById('searchResults');
            $("#searchResults").html("");
            searchResults.classList.remove('show');
        }
    });

    // Author
    // Ajax request according to what's in the search box
    function get_products(search) {
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
                    resultsList += `<li style="cursor: default;"><a href="/book/view/${book.id}" class='dropdown-item' style='margin: auto;border-radius: 10px;'><div class="row"><div class="col-2" style="align-content: center;"> <img class="image-search" src="{{asset('${book.book_image_url}')}}" alt=""></div> <div class="col-10" style="white-space: normal; align-content: center; font-size: large"> ${book.book_title}</div></div></a></li>`;
                });

                // Insert the complete list of results in #searchResults after all products have been processed
                $("#searchResults").html(resultsList);

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


    // search
    // Wrapped Ajax function with debounce
    const ProductDelayedRequest = debounce(function (search) {
        get_products(search);
    }, 500); // 300ms delay, adjustable based on your needs


</script>

