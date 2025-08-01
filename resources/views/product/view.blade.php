<!doctype html>
<html lang="es">

<head>
    <title>{{$product->product_name}}</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf_token" content="{{csrf_token()}}" />

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




{{--<div class="page-header" style="background-color: #2b2b2b; min-height: 30rem !important;">--}}
{{--    <span class="mask bg-gradient-dark opacity-6"></span>--}}
{{--</div>--}}


<div class="container-fluid mt-8 px-5">
    <!-- Botón de volver -->
    <div class="container py-4">
        <button onclick="window.history.back()" class="btn btn-link text-dark text-decoration-none d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
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
                    <!-- Imagen del producto -->
                    <img src="{{ $product->product_image_url ? asset($product->product_image_url) : asset('img/bookPlaceholder.webp') }}" 
                         class="img-fluid rounded-3 shadow-lg w-100" 
                         alt="{{ $product->product_name }}"
                         style="object-fit: contain;">
                    
                    <!-- Badge de descuento (si aplica) -->
                    @if($product->product_discount > 0)
                    <div class="position-absolute top-0 end-0 text-white px-3 py-2 rounded shadow m-3 fw-bold" style="background-color: rgba(255, 0, 0, 0.75);">
                        -{{ $product->product_discount }}% OFF
                    </div>
                    @endif
                </div>
            </div>

            <!-- Columna de la información -->
            <div class="col-lg-7">
                <!-- Nombre y categoría -->
                <h1 class="display-5 fw-bold mb-2">{{ $product->product_name }}</h1>
                <p class="text-muted mb-4">{{ $product->subcategory->subcategory_name }}</p>
                
                <!-- Precio -->
                <div class="mb-4">
                    @if($product->product_discount > 0)
                        <span class="text-decoration-line-through text-muted me-2">${{ number_format($product->product_price) }}</span>
                        <span class="text-dark fw-bold fs-3">${{ number_format($product->product_price * (1 - $product->product_discount/100)) }}</span>
                    @else
                        <span class="fw-bold fs-3">${{ number_format($product->product_price) }}</span>
                    @endif
                </div>

                <!-- Descripción -->
                <div class="mb-5">
                    <h5 class="mb-3">Descripción</h5>
                    <div class="text-muted lh-lg">
                        {{ $product->product_description }}
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <!-- Botón de WhatsApp -->
                    <a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=Estoy%20interesado%20en%20el%20producto%20{{ urlencode($product->product_name) }}%20-%20Precio:%20${{ number_format($product->product_discount > 0 ? $product->product_price * (1 - $product->product_discount/100) : $product->product_price) }}" 
                       class="btn btn-success px-4 py-3 d-flex align-items-center" 
                       target="_blank" 
                       rel="noopener noreferrer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp me-2" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                        </svg>
                        Comprar por WhatsApp
                    </a>

                    <!-- Botón de favoritos -->
                    <button class="btn btn-outline-secondary px-4 py-3 d-flex align-items-center" 
                            id="favoriteBtn"
                            data-product-id="{{ $product->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart me-2" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                        </svg>
                        Guardar en favoritos
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para manejar favoritos -->
<script>
document.getElementById('favoriteBtn').addEventListener('click', function() {
    const productId = this.getAttribute('data-product-id');
    // Lógica para manejar favoritos con AJAX
    console.log('Añadir a favoritos el producto ID:', productId);
    
    // Feedback visual
    this.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#dc3545" class="bi bi-heart-fill me-2" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
        </svg>
        Guardado en favoritos
    `;
    
    // Aquí deberías hacer la llamada AJAX para guardar en favoritos
});
</script>
<br><br><br><br>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
