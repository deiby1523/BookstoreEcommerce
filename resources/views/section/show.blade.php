<!doctype html>
<html lang="es">

<head>
    <title>Sección</title>
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

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->

@php
$color = "";
@endphp

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


<div class="page-header" style="background-color: #ff782dbf; height: 500px">
    {{--        <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-white mb-0 mt-lg-auto w-100" href="{{route('section.index')}}"
               class="btn bg-gradient-faded-secondary" style="max-width: 233px; width: -webkit-fill-available;">
                <svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                     fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>
                Volver
            </a>
        </div>
    </div>
    <div class="container">
        <div class="section text-left my-4">

            <h2 class="title">{{$section->section_name}}</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">

                    <div class="col-lg-12 text-center" style="min-width: 50%">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
                             style="background: none;">

                        </div>
                    </div>
                    <div class="card-body pb-2">


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

                                            <p style="max-width: 450px" class="blockquote border border-{{$color}} rounded w-100 p-3 text-sm text-{{$color}} float-md-end mx-auto mt-4 me-md-n2">
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
                                                <p>{{$section->section_text_1}}</p>
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
                                                <img src="{{asset('img/testimonial-6-2.jpg')}}" alt="img-blur-shadow"
                                                     class="img-fluid shadow border-radius-lg" loading="lazy">
                                            </a>
                                        </div>
                                        <div class="card-body px-0">
                                            <h5>
                                                <a href="javascript:;" class="text-dark font-weight-bold">Rover raised
                                                    $65 million</a>
                                            </h5>
                                            <p>
                                                Finding temporary housing for your dog should be as easy as
                                                renting an Airbnb. That’s the idea behind Rover ...
                                            </p>
                                            <a href="javascript:;" class="text-info text-sm icon-move-right">Read More
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
                                        <div class="col-10 mx-auto bg-gradient-dark border-radius-lg">
                                            <div class="row py-5">
                                                <div class="col-xl-4 col-md-6 px-5 position-relative">
                                                    <img
                                                        class="img border-radius-md max-width-300 w-100 position-relative z-index-2 mt-n7"
                                                        src="https://images.unsplash.com/photo-1521668576204-57ae3afee860?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80"
                                                        loading="lazy" alt="card image">
                                                </div>
                                                <div
                                                    class="col-xl-4 col-md-5 z-index-2 position-relative px-md-3 px-5 my-md-auto mt-4">
                                                    <i class="material-symbols-rounded text-white text-5xl">format_quote</i>
                                                    <p class="text-lg text-white">
                                                        Decisions: If you can’t decide, the answer is no.
                                                        If two equally difficult paths, choose the one more
                                                        painful in the short term (pain avoidance is creating
                                                        an illusion of equality). Choose the path that leaves
                                                        you more equanimous in the long term.
                                                    </p>
                                                    <p class="text-white font-weight-bold text-sm">Michael - <span
                                                            class="text-xs font-weight-normal">Writter</span></p>
                                                    <hr class="vertical start-100 ms-n5 d-xl-block d-none">
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-xl-2 col-12 px-xl-0 px-5 my-xl-auto">
                                                    <h3 class="text-white mt-xl-0 mt-5">1,679,700 +</h3>
                                                    <p class="text-sm text-white opacity-8">Developers and Companies
                                                        around the world using our products.</p>
                                                    <a href="javascript:;" class="text-white icon-move-right text-sm">See
                                                        all products
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
                                                 style="background-image: url('https://images.unsplash.com/photo-1507207611509-ec012433ff52?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80')"></div>
                                            <div class="card-body pt-7 text-center">
                                                <p class="text-white text-uppercase">Search and Discover!</p>
                                                <h3 class="text-white up mb-0">The Most Important New Technology</h3>
                                                <p class="text-white opacity-8">We’re constantly trying to express
                                                    ourselves and actualize our dreams. If you have the opportunity to
                                                    play this game of life you need to appreciate every moment.</p>
                                                <button type="button" class="btn btn-white btn-sm mt-3">Get Started
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 me-auto my-auto ms-md-5">
                                    <div class="p-3 info-horizontal d-flex">
                                        <div>
                                            <h5>1. Listen to Social Conversations</h5>
                                            <p>
                                                Gain access to the demographics, psychographics, and location of unique
                                                people who are interested and talk about your brand
                                            </p>
                                        </div>
                                    </div>
                                    <div class="p-3 info-horizontal d-flex">
                                        <div>
                                            <h5>2. Performance Analyze</h5>
                                            <p>
                                                Unify data from Facebook, Instagram, Twitter, LinkedIn, and Youtube to
                                                gain rich insights from easy-to-use reports
                                            </p>
                                        </div>
                                    </div>
                                    <div class="p-3 info-horizontal d-flex">
                                        <div>
                                            <h5>3. Social Conversions</h5>
                                            <p>
                                                Track actions taken on your website that originated from social, and
                                                understand the impact on your bottom line
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
                                                            src="https://images.unsplash.com/photo-1574766699303-ac3a5dffb74e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80"
                                                            alt="img-blur-shadow-blog-2"
                                                            class="img-fluid border-radius-lg" loading="lazy">
                                                    </div>
                                                    <div class="colored-shadow"
                                                         style="background-image: url(&quot;https://images.unsplash.com/photo-1574766699303-ac3a5dffb74e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1950&amp;q=80&quot;);"></div>
                                                </div>
                                            </div>
                                            <div
                                                class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3">
                                                <h6 class="category text-warning mt-3">Coworking</h6>
                                                <h3 class="card-title">
                                                    <a href="javascript:;" class="text-dark">Warner Music Group buys
                                                        concert discovery service Songkick</a>
                                                </h3>
                                                <p class="card-description">
                                                    Warner Music Group announced today it’s acquiring the selected
                                                    assets of the music platform Songkick, including its app for finding
                                                    concerts and the company’s trademark. Songkick has been involved in
                                                    a lawsuit against the major… <a href="javascript:;"
                                                                                    class="text-darker icon-move-right text-sm">Read
                                                        More
                                                        <i class="fas fa-arrow-right text-xs ms-1"></i>
                                                    </a>
                                                </p>
                                                <p class="author">
                                                    by <a href="javascript:;" class="ms-1"><span
                                                            class="font-weight-bold text-warning"> Sarah Perez</span></a>,
                                                    2 days ago
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <br>

                        <div class="row mt-5">
                            <div class="col-md-12 text-start">
                                <a href="{{route('section.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Volver
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">

    </div>
</div>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
