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

<body>
<!-- Navbar Transparent -->
@include('layouts.navigation')
<!-- End Navbar -->


<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">
    {{--    <span class="mask bg-gradient-dark opacity-6"></span>--}}
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="container">
        <div class="section text-left my-4">
            <a href="{{ route('subcategory.index') }}" class="text-warning text-sm icon-move-left">
                < volver
            </a>

            <h2 class="title">Ver subcategoria</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">


                        <div class="card-body pb-2">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col">
                                        <h2 style="width: fit-content"> {{$category->category_name}} > <span style="font-weight: 300;">{{$subcategory->subcategory_name}} </span></h2>
                                    </div>

                                </div>
                                <p>{{$subcategory->subcategory_description}}</p>
                            </div>
                            <br>
                            <div class="row">
{{--                                <div class="col-lg-12">--}}
{{--                                    <p class="display-4" style="font-size: x-large"> Esta subcategoria esta asociada la categoria {{$category->category_name}}</p>--}}
{{--                                </div>--}}
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-start">
                                    <a href="{{route('subcategory.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Volver
                                    </a>
                                </div>

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
