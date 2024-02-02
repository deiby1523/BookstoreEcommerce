<!doctype html>
<html lang="es">


<head>
    <title>{{$book->book_name}}</title>
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
    function convertToISBN($number):string {
         return substr($number, 0, 3) . '-' . substr($number, 3, 1) . '-' . substr($number, 4, 4) . '-' . substr($number, 8, 4) . '-' . substr($number, 12, 1);
     }

     $number = $book->book_isbn;
     $isbn = convertToISBN($number);

@endphp


<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">
    <span class="mask bg-gradient-dark opacity-6"></span>
</div>
<div style="" class="card card-body shadow-xl mt-n12 mx-3 mx-md-4">
    <div class="container">
        <div class="section text-left my-4">
            <a href="{{ route('book.index') }}" class="text-warning text-sm icon-move-left">
                < volver
            </a>

            <h2 class="title">Ver Libro</h2>

            <div class="card">

                <div class="card d-flex justify-content-center p-4 shadow-lg">

                    <div class="col-lg-12 text-center" style="min-width: 50%">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"
                             style="background: none;">

                        </div>
                    </div>
                    <div class="card-body pb-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1>{{$book->book_title}}</h1>
                                <div class="display-4 text-md">Subido el {{$book->created_at}} y última vez
                                    actualizado el {{$book->updated_at}}</div>
                                <br>


                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>ISBN: </h4>
                                    </div>
                                    <div class="col">
                                        <p style="font-size: large">{{$isbn}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Categoria: </h4>
                                    </div>
                                    <div class="col">
                                        <p style="font-size: large">{{$book->subcategory->category->category_name}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Subcategoria: </h4>
                                    </div>
                                    <div class="col">
                                        <p style="font-size: large">{{$book->subcategory->subcategory_name}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Autor: </h4>
                                    </div>
                                    <div class="col" style="max-width: max-content;">
                                        <p style="font-size: large">{{$book->author->author_name}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Editorial: </h4>
                                    </div>
                                    <div class="col" style="max-width: max-content;">
                                        <p style="font-size: large">{{$book->publisher->publisher_name}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Fecha de publicacion: </h4>
                                    </div>
                                    <div class="col" style="max-width: max-content;">
                                        <p style="font-size: large">{{$book->book_publication_date}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Numero de paginas: </h4>
                                    </div>
                                    <div class="col" style="max-width: max-content;">
                                        <p style="font-size: large">{{$book->book_number_pages}}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Precio: </h4>
                                    </div>
                                    <div class="col" style="max-width: max-content;">
                                        <p style="font-size: large">$ {{number_format($book->book_price)}}</p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Descuento: </h4>
                                    </div>
                                    <div class="col" style="max-width: max-content;">
                                        <p style="font-size: large">{{$book->book_discount}} %</p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col" style="max-width: max-content; padding-right: 0">
                                        <h4>Unidades en inventario: </h4>
                                    </div>
                                    <div class="col" style="max-width: max-content;">
                                        <p style="font-size: large">{{$book->book_stock}}</p>
                                    </div>
                                </div>
                                <br>


                            </div>
                            <div class="col-lg-6 text-center">
                                <img id="category_img" class="border-radius-lg w-65 shadow-lg"
                                     src="{{asset($book->book_image_url)}}" alt="Imagen del libro">
                            </div>
                        </div>
                        <div class="row">
                            <h4> Descripcion: </h4>


                            <p>{{$book->book_description}}</p>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-md-12 text-start">
                                <a href="{{route('book.index')}}" class="btn bg-gradient-danger mt-3 mb-0">Volver
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
