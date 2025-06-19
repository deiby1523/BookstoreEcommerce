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

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href={{asset('icons/icons.css')}}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href="{{asset('css/material-kit.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/book-card.css')}}">
</head>

@php
    $color = "";
@endphp


<body class="loading">

<div class="container flex justify-content-center position-relative overflow-hidden w-10">

    <div id="spin" class='spinner'></div>
</div>
<div id='load' class="loading">
    <!-- Navbar -->
    @include('layouts.navigation_txt_dark')
    <!-- End Navbar -->

    {{-- Carousel --}}
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
                                         alt="{{$j++}} slide">
                                </div>
                            @else
                                <div class="carousel-item" style="text-align: -webkit-center;">
                                    <img class="desktopBanner w-100" src="{{asset($banner->banner_image_url)}}"
                                         alt="{{$j++}} slide">
                                    <img class="phoneBanner w-100" src="{{asset($banner->banner_image_url)}}"
                                         alt="{{$j++}} slide">
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
    {{-- End carousel --}}

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
                    @for($i = 1; $i < count($bookCategories); $i++)
                        <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-5 ms-lg-auto">
                                        <div class="p-3">
                                            <img class="w-100 border-radius-xl h-100 fadeIn2 fadeInBottom"
                                                 src="{{$bookCategories[$i-1]->category_image_url}}" alt=""
                                                 loading="eager">
                                        </div>
                                    </div>
                                    <div class="col-md-5 me-lg-auto position-relative">
                                        <h4 class="opacity-7 text-uppercase font-weight-bolder text-xxl-start fadeIn4 fadeInBottom">
                                            {{$i."°"}}</h4>
                                        <h1 class="text-dark display-3 font-weight-bolder fadeIn2 fadeInBottom">
                                            {{$bookCategories[$i-1]->category_name}}</h1>
                                        <p class="my-4 lead fadeIn2 fadeInBottom">
                                            {{$bookCategories[$i-1]->category_description}}
                                        </p>
                                        <form action="{{ route('book.search2') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="category" id="category"
                                                   value="{{$bookCategories[$i-1]->id}}">
                                            <input type="hidden" name="subcategory" id="subcategory"
                                                   value="">

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
                @for($i = 0 ; $i < count($bookCategories); $i++)
                    <div class="col-lg-3 col-6 mb-lg-0 mb-4 text-center">
                        <a href="javascript:;" class="text-lg text-gradient text-warning h3 ps-3 active"
                           data-bs-target="#carousel-categories" data-bs-slide-to="{{$i}}">
                            {{--                            <span>0{{$i+1}}</span>--}}
                            {{--                            <span class="ms-2">{{$bookCategories[$i]->category_name}}</span>--}}
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
                            <div class="book-card">
                                <div class="book-image-container">
                                    <img src="{{$book->book_image_url != null ? asset($book->book_image_url) : asset('img/bookPlaceholder.webp')}}"
                                         alt="{{$book->book_title}}" class="book-image">
                                    @if($book->book_discount > 0)
                                        <span class="book-badge">-{{$book->book_discount}}%</span>
                                    @endif
                                </div>
                                <div class="book-content">
                                    <span class="book-category">{{$book->subcategory_name}}</span>
                                    <h5 class="book-title">
                                        <a href="{{route('book.view',$book->id)}}" class="text-decoration-none data-bs-toggle='tooltip' data-bs-placement='top' title='${book.book_title}'">{{$book->book_title}}</a>
                                    </h5>
                                    <p class="book-author">{{$book->author_name}}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="book-price">${{number_format($book->book_price - (($book->book_price * $book->book_discount) / 100))}}</span>
                                        @if($book->book_discount > 0)
                                            <small class="text-muted text-decoration-line-through">${{number_format($book->book_price)}}</small>
                                        @endif
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


        @foreach($featuredBooks as $featured)
            @if($featured->active && (count($featured->books) > 0))
                <section class="py-5">
                    <div class="container-fluid">
                        <div class="row">
                            <h1 class="mb-2 text-center">{{$featured->featured_type_name}}</h1>
                            <p class="mb-0 text-center"
                               style="font-size: 20px">{{$featured->featured_type_description}}</p>
                        </div>
                        <div id="latestBooks" class="book-horizontal-slider">
                            <div class="row flex-nowrap rowBooks" style="max-width: 210px; position: relative;">
                                @foreach($featured->books as $book)
                                    <div class="book-card">
                                        <div class="book-image-container">
                                            <img src="{{$book->book_image_url != null ? asset($book->book_image_url) : asset('img/bookPlaceholder.webp')}}"
                                                 alt="{{$book->book_title}}" class="book-image">
                                            @if($book->book_discount > 0)
                                                <span class="book-badge">-{{$book->book_discount}}%</span>
                                            @endif
                                        </div>
                                        <div class="book-content">
                                            <span class="book-category">{{$book->subcategory->subcategory_name}}</span>
                                            <h5 class="book-title">
                                                <a href="{{route('book.view',$book->id)}}" class="text-decoration-none data-bs-toggle='tooltip' data-bs-placement='top' title='${book.book_title}'">{{$book->book_title}}</a>
                                            </h5>
                                            <p class="book-author">{{$book->author->author_name}}</p>
                                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                                <span class="book-price">${{number_format($book->book_price - (($book->book_price * $book->book_discount) / 100))}}</span>
                                                @if($book->book_discount > 0)
                                                    <small class="text-muted text-decoration-line-through">${{number_format($book->book_price)}}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach


        @foreach($sections as $section)
            @if($section->section_color == 1)
                @php($color = "warning")
            @elseif($section->section_color == 2)
                @php($color = "success")
            @elseif($section->section_color == 3)
                @php($color = "danger")
            @elseif($section->section_color == 4)
                @php($color = "info")
            @elseif($section->section_color == 5)
                @php($color = "primary")
            @elseif($section->section_color == 6)
                @php($color = "secondary")
            @endif
            <section class="py-5">
                @if($section->section_style == 1)
                    <!-- Style 1 -->
                    <div class="row">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col-lg-8 text-center mx-auto">
                                    <p class="mb-1 text-{{$color}} text-uppercase font-weight-bold">{{$section->section_secondary_title}}</p>
                                    <h3>{{$section->section_main_title}}</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 position-relative">
                                    <img
                                        class="image-left border-radius-lg img-fluid shadow position-relative top-0 end-0 ms-md-5 bg-cover"
                                        src="{{asset($section->section_image_1_url)}}">

                                    <p style="max-width: 450px"
                                       class="blockquote border border-{{$color}} rounded w-100 p-3 text-sm text-{{$color}} float-md-end mx-auto mt-4 me-md-n2">
                                        {{$section->section_text_2}}
                                    </p>

                                </div>
                                <div class="col-md-5">
                                    <img
                                        class="image-right border-radius-lg img-fluid shadow ms-md-n4 mb-4 mt-md-8 position-relative bg-cover"
                                        src="{{asset($section->section_image_2_url)}}">
                                    <div class="px-4">
                                        <p class="text-gradient text-{{$color}}">{{$section->section_secondary_sub_title}}</p>
                                        <h3 class="mb-4">{{$section->section_sub_title}}</h3>
                                        <p>{{$section->section_text_1}}
                                            <br><br>
                                            <a class="link-{{$color}}" href="{{$section->section_btn_link}}">Más
                                                info</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($section->section_style == 2)
                    <!-- Style 2 -->
                    <div class="row mt-5" style="justify-content: center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="card card-plain">
                                <div class="card-header p-0 position-relative">
                                    <a class="d-block blur-shadow-image">
                                        <img src="{{asset($section->section_image_1_url)}}" alt="img-blur-shadow"
                                             class="img-fluid shadow border-radius-lg" loading="lazy">
                                    </a>
                                </div>
                                <div class="card-body px-0">
                                    <h5>
                                        <a href="javascript:;"
                                           class="text-dark font-weight-bold">{{$section->section_main_title}}</a>
                                    </h5>
                                    <p>
                                        {{$section->section_text_1}}
                                    </p>
                                    <a href="{{$section->section_btn_link}}"
                                       class="text-{{$color}} text-sm icon-move-right">Más info
                                        <i class="fas fa-arrow-right text-xs ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($section->section_style == 3)
                    <!-- Style 3 -->
                    <div class="mt-5 position-relative">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-10 mx-auto bg-gradient-dark border-radius-lg"
                                     style="box-shadow: #0000005e -9px 20px 29px 0px;">
                                    <div class="row py-5">
                                        <div class="col-xl-4 col-md-6 px-5 position-relative"
                                             style="align-content: center">
                                            <img
                                                class="img border-radius-md max-width-300 w-100 position-relative z-index-2"
                                                src="{{asset($section->section_image_1_url)}}"
                                                loading="lazy" alt="card image">
                                        </div>
                                        <div
                                            class="col-xl-4 col-md-5 z-index-2 position-relative px-md-3 px-5 my-md-auto mt-4">
                                            <i class="material-symbols-rounded text-white text-5xl">{{$section->section_main_title}}</i>
                                            <p class="text-lg text-white">
                                                {{$section->section_text_1}}
                                            </p>

                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-xl-2 col-12 px-xl-0 px-5 my-xl-auto">
                                            <h3 class="text-white mt-xl-0 mt-5">{{$section->section_sub_title}}</h3>
                                            <p class="text-sm text-white opacity-8">{{$section->section_text_2}}</p>
                                            <a href="{{$section->section_btn_link}}"
                                               class="text-white icon-move-right text-sm">Más info
                                                <i class="fas fa-arrow-right text-xs ms-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($section->section_style == 4)
                    <!-- Style 4 -->
                    <div class="row mt-5">
                        <div class="col-md-4 ms-auto my-auto">
                            <div class="cursor-pointer">
                                <div class="card card-background">
                                    <div class="full-background"
                                         style="background-image: url('{{asset($section->section_image_1_url)}}')"></div>
                                    <div class="card-body pt-7 text-center">
                                        <p class="text-white text-uppercase">{{$section->section_secondary_title}}</p>
                                        <h3 class="text-white up mb-0">{{$section->section_main_title}}</h3>
                                        <p class="text-white opacity-8">{{$section->section_text_1}}</p>
                                        <a href="{{$section->section_btn_link}}" class="btn btn-white btn-sm mt-3">Más
                                            info
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 me-auto my-auto ms-md-5">
                            <div class="p-3 info-horizontal d-flex">
                                <div>
                                    <h5>{{$section->section_sub_title}}</h5>
                                    <p>
                                        {{$section->section_text_2}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($section->section_style == 5)
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 justify-content-center d-flex flex-column">
                                        <div class="card">
                                            <div class="d-block blur-shadow-image">
                                                <img
                                                    src="{{asset($section->section_image_1_url)}}"
                                                    alt="img-blur-shadow-blog-2"
                                                    class="img-fluid border-radius-lg" loading="lazy">
                                            </div>
                                            <div class="colored-shadow"
                                                 style="background-image: url({{asset($section->section_image_1_url)}});"></div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3">
                                        <h6 class="category text-{{$color}} mt-3">{{$section->section_secondary_title}}</h6>
                                        <h3 class="card-title">
                                            <a href="javascript:;"
                                               class="text-dark">{{$section->section_main_title}}</a>
                                        </h3>
                                        <p class="card-description">
                                            {{$section->section_text_1}}
                                            <a href="{{$section->section_btn_link}}"
                                               class="text-{{$color}} icon-move-right text-sm">Más info
                                                <i class="fas fa-arrow-right text-xs ms-1"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
        @endforeach


    </div>

    <!-- TODO: Introducir datos del Footer -->
    @include('layouts.footer')

</div>

<!--WARNING: //////////////////////////////////////////////// Be careful when changing the order of the following scripts ////////////////////////////////////////////////-->

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
{{-- Important --}}
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/home.js')}}" type="text/javascript"></script>

</body>

</html>
