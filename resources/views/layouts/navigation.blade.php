<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent">
    <div class="container">
        <a class="navbar-brand  text-white " href="#" rel="tooltip" title="Designed and Coded by Creative Tim"
           data-placement="bottom">
            Ecommerce Example
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                <li class="nav-item mx-2 ms-lg-6">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center">

                        Productos
                    </a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center">

                        Contacto
                    </a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center">

                        Sobre Nosotros
                    </a>
                </li>
                @if(Auth::user() !== null)
                    <li class="nav-item dropdown dropdown-hover mx-2">
                        <a class="nav-link ps-2 d-flex align-items-center user-select-none cursor-default">
                            {{ Auth::user()->name }} <img src="{{asset('img/down-arrow-white.svg')}}" alt="down-arrow" class="arrow ms-auto ms-md-2">
                        </a>
                        <div
                            class="dropdown-menu ms-n3 dropdown-menu-animation dropdown p-3 border-radius-lg mt-0 mt-lg-3"
                            aria-labelledby="dropdownMenuPages">
                            <div class="d-none d-lg-block">
                                @if(Auth::user()->name == "Deiby Prada")
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

                                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1 mt-3">
                                    Cuenta
                                </h6>
                                <a href="#" class="dropdown-item border-radius-md">
                                    <span>Editar perfil</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item border-radius-md"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span>Cerrar sesion</span>
                                    </a>
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
                    <li class="nav-item ms-lg-auto my-auto ms-3 ms-lg-0 mt-2" style="margin-top: 2px !important">
                        <a class="btn btn-sm  bg-gradient-warning mb-0 me-1 mt-2 mt-md-0"
                           href={{route('login')}}>Login</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link ps-2 d-flex cursor-pointer align-items-center">
                            Sign up
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>