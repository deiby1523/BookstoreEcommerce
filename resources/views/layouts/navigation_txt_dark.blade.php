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

</style>
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3  shadow-none w-100 my-3 navbar-dark">
    <div class="container" style="max-width: 100%">
        <a class="navbar-brand text-dark text-8xl" style="margin-right: 0;" href="#">
            <img src="{{asset('img/logos/Logo_Home.jpeg')}}" alt="Logo" style="max-width: 200px" class="navbar-brand-img">
        </a>

        <button class="navbar-toggler shadow-none ms-md-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a id="dropdownBooks" role="button" class="nav-link ps-2 d-flex cursor-pointer align-items-center" data-bs-toggle="dropdown" aria-expanded="false">
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
                                                            <input type="hidden" name="category" id="category" value="{{$categories[$i+$j]->id}}">
                                                            <input type="hidden" name="subcategory" id="subcategory" value="{{$subcategory->id}}">

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
                                <div style="color: #344767" class="dropdown-header font-weight-bolder d-flex align-items-center px-0">
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

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>--}}

{{--<!-- jQuery (opcional pero necesario para algunas funciones de Bootstrap) -->--}}
{{--<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>--}}
{{--<!-- Script para abrir y cerrar el menú -->--}}
{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        // Selector del botón de la hamburguesa--}}
{{--        var $navbarToggler = $('.navbar-toggler');--}}

{{--        // Selector del menú desplegable--}}
{{--        var $navigation = $('#navigation');--}}

{{--        // Manejador de eventos para el clic en el botón de la hamburguesa--}}
{{--        $navbarToggler.on('click', function () {--}}
{{--            // Alternar la clase 'show' en el menú desplegable--}}
{{--            if ($navigation.classList.contains("show")) {--}}
{{--                $navigation.classList.remove("show");--}}
{{--            } else {--}}
{{--            $navigation.classList.add("show");--}}
{{--            }--}}
{{--        });--}}

{{--        // Manejador de eventos para cerrar el menú cuando se hace clic fuera de él--}}
{{--        $(document).on('click', function (event) {--}}
{{--            if (!$navbarToggler.is(event.target) && !$navigation.is(event.target) && $navigation.has(event.target).length === 0) {--}}
{{--                // Si se hace clic fuera del botón de la hamburguesa y el menú, cierra el menú--}}
{{--                $navigation.removeClass('show');--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}

