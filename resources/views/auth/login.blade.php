<html lang="es">
<head>
    <!-- TODO: Revisar lo de registro de usuarios -->
    <title>Iniciar Sesion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{asset('css/material-kit.css')}} rel="stylesheet"/>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3">
    <div class="container">
        <a class="navbar-brand  text-dark " href="{{ route('home') }}" rel="tooltip"
           title="Designed and Coded by Yulieth." data-placement="bottom">
            <img src="{{asset('img/logos/Home_Logo.png')}}" alt="Logo" style="max-width: 200px" class="navbar-brand-img">
        </a>

    </div>
</nav>
<!-- End Navbar -->

<div class="page-header align-items-start min-vh-100 mb-2" style="background-color: #f9f9f9;" loading="lazy">
    {{--    <span class="mask bg-gradient-dark opacity-6"></span>--}}
    <br><br>
    <div class="container my-auto mx-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom shadow-xl">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-warning shadow-warning border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Iniciar sesión</h4>
                            <br><br>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" role="form" class="text-start">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Email</label>
                                <input name="email" type="email" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Contraseña</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-warning w-100 my-1">Iniciar Sesion</button>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('login.google') }}" class="btn bg-outline-warning w-100 my-1">Continuar
                                    con google
                                    <svg style="margin-left: 3%; margin-top: -2%" xmlns="http://www.w3.org/2000/svg"
                                         height="24" viewBox="0 0 24 24" width="24">
                                        <path
                                            d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                            fill="#4285F4"/>
                                        <path
                                            d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                            fill="#34A853"/>
                                        <path
                                            d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                            fill="#FBBC05"/>
                                        <path
                                            d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                            fill="#EA4335"/>
                                        <path d="M1 1h22v22H1z" fill="none"/>
                                    </svg>
                                </a>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                ¿No tienes una cuenta? <a href="{{route('register')}}" class="text-warning">Crea una</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer_small')
</div>

<!--   Core JS Files   -->
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->

<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>

</html>
