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

<style>
    .bg-gradient-dark {
        background-image: linear-gradient(270deg, #42424a70 0%, #191919 100%);
    }

    .book-horizontal-slider {
        display:grid;
        grid-template-rows: repeat(auto-fill,minmax(10rem,1fr));
        grid-auto-flow: column;
        overflow-x: auto;
        grid-gap:2rem;
        grid-auto-columns: minmax(24rem,1fr);
        width: -webkit-fill-available;
    }

    .book-horizontal-slider::-webkit-scrollbar {
        height: 8px;    /* Tamaño del scroll en horizontal */
    }

    .book-horizontal-slider::-webkit-scrollbar-thumb {
        background: #ccc;
        border-radius: 4px;
    }

    /* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
    .book-horizontal-slider::-webkit-scrollbar-thumb:hover {
        background: #b3b3b3;
        box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
    }

    /* Cambiamos el fondo cuando esté en active */
    .book-horizontal-slider::-webkit-scrollbar-thumb:active {
        background-color: #999999;
    }

</style>

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation_txt_dark')
<!-- End Navbar -->


{{--Carousel--}}
<div class="row mt-7 w-100 justify-content-center" style="margin-right: 0; margin-left: 0">
    <div class="col-lg-12" style=" max-width: 1600px;">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner mb-4">
                <div class="carousel-item active">
                    <div class="page-header min-vh-50 m-3 border-radius-xl"
                         style="background-image: url('{{asset('img/bg12.jpg')}}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Tu próximo capítulo comienza
                                        aquí.</h4>
                                    <h1 class="text-white fadeIn2 fadeInBottom"> Encuentra tu libro perfecto!</h1>
                                    <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Un abanico de géneros te
                                        espera: Literatura, fantasía, historia, comedia, espiritualidad, ciencia y
                                        mas... .</p>
                                    <a style="z-index: 4" class="btn btn-outline-white" href="#">Ver Libros</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="page-header min-vh-50 m-3 border-radius-xl"
                         style="background-image: url('{{asset('img/bg12.jpg')}}')">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 my-auto">
                                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Tu próximo capítulo comienza
                                        aquí.</h4>
                                    <h1 class="text-white fadeIn2 fadeInBottom"> Encuentra tu libro perfecto!</h1>
                                    <p class="lead text-white opacity-8 fadeIn3 fadeInBottom">Un abanico de géneros te
                                        espera: Literatura, fantasía, historia, comedia, espiritualidad, ciencia y
                                        mas... .</p>
                                    <a style="z-index: 4" class="btn btn-outline-white" href="#">Ver Libros</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="min-vh-75 position-absolute w-100 top-0">
                <a class="carousel-control-prev" href="#mainCarousel" role="button" data-bs-slide="prev"
                   style="width: 0">
                    <span class="visually-hidden carousel-control-prev-icon position-absolute bottom-50"
                          aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#mainCarousel" role="button" data-bs-slide="next">
                    <span class="visually-hidden carousel-control-next-icon position-absolute bottom-50"
                          aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
{{--End carousel--}}

{{--<div class="page-header min-vh-80" style="background-color: #ffffff">--}}
{{--    --}}{{--     <span class="mask bg-gradient-dark opacity-6"></span>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}

{{--            <div class="col-md-8 mx-auto">--}}
{{--                <div class="text-center">--}}
{{--                    <h1 class="text-white"></h1>--}}
{{--                    <h3 class="text-white"></h3>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}

{{--Main Body--}}
<div class="card card-body shadow-xl mx-3 mx-md-4" style="padding: 0; margin-top: -1rem">

    <div class="container mb-4">
        <hr class="horizontal dark my-5">
        <div class="row">
            <div class="col-lg-2 mb-4 col-md-4 col-6 ms-auto">
                <img class="w-100 opacity-4" src="{{asset('img/partner1.png')}}" alt="Logo">
            </div>
            <div class="col-lg-2 mb-4 col-md-4 col-6">
                <img class="w-100 opacity-4" src="{{asset('img/partner2.png')}}" alt="Logo">
            </div>
            <div class="col-lg-2 mb-4 col-md-4 col-6">
                <img class="w-100 opacity-4" src="{{asset('img/partner3.png')}}" alt="Logo">
            </div>
            <div class="col-lg-2 mb-4 col-md-4 col-6">
                <img class="w-100 opacity-4" src="{{asset('img/partner4.png')}}" alt="Logo">
            </div>
            <div class="col-lg-2 mb-4 col-md-4 col-6 me-md-auto mx-md-0 mx-auto">
                <img class="w-100 opacity-4" src="{{asset('img/partner5.png')}}" alt="Logo">
            </div>
        </div>

    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto text-center mb-5">
                    <span class="badge badge-primary mb-2">Esta semana</span>
                    <h2>Categorías Populares</h2>
                    <p>
                        Selección de las categorías mas populares de este mes, que pueden
                        llamarle la atención.
                    </p>
                </div>
            </div>
            <div class="row min-vh-25">
                <div class="col-sm-4 col-5 mb-sm-0 mb-3">
                    <a href="#">
                        <div
                            style="filter: drop-shadow(2px 4px 6px black); background-image: url({{asset('img/category1.jpg')}})"
                            class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                            <div class="container py-7 text-center">
                                <div class="row align-middle">

                                    <h3 class="text-white fadeIn2 fadeInBottom">Autoayuda y Bienestar</h3>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 col-7 mb-sm-0 mb-3">
                    <a href="#">
                        <div
                            style="filter: drop-shadow(2px 4px 6px black);background-image: url({{asset('img/category2.jpg')}})"
                            class="w-100 h-100 border-radius-lg bg-cover move-on-hover">
                            <div class="container py-7 text-center">
                                <div class="row align-middle">

                                    <h3 class="text-white fadeIn2 fadeInBottom">Niños y jóvenes</h3>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-5 mb-sm-0 mb-3">
                    <a href="#">
                        <div
                            style="filter: drop-shadow(2px 4px 6px black); background-image: url({{asset('img/category3.jpg')}})"
                            class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                            <div class="container py-7 text-center">
                                <div class="row align-middle">
                                    <h3 class="text-white fadeIn2 fadeInBottom">Ficción</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row min-vh-25 mt-4">
                <div class="col-sm-3 col-7 mb-sm-0 mb-3">
                    <a href="#">
                        <div
                            style="filter: drop-shadow(2px 4px 6px black); background-image: url({{asset('img/category4.jpg')}})"
                            class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                            <div class="container py-7 px-4 text-center">
                                <div class="row align-middle">
                                    <h3 class="text-white fadeIn2 fadeInBottom">Negocios y Economía</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-5 col-5 mb-sm-0 mb-3">
                    <a href="#">
                        <div
                            style="filter: drop-shadow(2px 4px 6px black); background-image: url({{asset('img/category5.jpg')}})"
                            class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                            <div class="container py-8 px-4 text-center">
                                <div class="row align-middle">
                                    <h3 class="text-white fadeIn2 fadeInBottom">Espiritualidad</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-4 mb-sm-0 mb-3">
                    <a href="#">
                        <div
                            style="filter: drop-shadow(2px 4px 6px black); background-image: url({{asset('img/category6.jpg')}})"
                            class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                            <div class="container py-8 px-4 text-center">
                                <div class="row align-middle">
                                    <h3 class="text-white fadeIn2 fadeInBottom">Ver mas categorías</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <h1 class="mb-2 text-center">Ultimas Novedades</h1>
                <p class="mb-2 text-center">Libros nuevos y actualizados, recientemente añadidos</p>
            </div>
            <div id="latestBooks" class="book-horizontal-slider px-4">
                <div class="row flex-nowrap" style=" max-width: 320px; position: relative;">
                    @forelse($latestBooks as $book)

                        <div class="card mb-5 mt-5 mx-3"
                             style="box-shadow: 0px 17px 20px 7px rgb(0 0 0 / 18%), -3px -3px 4px -1px rgba(0, 0, 0, 0.06);">
                            <div class="card-header p-0 position-relative mx-3 mt-3 z-index-2 shadow-xl">
                                <a class="d-block blur-shadow-image">
                                    <img src="{{asset($book->book_image_url)}}" alt="img-blur-shadow"
                                         class="img-fluid border-radius-lg" loading="lazy">
                                </a>
                                <div class="colored-shadow"
                                     style="background-image: url(&quot;../assets/img/examples/card-product1.jpg&quot;);"></div>
                            </div>
                            <div class="card-body">
                                <p class="mb-0 text-warning text-uppercase font-weight-normal text-sm">{{$book->subcategory_name}}</p>
                                <h5 class="font-weight-bold mt-3">
                                    <a class="link-dark" href="javascript:">{{$book->book_title}}</a>
                                </h5>
                                <p class="mb-0 text-left">
                                    {{$book->author_name}}
                                </p>
                            </div>
                            <div class="card-footer d-flex pt-0" style="padding-right: 0">
                                <div class="row w-100">
                                    <div class="col">
                                        <p class="font-weight-normal my-auto">$1,549</p>
                                    </div>
                                    <div class="col-lg-6">

                                        <i class="material-icons position-relative ms-0 text-warning text-md ml-5 me-1 my-auto"
                                           data-bs-toggle="tooltip" data-bs-placement="top"
                                           data-bs-original-title="Saved to Wishlist">star</i><i
                                            class="material-icons position-relative ms-0 text-warning text-md me-1 my-auto"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Saved to Wishlist">star</i><i
                                            class="material-icons position-relative ms-0 text-warning text-md me-1 my-auto"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Saved to Wishlist">star</i><i
                                            class="material-icons position-relative ms-0 text-warning text-md me-1 my-auto"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Saved to Wishlist">star</i><i
                                            class="material-icons position-relative ms-0 text-warning text-md me-1 my-auto"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="Saved to Wishlist">star</i>


                                    </div>
                                </div>

                            </div>
                        </div>



                    @empty
                        <br>
                        <div class="row">
                            <div class="col">
                                <p class="display-4" style="font-size: x-large"> No hay libros para mostrar en este
                                    momento.</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>

            <div class="row">
                <div class="row mt-4"
                     style="width: 100%;  padding-right: 0;  margin-left: -1%;  margin-right: 0px; justify-content: center">


                </div>

            </div>
        </div>
    </section>
</div>

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
{{--          <div class="text-center">--}}
{{--            <p class="text-dark my-4 text-sm font-weight-normal">--}}
{{--              All rights reserved. Copyright ©--}}
{{--              <script>--}}
{{--                document.write(new Date().getFullYear())--}}
{{--              </script> Material Kit by <a href="#" target="_blank">Creative Tim</a>.--}}
{{--            </p>--}}
{{--          </div>--}}
{{-- </div> --}}
</div>
</div>
</footer>

<script>
    const container = document.getElementById("latestBooks");
    // where "container" is the id of the container
    container.addEventListener("wheel", function (e) {
        if (e.deltaY > 0) {
            container.scrollLeft += 100;
            e.preventDefault();
// prevenDefault() will help avoid worrisome
// inclusion of vertical scroll
        }
        else {
            container.scrollLeft -= 100;
            e.preventDefault();
        }
    });
</script>
<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>

</html>
