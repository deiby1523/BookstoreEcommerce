<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading" xmlns:a="http://www.w3.org/1999/html">


<head>
    <title>Inicio</title>
    <!-- Required meta tags for SEO -->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf_token" content="{{ csrf_token() }}"/>

    <!--     Fonts and icons   -->
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

    <div class="row mt-9">
        <div class="col-lg-12 mx-auto" style="width: 95% !important;">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @php $i = 0; @endphp
                    @foreach($banners as $banner)
                        @if($banner->active)
                            <li data-target="#carouselExample" data-bs-slide-to="{{$i++}}" class="active d"></li>
                        @endif
                    @endforeach
                    {{--                    <li data-target="#carouselExample" data-bs-slide-to="0" class="active d"></li>--}}
                    {{--                    <li data-target="#carouselExample" data-bs-slide-to="1" class="active d"></li>--}}
                    {{--                    <li data-target="#carouselExample" data-bs-slide-to="2" class="active d"></li>--}}
                    {{--                    <li data-target="#carouselExample" data-bs-slide-to="3" class="active d"></li>--}}
                    {{--                    <li data-target="#carouselExample" data-bs-slide-to="4" class="active d"></li>--}}
                    {{--                    <li data-target="#carouselExample" data-bs-slide-to="5" class="active d"></li>--}}
                </ol>
                <div class="carousel-inner" style="border-radius: 10px">
                    @php $j = 0; @endphp
                    @foreach($banners as $banner)
                        @if($banner->active)
                            @if($j==0)
                                <div class="carousel-item active" style="text-align: -webkit-center;">
                                    <img class="desktopBanner w-100" src="{{asset($banner->banner_image_url)}}"
                                         alt="{{$j++}} slide">
                                    <img class="phoneBanner w-100" src="{{asset($banner->banner_image_url)}}"
                                         alt="{{$j++}} slide" style="height: 400px ">
                                </div>
                            @else
                                <div class="carousel-item" style="text-align: -webkit-center;">
                                    <img class="desktopBanner w-100" src="{{asset($banner->banner_image_url)}}"
                                         alt="{{$j++}} slide">
                                    <img class="phoneBanner w-100" src="{{asset($banner->banner_image_url)}}"
                                         alt="{{$j++}} slide" style="height: 400px">
                                </div>
                            @endif
                        @endif
                    @endforeach

                </div>
                <a class="carousel-control-prev" href="#carouselExample" role="button"
                   data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button"
                   data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    {{--End carousel--}}


    {{-- Main Body --}}

    <div class="card card-body shadow-xl mx-3 mx-md-4" style="margin-top: 2rem">
        <section class="py-2 position-relative">
            <div class="row justify-content-center mt-2 mb-7">
                <div class="col-lg-6">
                    <h1 class="text-dark mt-4 mb-0 text-center">Categorías Populares</h1>
                    <p class="text-center" style="font-size: 20px">Selección de las categorías mas populares de
                        este
                        mes, que pueden
                        llamarle la atención.</p>
                </div>
            </div>
            <div id="carousel-categories" class="carousel slide carousel-team">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-5 ms-lg-auto">
                                    <div class="p-3">
                                        <img class="w-100 border-radius-xl h-100 fadeIn2 fadeInBottom"
                                             src="{{asset($categories[0]->category_image_url)}}" alt="" loading="eager">
                                    </div>
                                </div>
                                <div class="col-md-5 me-lg-auto position-relative">
                                    <h4 class="opacity-7 text-uppercase font-weight-bolder text-xxl-start fadeIn4 fadeInBottom">
                                        {{ "1°" }}</h4>
                                    <h1 class="text-dark display-3 font-weight-bolder fadeIn2 fadeInBottom">
                                        {{$categories[0]->category_name}}</h1>
                                    <p class="my-4 lead fadeIn2 fadeInBottom">
                                        {{$categories[0]->category_description}}
                                    </p>
                                    <form action="{{route('book.search2')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="category" id="category"
                                               value="{{$categories[0]->id}}">

                                        <button type="submit" class="btn btn-warning">
                                            <span>Explorar!</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @for($i = 2; $i < 5; $i++)
                        <div class="carousel-item">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-5 ms-lg-auto">
                                        <div class="p-3">
                                            <img class="w-100 border-radius-xl h-100 fadeIn2 fadeInBottom"
                                                 src="{{$categories[$i-1]->category_image_url}}" alt="" loading="eager">
                                        </div>
                                    </div>
                                    <div class="col-md-5 me-lg-auto position-relative">
                                        <h4 class="opacity-7 text-uppercase font-weight-bolder text-xxl-start fadeIn4 fadeInBottom">
                                            {{$i."°"}}</h4>
                                        <h1 class="text-dark display-3 font-weight-bolder fadeIn2 fadeInBottom">
                                            {{$categories[$i-1]->category_name}}</h1>
                                        <p class="my-4 lead fadeIn2 fadeInBottom">
                                            {{$categories[$i-1]->category_description}}
                                        </p>
                                        <form action="{{route('book.search2')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="category" id="category"
                                                   value="{{$categories[$i-1]->id}}">

                                            <button type="submit" class="btn btn-warning">
                                                <span>Explorar!</span>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endfor

                </div>

                <div class="position-relative mt-n6 carouselButtons">
                    <a class="carousel-control-prev text-dark position-absolute bottom-0 end-14 ms-auto"
                       href="#carousel-categories" role="button" data-bs-slide="prev" style="margin-top: -38%;">
                        <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 320 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/>
                        </svg>
                    </a>
                    <a class="carousel-control-next text-dark position-absolute bottom-0 end-12 ms-4"
                       href="#carousel-categories" role="button" data-bs-slide="next" style="margin-top: -38%;">
                        <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 320 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/>
                        </svg>
                        {{-- <span class="sr-only">Next</span>--}}
                    </a>
                </div>
            </div>
            <div class="row" style="margin-top: 7rem">
                @for($i = 0 ; $i < 4; $i++)
                    <div class="col-lg-3 col-6 mb-lg-0 mb-4 text-center">
                        <a href="javascript:;" class="text-lg text-gradient text-warning h3 ps-3 active"
                           data-bs-target="#carousel-categories" data-bs-slide-to="{{$i}}">
                            <span>0{{$i+1}}</span>
                            <span class="ms-2">{{$categories[$i]->category_name}}</span>
                        </a>
                    </div>

                @endfor

            </div>
        </section>


        <div class="my-8">
            <img class="img-custom position-absolute end-0 border-radius-top-start-lg"
                 src="{{asset('img/bg-16.jpg')}}"
                 alt="lakeHouse" loading="lazy">
            <div class="container">
                <div class="row mt-8">
                    <div class="col-lg-8 d-flex justify-content-center flex-column">
                        <div
                            class="card card-body d-flex justify-content-center shadow-lg p-sm-5 blur align-items-center">
                            <h3 style="align-self: start">Somos más que una librería</h3>
                            <p class="p-custom">
                                somos un espacio acogedor donde las historias cobran vida y la pasión por la lectura
                                se fusiona con la excelencia. En cada rincón de nuestro establecimiento, encontrarás
                                tesoros literarios cuidadosamente seleccionados para satisfacer los gustos más
                                exigentes. Nuestra librería es un refugio para los amantes de la lectura, un lugar
                                donde la calidad, la diversidad y la inspiración se entrelazan.
                            </p>
                            <br>
                            <a class="btn btn-warning" href="#">Conoce más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="py-5">
            <div class="container-fluid">


                <div class="row flex mx-0" style="justify-content: center">

                    <div class="col-lg-10">

                        <div class="row" style="align-items: center;">
                            <h1 class="my-4 ">Artículos religiosos</h1>
                            <div class="col-lg-6">
                                <img class="desktopBanner min-w-fit border-radius-2xl shadow-lg ml-0 w-100 mb-4"
                                     src="{{asset('img/picture4.jpg')}}" alt="">
                                <img class="phoneBanner min-w-fit border-radius-2xl shadow-lg ml-0 w-100 mb-4"
                                     src="{{asset('img/picture5.jpg')}}" alt="">
                            </div>
                            <div class="col-lg-6">
                                <p class="p-custom">No solo ofrecemos libros, también disponemos de una amplia
                                    gama
                                    de
                                    productos
                                    para enriquecer tu vida espiritual. Desde biblias y crucifijos hasta velas y
                                    hermosas
                                    imágenes
                                    religiosas, ofrecemos artículos que reflejan la diversidad y profundidad de las
                                    creencias. </p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="container mb-4 text-center">
            <h1>Editoriales disponibles</h1>
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
            <div class="container-fluid">
                <div class="row">
                    <h1 class="mb-2 text-center">Ultimas novedades</h1>
                    <p class="mb-0 text-center" style="font-size: 20px">Libros recientemente añadidos</p>
                </div>
                <div id="latestBooks" class="book-horizontal-slider">
                    <div class="row flex-nowrap rowBooks" style="max-width: 210px; position: relative;">
                        @forelse($latestBooks as $book)
                            <div class="card mb-5 mt-2 mx-3 shadow-lg">
                                <div class="card-header p-0 position-relative mx-3 mt-3 z-index-2 shadow-xl">
                                    <a class="d-block blur-shadow-image" href="{{ route('book.view', $book->id) }}">
                                        <img loading='eager' src="{{asset($book->book_image_url)}}"
                                             alt="img-blur-shadow"
                                             class="img-fluid border-radius-lg">
                                    </a>
                                    <div class="colored-shadow"
                                         style="background-image: url('{{asset('img/bg1.jpg')}}');"></div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0 text-warning text-uppercase font-weight-normal text-sm">
                                        {{$book->subcategory_name}}</p>
                                    <h5 class="font-weight-bold mt-3">
                                        <a class="link-dark"
                                           href="{{ route('book.view', $book->id) }}">{{$book->book_title}}</a>
                                    </h5>
                                    <p class="mb-0 text-left">
                                        {{$book->author_name}}
                                    </p>
                                </div>
                                <div class="card-footer d-flex pt-0" style="padding-right: 0">
                                    <div class="row w-100">
                                        <div class="col">
                                            <p class="font-weight-normal my-auto">
                                                $ {{number_format($book->book_price)}}</p>
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
            </div>
        </section>

        <section class="py-5"> <!-- TODO: Continuar con el desarrollo de destacados -->
            <div class="container-fluid">
                <div class="row">
                    <h1 class="mb-2 text-center">Más vendidos</h1>
                    <p class="mb-0 text-center" style="font-size: 20px">Libros más solicitados por nuestros clientes</p>
                </div>
                <div id="latestBooks" class="book-horizontal-slider">
                    <div class="row flex-nowrap rowBooks" style="max-width: 210px; position: relative;">
                        @forelse($sellingBooks as $book)
                            <div class="card mb-5 mt-2 mx-3 shadow-lg">
                                <div class="card-header p-0 position-relative mx-3 mt-3 z-index-2 shadow-xl">
                                    <a class="d-block blur-shadow-image" href="{{ route('book.view', $book->id) }}">
                                        <img loading='eager' src="{{asset($book->book_image_url)}}"
                                             alt="img-blur-shadow"
                                             class="img-fluid border-radius-lg">
                                    </a>
                                    <div class="colored-shadow"
                                         style="background-image: url('{{asset('img/bg1.jpg')}}');"></div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0 text-warning text-uppercase font-weight-normal text-sm">
                                        {{$book->subcategory_name}}</p>
                                    <h5 class="font-weight-bold mt-3">
                                        <a class="link-dark"
                                           href="{{ route('book.view', $book->id) }}">{{$book->book_title}}</a>
                                    </h5>
                                    <p class="mb-0 text-left">
                                        {{$book->author_name}}
                                    </p>
                                </div>
                                <div class="card-footer d-flex pt-0" style="padding-right: 0">
                                    <div class="row w-100">
                                        <div class="col">
                                            <p class="font-weight-normal my-auto">
                                                $ {{number_format($book->book_price)}}</p>
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
            </div>
        </section>
        <section class="py-5">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-8 text-center mx-auto">
                        <p class="mb-1 text-success text-uppercase font-weight-bold">Our Work</p>
                        <h3>Some of our awesome projects - 1</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 position-relative">
                        <img
                            class="image-left border-radius-lg img-fluid shadow position-relative top-0 end-0 ms-md-5 bg-cover"
                            src="{{asset('img/testimonial-6-2.jpg')}}">

                        <p class="blockquote border border-success rounded w-50 p-3 text-sm text-success float-md-end mx-auto mt-4 me-md-n2">
                            "Over the span of the satellite record, Arctic sea ice has been declining significantly,
                            while sea ice in the Antarctichas increased very
                            slightly"
                            <br>
                            <br>
                            <small>-NOAA</small>
                        </p>

                    </div>
                    <div class="col-md-5">
                        <!-- First image on the right side, above the article -->
                        <img
                            class="image-right border-radius-lg img-fluid shadow ms-md-n4 mb-4 mt-md-8 position-relative bg-cover"
                            src="{{asset('img/content-5.jpg')}}">
                        <div class="px-4">
                            <p class="text-gradient text-success">Design</p>
                            <h3 class="mb-4">Jeff Bezos</h3>
                            <p>
                                For a start, it does not automatically follow that a record amount of ice will melt this
                                summer. More important for determining the size of the annual thaw is the state of the
                                weather as the midnight sun approaches and temperatures rise.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 position-relative">
                        <img
                            class="image-left border-radius-lg img-fluid shadow position-relative top-0 end-0 ms-md-5 bg-cover"
                            src="../../assets/img/examples/content-4.jpg">
                        <p class="blockquote border border-primary rounded w-50 p-3 text-sm text-primary float-md-end mt-4 me-md-n2 mx-auto">
                            "Over the span of the satellite record, Arctic sea ice has been declining significantly,
                            while sea ice in the Antarctichas increased very
                            slightly"
                            <br>
                            <br>
                            <small>-NOAA</small>
                        </p>

                    </div>
                    <div class="col-md-5">
                        <!-- First image on the right side, above the article -->
                        <img
                            class="image-right border-radius-lg img-fluid shadow ms-md-n4 mb-4 mt-md-8 position-relative bg-cover"
                            src="../../assets/img/examples/testimonial-6-3.jpg">
                        <div class="px-4">
                            <p class="text-gradient text-primary">Development</p>
                            <h3 class="mb-4">Mike Alfonso</h3>
                            <p>
                                For a start, it does not automatically follow that a record amount of ice will melt this
                                summer. More important for determining the size of the annual thaw is the state of the
                                weather as the midnight sun approaches and temperatures rise.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END Project section w/ 3 images & quote & text -->


    </div>
    <br><br><br>
</div>

<!--WARNING: //////////////////////////////////////////////// Be careful when changing the order of the following scripts ////////////////////////////////////////////////-->

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
{{--Important--}}
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/home.js')}}" type="text/javascript"></script>

</body>

</html>
