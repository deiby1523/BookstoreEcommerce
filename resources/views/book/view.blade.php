<!doctype html>
<html lang="es" xmlns:a="http://www.w3.org/1999/html">

<head>
    <title>{{ $book->book_title }}</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf_token" content="{{csrf_token()}}" />


    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href={{ asset('icons/icons.css') }}>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Material Kit CSS -->
    <link href={{ asset('css/material-kit.css') }} rel="stylesheet" />

    <style>
        .btn-favorite-active {
            background-color: white;
            color: #dc3545;
            border-color: #dc3545;
        }

        .btn-favorite-active .heart-outline {
            display: none;
        }

        .btn-favorite-active .heart-filled {
            display: block !important;
            fill: #dc3545;
        }

        .favorite-icon {
            fill: currentColor;
        }
    </style>
</head>

<body>
    <!-- Navbar Transparent -->
    @include('layouts.navigation_txt_dark')
    <!-- End Navbar -->

    {{-- <div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;"> --}}
    {{--    <span class="mask bg-gradient-dark opacity-6"></span> --}}
    {{-- </div> --}}

    <div class="container-fluid mt-8 px-5">
        <!-- Botón de volver -->
        <div class="container py-4">
            <button onclick="window.history.back()"
                class="btn btn-link text-dark text-decoration-none d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                </svg>
                Volver
            </button>
        </div>

        <!-- Contenido principal -->
        <div class="container py-4">
            <div class="row g-5">
                <!-- Columna de la imagen -->
                <div class="col-lg-5">
                    <div class="position-relative">
                        <!-- Imagen del libro -->
                        <img src="{{ $book->book_image_url ? asset($book->book_image_url) : asset('img/bookPlaceholder.webp') }}"
                            class="img-fluid rounded-3 shadow-lg w-100" alt="{{ $book->book_title }}"
                            style="object-fit: contain;">

                        <!-- Badge de descuento -->
                        @if ($book->book_discount > 0)
                            <div class="position-absolute top-0 end-0 text-white px-3 py-2 rounded shadow m-3 text-bold"
                                style="background-color: rgba(255, 0, 0, 0.5);">
                                -{{ $book->book_discount }}% OFF
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Columna de la información -->
                <div class="col-lg-7">
                    <!-- Título y categoría -->
                    <h1 class="display-5 fw-bold mb-2">{{ $book->book_title }}</h1>
                    <p class="text-muted mb-4">{{ $book->subcategory->subcategory_name }}</p>

                    <!-- Precio -->
                    <div class="mb-4">
                        @if ($book->book_discount > 0)
                            <span
                                class="text-decoration-line-through text-muted me-2">${{ number_format($book->book_price) }}</span>
                            <span
                                class="text-dark fw-bold fs-3">${{ number_format($book->book_price * (1 - $book->book_discount / 100)) }}</span>
                        @else
                            <span class="fw-bold fs-3">${{ number_format($book->book_price) }}</span>
                        @endif
                    </div>

                    <!-- Metadatos -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-person me-2 text-muted" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                </svg>
                                <div>
                                    <small class="text-muted">Autor</small>
                                    <p class="mb-0">{{ $book->author->author_name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-building me-2 text-muted" viewBox="0 0 16 16">
                                    <path
                                        d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                                    <path
                                        d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                                </svg>
                                <div>
                                    <small class="text-muted">Editorial</small>
                                    <p class="mb-0">{{ $book->publisher->publisher_name }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-book me-2 text-muted" viewBox="0 0 16 16">
                                    <path
                                        d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                                </svg>
                                <div>
                                    <small class="text-muted">Páginas</small>
                                    <p class="mb-0">{{ $book->book_number_pages }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-file-earmark-text me-2 text-muted"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                                    <path
                                        d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                                </svg>
                                <div>
                                    <small class="text-muted">Formato</small>
                                    <p class="mb-0">
                                        @switch($book->book_format)
                                            @case('paperback')
                                                Tapa blanda
                                            @break

                                            @case('hardcover')
                                                Tapa dura
                                            @break

                                            @default
                                                No especificado
                                        @endswitch
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-5">
                        <h5 class="mb-3">Descripción</h5>
                        <div class="text-muted lh-lg">
                            {{ $book->book_description }}
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="d-flex flex-wrap gap-3">
                        <!-- Botón de WhatsApp -->
                        <a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=Estoy%20interesado%20en%20el%20libro%20{{ urlencode($book->book_title) }}%20(ISBN:%20{{ $book->book_isbn ?? 'N/A' }})"
                            class="btn btn-warning px-4 py-3 d-flex align-items-center" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                            </svg>
                            Comprar por WhatsApp
                        </a>

                        {{-- <!-- Botón de favoritos -->
                    <button class="btn btn-outline-secondary px-4 py-3 d-flex align-items-center" 
                            id="favoriteBtn"
                            data-book-id="{{ $book->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart me-2" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                        </svg>
                        Guardar en favoritos
                    </button> --}}
                        <button id="favoriteBtn" class="btn btn-outline-secondary px-4 py-3 d-flex align-items-center"
                            data-book-id="{{ $book->id }}"
                            data-initial-state="{{ auth()->user() && auth()->user()->favoriteBooks->contains($book->id) ? 'true' : 'false' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                class="bi me-2 favorite-icon" viewBox="0 0 16 16">
                                <path class="heart-outline"
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                <path class="heart-filled" fill-rule="evenodd"
                                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"
                                    style="display: none;" />
                            </svg>
                            <span class="favorite-text">Guardar en favoritos</span>
                            <span class="spinner-border spinner-border-sm ms-2" style="display: none;"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para manejar favoritos -->
    {{-- <script>
document.getElementById('favoriteBtn').addEventListener('click', function() {
    const bookId = this.getAttribute('data-book-id');
    // Aquí puedes agregar la lógica para manejar favoritos con AJAX
    console.log('Añadir a favoritos el libro ID:', bookId);
    
    // Cambiar el icono y texto temporalmente para feedback
    this.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#dc3545" class="bi bi-heart-fill me-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
        </svg>
        Guardado en favoritos
    `;
    
    // Aquí deberías hacer la llamada AJAX para guardar en favoritos
});
</script> --}}
    <br><br><br><br>

    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('js/material-kit.min.js') }}" type="text/javascript"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const favoriteBtn = document.getElementById('favoriteBtn');
        
            if (!favoriteBtn) return;
        
            // Estado inicial
            const initialState = favoriteBtn.getAttribute('data-initial-state') === 'true';
            if (initialState) {
                favoriteBtn.classList.add('btn-favorite-active');
                favoriteBtn.querySelector('.favorite-text').textContent = 'En favoritos';
                favoriteBtn.querySelector('.heart-outline').style.display = 'none';
                favoriteBtn.querySelector('.heart-filled').style.display = 'block';
            }
        
            // Manejar clic
            favoriteBtn.addEventListener('click', function() {
                if (!{{ auth()->check() ? 'true' : 'false' }}) {
                    window.location.href = "{{ route('login') }}";
                    return;
                }
        
                const bookId = this.getAttribute('data-book-id');
                const isFavorite = this.classList.contains('btn-favorite-active');
                const spinner = this.querySelector('.spinner-border');
                const icon = this.querySelector('.favorite-icon');
                const text = this.querySelector('.favorite-text');
                const button = this; // Guardar referencia al botón
        
                // Mostrar spinner
                spinner.style.display = 'inline-block';
                this.disabled = true;
        
                // Ajax request
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    url: '{{ route("book.set-favorite", ["book" => $book->id]) }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'book': bookId
                    }
                })
                .done(function(response) {  // Cambiado de 'status' a 'response'
                    if (response.status === 'added') {
                        button.classList.add('btn-favorite-active');
                        text.textContent = 'En favoritos';
                        icon.querySelector('.heart-outline').style.display = 'none';
                        icon.querySelector('.heart-filled').style.display = 'block';
                    } else {
                        button.classList.remove('btn-favorite-active');
                        text.textContent = 'Guardar en favoritos';
                        icon.querySelector('.heart-outline').style.display = 'block';
                        icon.querySelector('.heart-filled').style.display = 'none';
                    }
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    console.error("Error al actualizar favorito:", textStatus, errorThrown);
                    alert('Ocurrió un error al actualizar tus favoritos. Por favor intenta nuevamente.');
                })
                .always(function() {
                    spinner.style.display = 'none';
                    button.disabled = false;
                });
            });
        });
        </script>
</body>

</html>
