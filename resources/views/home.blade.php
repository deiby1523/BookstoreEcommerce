<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading">


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
    <link href="{{asset('css/material-kit.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
</head>

<body class="loading">

<div class="container flex justify-content-center position-relative overflow-hidden w-10">

    <div id="spin" class='spinner'></div>
</div>
    <div id='load' class="loading">
        <!-- Navbar -->
        @include('layouts.navigation_txt_dark')
        <!-- End Navbar -->


        {{--Carousel--}}

        <div class="row" style="margin-top: 7rem">
            <div class="col-lg-12 mx-auto">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="text-align: -webkit-center;">
                            <img class="desktopBanner w-95 border-radius-lg" src="{{asset('img/picture2.jpg')}}"
                                 alt="First slide">
                            <img class="phoneBanner w-95 border-radius-lg" src="{{asset('img/picture1.jpg')}}"
                                 alt="First slide">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                       data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                       data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
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
        <div class="card card-body shadow-xl mx-3 mx-md-4" style="margin-top: 2rem">

            <section class="py-5">
                <div class="container-fluid">
                    <div class="row flex" style="justify-content: center">
                        <div style="margin-right: 20px"
                             class="col-md-5 d-flex justify-content-center flex-column ml-auto text-lg-start">
                            <h1 class="mb-4">Somos más que una librería</h1>
                            <p class="mb-2" style="font-size: 20px">somos un espacio acogedor donde las historias cobran
                                vida y la pasión por
                                la lectura se fusiona con la excelencia. En cada rincón de nuestro establecimiento,
                                encontrarás
                                tesoros literarios cuidadosamente seleccionados para satisfacer los gustos más
                                exigentes.
                                Nuestra librería es un refugio para los amantes de la lectura, un lugar donde la
                                calidad, la
                                diversidad y la inspiración se entrelazan. <br><br>Lo que nos distingue:<br></p>
                            <ul class="m-lg-2 m-auto" style="font-size: 20px">
                                <li class="mb-2" style="font-size: 20px">Cuidada selección: <p style="font-size: 17px">
                                        Cada
                                        libro en nuestras
                                        estanterías ha pasado por un riguroso proceso de selección, asegurando solo lo
                                        mejor
                                        para nuestros lectores.</p></li>
                                <li class="mb-2" style="font-size: 20px">Asesoramiento personalizado: <p
                                        style="font-size: 17px">¿Necesitas
                                        ayuda para encontrar tu próximo libro favorito? Nuestro equipo amante de la
                                        lectura
                                        está
                                        aquí para ofrecerte recomendaciones personalizadas y guiar tu búsqueda.</p></li>
                            </ul>
                            <div class="col-lg-12 mt-4 mb-4" style="align-self: center;">
                                <img class="phoneBanner min-w-fit border-radius-lg shadow-lg ml-0 w-100"
                                     src="{{asset('img/bg13.jpg')}}" alt="">
                            </div>
                            <p style="font-size: 20px">Únete a nosotros y déjate llevar por la experiencia única que
                                ofrecemos. En
                                nuestra librería, la calidad literaria se combina con la calidez de un entorno pensado
                                para
                                los
                                verdaderos amantes de los libros. ¡Te esperamos para compartir contigo el placer de la
                                lectura!"</p><br>
                        </div>
                        <div class="col-md-3 col-5 my-auto">
                            <img style="margin-left: 4rem"
                                 class="desktopBanner min-w-fit border-radius-lg shadow-lg w-100"
                                 src="{{asset('img/bg13.jpg')}}" alt="">
                        </div>
                    </div>
                    <div class="row flex mx-0" style="justify-content: center">
                        <div class="col-12" style="max-width: 1333px;">
                            <h1 class="mt-4 ">Artículos religiosos</h1>
                            <div class="col-lg-12 mx-auto my-5">
                                <img class="desktopBanner min-w-fit border-radius-2xl shadow-lg ml-0 w-100"
                                     src="{{asset('img/picture4.jpg')}}" alt="">
                                <img class="phoneBanner min-w-fit border-radius-2xl shadow-lg ml-0 w-100"
                                     src="{{asset('img/picture5.jpg')}}" alt="">
                            </div>
                            <p style="font-size: 20px">No solo ofrecemos libros, también disponemos de una amplia gama
                                de
                                productos
                                para enriquecer tu vida espiritual. Desde biblias y crucifijos hasta velas y hermosas
                                imágenes
                                religiosas, ofrecemos artículos que reflejan la diversidad y profundidad de las
                                creencias. </p>
                        </div>
                    </div>
                </div>
            </section>

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

            <section class="pb-6">
                <div class="container">
                    <div class="row justify-content-center mt-7 mb-7">
                        <div class="col-lg-6">
                            <h1 class="text-dark mt-4 mb-0 text-center">Categorías Populares</h1>
                            <p class="text-center" style="font-size: 20px">Selección de las categorías mas populares de
                                este
                                mes, que pueden
                                llamarle la atención.</p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-4 mb-4">

                            <a href="javascript:">
                                <div class="card card-background h-100">
                                    <div class="full-background"
                                         style="background-image: url({{asset('img/category1.jpg')}})"
                                         loading="lazy"></div>

                                    <div class="card-body pt-12">
                                        <h4 class="text-white">Autoayuda y Bienestar</h4>
                                        <p class="text-white">Encuentra inspiración y herramientas prácticas para una
                                            vida
                                            equilibrada y satisfactoria</p>
                                    </div>

                                </div>

                            </a>

                        </div>
                        <div class="col-lg-4 mb-4">

                            <a href="javascript:;">
                                <div class="card card-background">
                                    <div class="full-background"
                                         style="background-image: url('{{asset('img/category2.jpg')}}')"
                                         loading="lazy"></div>
                                    <div class="card-body pt-12">
                                        <h4 class="text-white">Niños y jóvenes</h4>
                                        <p class="text-white">Explora emocionantes aventuras, historias educativas y
                                            libros
                                            creativos que estimulan la imaginación y fomentan el amor por la lectura en
                                            los
                                            más
                                            jóvenes.</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-4 mb-4">

                            <a href="javascript:;">
                                <div class="card card-background">
                                    <div class="full-background"
                                         style="background-image: url('{{asset('img/category3.jpg')}}')"
                                         loading="lazy"></div>
                                    <div class="card-body pt-12">
                                        <h4 class="text-white">Ficción</h4>
                                        <p class="text-white">Sumérgete en mundos imaginarios y emocionantes narrativas.
                                            Descubre historias cautivadoras, personajes inolvidables y tramas que te
                                            transportarán a lugares inexplorados.</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-4 mb-4">

                            <a href="javascript:;">
                                <div class="card card-background">
                                    <div class="full-background"
                                         style="background-image: url('{{asset('img/category4.jpg')}}')"
                                         loading="lazy"></div>
                                    <div class="card-body pt-12">
                                        <h4 class="text-white">Negocios y Economía</h4>
                                        <p class="text-white">Accede a conocimientos clave para el éxito empresarial.
                                            Descubre
                                            estrategias empresariales, consejos de liderazgo y análisis financiero en
                                            libros
                                            que
                                            te guiarán hacia el crecimiento profesional y el logro de tus metas
                                            económicas.</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-lg-4 mb-4">

                            <a href="javascript:;">
                                <div class="card card-background">
                                    <div class="full-background"
                                         style="background-image: url('{{asset('img/category5.jpg')}}')"
                                         loading="lazy"></div>
                                    <div class="card-body pt-12">
                                        <h4 class="text-white">Espiritualidad</h4>
                                        <p class="text-white">Explora la búsqueda interior y encuentra paz. Descubre
                                            libros
                                            que
                                            te guiarán en la espiritualidad, ofreciendo sabiduría, reflexiones y
                                            prácticas
                                            para
                                            nutrir tu alma y encontrar armonía en la vida cotidiana.</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </section>

            <section class="py-5">
                <div class="container w-100">
                    <div class="row">
                        <div class="col-lg-6 mx-auto text-center mb-5">
                            <span class="badge badge-primary mb-2">Esta mes</span>
                            <h1>Categorías Populares</h1>
                            <p style="font-size: 20px">
                                Selección de las categorías mas populares de este mes, que pueden
                                llamarle la atención.
                            </p>
                        </div>
                    </div>
                    <div class="row min-vh-25">
                        <div class="col-md-4 mb-3">
                            <a href="#">
                                <div
                                    style="text-align: center; background-image: url({{asset('img/category1.jpg')}})"
                                    class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                                    <div class="h-100 w-100 d-flex">
                                        <h3 class="m-auto text-white fadeIn2 fadeInBottom">Autoayuda y Bienestar</h3>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="#">
                                <div
                                    style="background-image: url({{asset('img/category2.jpg')}})"
                                    class="w-100 h-100 border-radius-lg bg-cover move-on-hover">
                                    <div class="h-100 w-100 d-flex">
                                        <h3 class="m-auto text-white fadeIn2 fadeInBottom">Niños y Jóvenes</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-5 mb-3">
                            <a href="#">
                                <div
                                    style="background-image: url({{asset('img/category3.jpg')}})"
                                    class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                                    <div class="h-100 w-100 d-flex">
                                        <h3 class="m-auto text-white fadeIn2 fadeInBottom">Ficción</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row min-vh-25 mt-1">
                        <div class="col-md-3 mb-3">
                            <a href="#">
                                <div
                                    style="background-image: url({{asset('img/category4.jpg')}})"
                                    class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                                    <div class="h-100 w-100 d-flex">
                                        <h3 class="m-auto text-white fadeIn2 fadeInBottom">Negocios y Economía</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-5 mb-3">
                            <a href="#">
                                <div
                                    style="background-image: url({{asset('img/category5.jpg')}})"
                                    class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                                    <div class="h-100 w-100 d-flex">
                                        <h3 class="m-auto text-white fadeIn2 fadeInBottom">Espiritualidad</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 mb-3">
                            <a href="#">
                                <div
                                    style="background-image: url({{asset('img/category6.jpg')}})"
                                    class="w-100 h-100 border-radius-lg shadow bg-cover move-on-hover">
                                    <div class="h-100 w-100 d-flex">
                                        <h3 class="m-auto text-white fadeIn2 fadeInBottom">Ver todas las categorías</h3>
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
                        <p class="mb-0 text-center" style="font-size: 20px">Libros recientemente añadidos</p>
                    </div>
                    <div id="latestBooks" class="book-horizontal-slider">
                        <div class="row flex-nowrap" style=" max-width: 210px; position: relative;">
                            @forelse($latestBooks as $book)

                                <div class="card mb-5 mt-2 mx-3 shadow-lg"
                                     style="">
                                    <div class="card-header p-0 position-relative mx-3 mt-3 z-index-2 shadow-xl">
                                        <a class="d-block blur-shadow-image">
                                            <img loading='eager' src="{{asset($book->book_image_url)}}"
                                                 alt="img-blur-shadow"
                                                 class="img-fluid border-radius-lg">
                                        </a>
                                        <div class="colored-shadow"
                                             style="background-image: url('{{asset('img/bg1.jpg')}}');"></div>
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
                                            <div class="col-lg-6" style="min-width: 55%;">

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
                                        <p class="display-4" style="font-size: x-large"> No hay libros para mostrar en
                                            este
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
        {{--</div>--}}
        {{--</footer>--}}
        {{--</div>--}}
    </div>

<script src="{{asset('js/home.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>
