<!doctype html>
<html lang="es">


<head>
    <title>Libros</title>
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
@include('layouts.navigation_txt_dark')
<!-- End Navbar -->

<style>
    .card-libro {
        width: 250px; /* Ajusta el ancho según sea necesario */
        height: 550px; /* Ajusta la altura según sea necesario */
        margin: 10px;
    }

    @media only screen and (max-width: 600px) {
        .categories {
            display: none;
        }
    }
</style>

{{--@php--}}
{{--    function convertToISBN($number):string {--}}
{{--         return substr($number, 0, 3) . '-' . substr($number, 3, 1) . '-' . substr($number, 4, 4) . '-' . substr($number, 8, 4) . '-' . substr($number, 12, 1);--}}
{{--     }--}}

{{--     $number = $book->book_isbn;--}}
{{--     $isbn = convertToISBN($number);--}}

{{--@endphp--}}

<section class="pt-3 pt-md-5 pb-md-5 pt-lg-8">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 card shadow-lg mb-lg-0 mb-5 mt-8 mt-md-5 mt-lg-0">
                <div class="card-body p-5 categories">

                    <h4>categorias</h4>
                    <div class="container p-lg-1 mx-3">
                        @foreach($categories as $category)
                            <form action="{{route('book.search2')}}" method="POST">
                                @csrf
                                <input type="hidden" name="category" id="category" value="{{$category->id}}">

                                <button type="submit" class="h6" style="border: none; background: none; padding: 0; text-align: left">
                                    <span>{{$category->category_name}}</span>
                                </button>
                            </form>
                            <ul>
                                @foreach($category->subcategories as $subcategory)
                                    <li>
                                        <form action="{{route('book.search2')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="subcategory" id="subcategory" value="{{$subcategory->id}}">

                                            <button type="submit" class="link-dark text-sm" style="border: none; background: none; padding: 0; text-align: left">
                                                <span>{{$subcategory->subcategory_name}}</span>
                                            </button>
                                        </form>

                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>

                    <h4>Precio</h4>
                    <div class="">
                        <form>
                            <div class="row">

                                <div class="col-6">
                                    <div class="input-group input-group-outline mb-4">
                                        <label class="form-label">Minimo</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="input-group input-group-outline mb-4">
                                        <label class="form-label">Maximo</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="card shadow-lg mb-5">
                    <div class="card-body p-5">

                        @if(isset($subcategorySelected))
                            <h3>{{$subcategorySelected->subcategory_name}}</h3>
                        @endif

                        @if(isset($categorySelected))
                            <h3>{{$categorySelected->category_name}}</h3>
                        @endif

                        <div class="row" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                            @forelse($books as $book)
                            <div class="card mb-5 mt-2 mx-3 shadow-lg card-libro">
                                <div class="card-header p-0 position-relative mx-3 mt-3 z-index-2 shadow-xl">
                                    <a class="d-block blur-shadow-image" href="{{route('book.view',$book->id)}}">
                                        <img loading="eager" src="{{asset($book->book_image_url)}}"
                                             alt="img-blur-shadow" class="img-fluid border-radius-lg">
                                    </a>
                                    <div class="colored-shadow"
                                         style="background-image: url({{asset($book->book_image_url)}});"></div>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0 text-warning text-uppercase font-weight-normal text-sm">{{$book->subcategory_name}}</p>
                                    <h5 class="font-weight-bold mt-3" style="font-size: 16px">
                                        <a class="link-dark" href="{{route('book.view',$book->id)}}">{{$book->book_title}}</a>
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
                                <h2>No se encontraron libros</h2>

                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
