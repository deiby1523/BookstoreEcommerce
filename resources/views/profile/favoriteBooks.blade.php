<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading" xmlns:a="http://www.w3.org/1999/html">

<head>
    <title>Libros favoritos</title>
    <!-- Required meta tags for SEO -->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href={{ asset('icons/icons.css') }}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href="{{ asset('css/material-kit.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/book-card.css') }}">
</head>

<body class="loading">
    @include('layouts.alerts')


    <div class="container flex justify-content-center position-relative overflow-hidden w-10">
        <div id="spin" class='spinner'></div>
    </div>
    <div id='load' class="loading">
        <!-- Navbar -->
        @include('layouts.navigation_txt_dark')
        <!-- End Navbar -->

        <div class="container py-5 mt-6">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header text-white" style="background: #fb8c001c;">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="mb-0">Mis Libros Favoritos</h3>
                                <span class="badge rounded-pill" style="color: #344767">{{ count($favoriteBooks) }}
                                    libros</span>
                            </div>
                        </div>

                        <div class="card-body">
                            @if ($favoriteBooks->isEmpty())
                                <div class="text-center py-5">
                                    <i class="material-icons"
                                        style="font-size: 5rem; color: #e0e0e0;">favorite_border</i>
                                    <h4 class="mt-3">No tienes libros favoritos aún</h4>
                                    <p class="text-muted">Explora nuestra colección y guarda tus libros favoritos</p>
                                    <form action="{{ route('book.search2') }}" method="POST">
                                        @csrf
                                        {{-- <button class="btn btn-warning" type="submit">Ver productos</button>
                                    <a href="/contacto" class="btn btn-outline-secondary">
                                        ¿Necesitas asesoría?
                                    </a> --}}

                                        <button type="submit" class="btn btn-warning btn-lg">
                                            <span class="ct-docs-btn-inner--icon">
                                                <i class="fas fa-download mr-2"></i>
                                            </span>
                                            <span class="ct-docs-navbar-nav-link-inner--text">Explorar libros</span>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="row">
                                    @foreach ($favoriteBooks as $book)
                                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4 p-0">
                                            <div class="book-card">
                                                <div class="book-image-container">
                                                    <a href="{{ route('book.view', $book->id) }}">
                                                        <img src="{{ $book->book_image_url != null ? asset($book->book_image_url) : asset('img/bookPlaceholder.webp') }}"
                                                            alt="{{ $book->book_title }}" class="book-image">
                                                    </a>
                                                    @if ($book->book_discount > 0)
                                                        <span class="book-badge">-{{ $book->book_discount }}%</span>
                                                    @endif
                                                </div>
                                                <div class="book-content">
                                                    <span class="book-category">{{ $book->subcategory->subcategory_name }}</span>
                                                    @if (strlen($book->book_title) > 54)
                                                        <h7 class="book-title">
                                                            <a href="{{ route('book.view', $book->id) }}"
                                                                class="text-decoration-none" data-bs-toggle='tooltip'
                                                                data-bs-placement='right'
                                                                title='{{ $book->book_title }}'>{{ $book->book_title }}</a>
                                                        </h7>
                                                    @else
                                                        <h6 class="book-title">
                                                            <a href="{{ route('book.view', $book->id) }}"
                                                                class="text-decoration-none">{{ $book->book_title }}</a>
                                                        </h6>
                                                    @endif

                                                    <p class="book-author">{{ $book->author->author_name }}</p>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-auto">
                                                        <span
                                                            class="book-price">${{ number_format($book->book_price - ($book->book_price * $book->book_discount) / 100) }}</span>
                                                        @if ($book->book_discount > 0)
                                                            <small
                                                                class="text-muted text-decoration-line-through">${{ number_format($book->book_price) }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TODO: Introducir datos del Footer -->
        @include('layouts.footer')
    </div>

    <!--WARNING: //////////////////////////////////////////////// Be careful when changing the order of the following scripts ////////////////////////////////////////////////-->

    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material-kit.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    {{-- Important --}}
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}" type="text/javascript"></script>

    <script>
        // Validación básica del formulario
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            if (!name || !email || !message) {
                e.preventDefault();
                alert('Por favor complete todos los campos requeridos');
                return false;
            }

            // Validación básica de email
            if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                e.preventDefault();
                alert('Por favor ingrese un correo electrónico válido');
                return false;
            }

            // Aquí podrías añadir una animación de envío
            const btn = document.querySelector('#contactForm button[type="submit"]');
            btn.innerHTML =
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
            btn.disabled = true;
        });
    </script>

</body>

</html>
