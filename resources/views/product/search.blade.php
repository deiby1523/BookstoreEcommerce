<!doctype html>
<html lang="es">
<head>
    <title>Productos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- Fuentes e iconos -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="stylesheet" href="{{asset('icons/icons.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Estilos principales -->
    <link href="{{asset('css/material-kit.css')}}" rel="stylesheet"/>

    <!-- Estilos Card libros -->
    <link rel="stylesheet" href="{{asset('css/product-card.css')}}">

    <style>
        :root {
            --primary-color: #fb8c00;
            --secondary-color: #f59e0b;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --gray-color: #94a3b8;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f7fa;
        }

        /* Barra de filtros */
        .filter-sidebar {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .filter-sidebar:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .filter-header {
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .filter-section {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .filter-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: var(--dark-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }

        .filter-options {
            /*max-height: 200px;*/
            /*overflow-y: auto;*/
        }

        .filter-option {
            border: none;
            background: none;
            display: block;
            color: var(--gray-color);
            transition: all 0.2s;
            /*padding: 0.25rem 0;*/
        }

        .filter-option:hover {
            color: var(--primary-color);
            transform: translateX(2px);
        }


        /* Filtros móvil */
        .mobile-filters {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        @media (max-width: 992px) {
            .filter-sidebar {
                position: fixed;
                top: 0;
                left: -100%;
                width: 80%;
                height: 100vh;
                z-index: 1001;
                overflow-y: auto;
                transition: left 0.3s ease;
            }

            .filter-sidebar.active {
                left: 0;
            }

            .mobile-filters {
                display: block;
            }

            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1000;
                display: none;
            }

            .overlay.active {
                display: block;
            }
        }

        /* Slider de precio */
        .price-slider {
            padding: 1rem 0;
        }

        .slider-values {
            display: flex;
            justify-content: space-between;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-color);
        }

        /* Botones */
        .btn-apply {
            background-color: var(--primary-color);
            color: white;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-apply:hover {
            background-color: #fb8c00;
            color: white;
            transform: translateY(-2px);
        }

        /* Header de resultados */
        .results-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .sort-options {
            display: flex;
            align-items: center;
        }

        .sort-label {
            margin-right: 0.5rem;
            color: var(--gray-color);
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
@include('layouts.navigation_txt_dark')

<section class="py-6">
    <div class="container mt-6">
        <div class="row">
            <!-- Filtros - Sidebar -->
            <div class="col-lg-3 mb-5 mb-lg-0">
                <div class="filter-sidebar">
                    <div class="filter-header">
                        <h5 class="mb-0">Categorías</h5>
                    </div>

                    <!-- Filtro de categorías -->
                    <div class="filter-section">
                        <div class="filter-options">
                            @foreach($productCategories as $category)
                                <div class="mb-3">
                                    <div class="filter-title subcategory-title" data-bs-toggle="collapse"
                                         data-bs-target="#subcategories{{$category->id}}">
                                        <span>{{$category->category_name}}</span>
                                        <i class="material-icons-round">chevron_right</i>
                                    </div>
                                    <div class="collapse" id="subcategories{{$category->id}}">
                                        <form action="{{route('product.search2')}}" method="POST" class="mb-2">
                                            @csrf
                                            <input type="hidden" name="category" value="{{$category->id}}">
                                            {{-- <input type="hidden" name="subcategory" value="{{$subcategory->id}}"> --}}
                                            <button type="submit" class="filter-option w-100 text-start">
                                                {{$category->category_name}}
                                            </button>
                                        </form>
                                        @foreach($category->subcategories as $subcategory)
                                            <form action="{{route('product.search2')}}" method="POST" class="mb-2">
                                                @csrf
                                                <input type="hidden" name="category" value="{{$category->id}}">
                                                <input type="hidden" name="subcategory" value="{{$subcategory->id}}">
                                                <button type="submit" class="filter-option w-100 text-start">
                                                    {{$subcategory->subcategory_name}}
                                                </button>
                                            </form>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Filtro de precio -->
                    <form action="{{route('product.search2')}}" method="POST">
                        @csrf
                        <!-- Categoría seleccionada --->
                        @if(isset($categorySelected))
                            <input type="hidden" name="category" id="category"
                                   value="{{$categorySelected->id}}">
                        @else
                            <input type="hidden" name="category" id="category">
                        @endif

                        <!-- Subcategoría seleccionada -->
                        @if(isset($subcategorySelected))
                            <input type="hidden" name="subcategory" id="subcategory"
                                   value="{{$subcategorySelected->id}}">
                        @else
                            <input type="hidden" name="subcategory" id="subcategory">
                        @endif

                        <div class="filter-section">
                            <div class="filter-title">Precio</div>
                            <div class="price-slider">
                                <div class="slider-values">
                                    <span id="minPrice">Desde: $ {{number_format($filters['min_price'] != null ? $filters['min_price'] : 0,0,',','.')}}</span>
                                    <span id="maxPrice">Hasta: $ {{number_format($filters['max_price'] != null ? $filters['max_price'] : 300000,0,',','.')}}</span>
                                </div>
                                <input type="hidden" name="min_price" id="minPriceR" value="{{$filters['min_price']}}">
                                <input type="hidden" name="max_price" id="maxPriceR" value="{{$filters['max_price']}}">
                                <input type="range" class="form-range mt-3" value="{{$filters['min_price'] != null ? $filters['min_price'] : 0}}"
                                       min="{{$filters['min_price'] != null ? $filters['min_price'] : 0}}" max="{{$filters['max_price'] != null ? $filters['max_price'] : 300000}}" step="5000"
                                       id="priceRange">
                            </div>

                            <div class="row mt-1">
                                <div class="col-6">
                                    <div
                                        class="input-group input-group-sm input-group-outline my-3 {{$filters['min_price'] != null ? 'is-filled' : ''}}">
                                        <label class="form-label">Mínimo</label>
                                        <input type="number" min="0" max="300000" class="form-control"
                                               id="minInput" value="{{$filters['min_price']}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div
                                        class="input-group input-group-sm input-group-outline my-3 {{$filters['max_price'] != null ? 'is-filled' : ''}}">
                                        <label class="form-label">Máximo</label>
                                        <input type="number" max="300000" class="form-control"
                                               id="maxInput" value="{{$filters['max_price']}}">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="filter-section text-center">
                            <button type="submit" class="btn btn-apply w-100">Aplicar filtros</button>
                        </div>
                    
                </div>
            </div>

            <!-- Resultados -->
            <div class="col-lg-9">
                <div class="results-header">
                    @if(isset($subcategorySelected))
                        <h3 class="mb-0">{{$subcategorySelected->subcategory_name}}</h3>
                    @elseif(isset($categorySelected))
                        <h3 class="mb-0">{{$categorySelected->category_name}}</h3>
                    @else
                        <h3 class="mb-0">Todos los productos</h3>
                    @endif

                    <div class="sort-options">
                        <span class="sort-label">Ordenar por:</span>
                        <select class="form-select form-select-sm" style="width: auto;" name="sort" onchange="this.form.submit()">
                            <option value="newest" {{$filters['sort'] == 'newest' ? 'selected' : ''}}>Más recientes</option>
                            <option value="price_asc" {{$filters['sort'] == 'price_asc' ? 'selected' : ''}}>Precio: menor a mayor</option>
                            <option value="price_desc" {{$filters['sort'] == 'price_desc' ? 'selected' : ''}}>Precio: mayor a menor</option>
                        </select>
                    </div>
                </div>

                </form>

                <div class="row">
                    @forelse($products as $product)
                        <div class="col-xl-4 col-lg-3 col-md-6 mb-4 p-0">
                            <div class="book-card">
                                <div class="book-image-container">
                                    <a href="{{route('product.view',$product->id)}}">
                                    <img
                                        src="{{$product->product_image_url != null ? asset($product->product_image_url) : asset('img/bookPlaceholder.webp')}}"
                                        alt="{{$product->product_name}}" class="book-image">
                                    </a>
                                    @if($product->product_discount > 0)
                                        <span class="book-badge">-{{$product->product_discount}}%</span>
                                    @endif
                                </div>
                                <div class="book-content">
                                    <span class="book-category">{{$product->subcategory_name}}</span>
                                    @if(strlen($product->product_name) > 54)
                                        <h7 class="book-title">
                                            <a href="{{route('product.view',$product->id)}}" class="text-decoration-none"
                                               data-bs-toggle='tooltip' data-bs-placement='right'
                                               title='{{$product->product_name}}'>{{$product->product_name}}</a>
                                        </h7>
                                    @else
                                        <h6 class="book-title">
                                            <a href="{{route('product.view',$product->id)}}"
                                               class="text-decoration-none">{{$product->product_name}}</a>
                                        </h6>
                                    @endif

                                    {{-- <p class="book-author">{{$book->author_name}}</p> --}}
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span
                                            class="book-price">${{number_format($product->product_price - (($product->product_price * $product->product_discount) / 100))}}</span>
                                        @if($product->product_discount > 0)
                                            <small
                                                class="text-muted text-decoration-line-through">${{number_format($product->product_price)}}</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                    <form action="{{route('product.search2')}}" method="POST">
                        @csrf
                        <div class="col-12 text-center py-5">
                            <h4>No se encontraron productos</h4>
                            <p class="text-muted">Intenta ajustar tus filtros de búsqueda</p>
                            <button type="submit" class="btn btn-warning mt-3">Limpiar filtros</button>
                        </div>
                    </form>
                    @endforelse
                </div>

                {{--                <!-- Paginación -->--}}
                {{--                @if($books->hasPages())--}}
                {{--                    <div class="d-flex justify-content-center mt-5">--}}
                {{--                        <nav aria-label="Page navigation">--}}
                {{--                            <ul class="pagination">--}}
                {{--                                @if($books->onFirstPage())--}}
                {{--                                    <li class="page-item disabled">--}}
                {{--                                        <span class="page-link">Anterior</span>--}}
                {{--                                    </li>--}}
                {{--                                @else--}}
                {{--                                    <li class="page-item">--}}
                {{--                                        <a class="page-link" href="{{$books->previousPageUrl()}}">Anterior</a>--}}
                {{--                                    </li>--}}
                {{--                                @endif--}}

                {{--                                @foreach($books->getUrlRange(1, $books->lastPage()) as $page => $url)--}}
                {{--                                    <li class="page-item {{$books->currentPage() == $page ? 'active' : ''}}">--}}
                {{--                                        <a class="page-link" href="{{$url}}">{{$page}}</a>--}}
                {{--                                    </li>--}}
                {{--                                @endforeach--}}

                {{--                                @if($books->hasMorePages())--}}
                {{--                                    <li class="page-item">--}}
                {{--                                        <a class="page-link" href="{{$books->nextPageUrl()}}">Siguiente</a>--}}
                {{--                                    </li>--}}
                {{--                                @else--}}
                {{--                                    <li class="page-item disabled">--}}
                {{--                                        <span class="page-link">Siguiente</span>--}}
                {{--                                    </li>--}}
                {{--                                @endif--}}
                {{--                            </ul>--}}
                {{--                        </nav>--}}
                {{--                    </div>--}}
                {{--                @endif--}}
            </div>
        </div>
    </div>
</section>

<!-- Botón para móvil -->
<button class="btn btn-primary btn-rounded mobile-filters" id="mobileFilterBtn">
    <i class="material-icons-round me-2">filter_alt</i> Filtros
</button>

<!-- Overlay para móvil -->
<div class="overlay" id="filterOverlay"></div>

<script src="{{asset('js/core/popper.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/material-kit.min.js')}}"></script>

<script>
    // Manejo de filtros en móvil
    document.getElementById('mobileFilterBtn').addEventListener('click', function () {
        document.querySelector('.filter-sidebar').classList.add('active');
        document.getElementById('filterOverlay').classList.add('active');
    });

    document.getElementById('filterOverlay').addEventListener('click', function () {
        document.querySelector('.filter-sidebar').classList.remove('active');
        this.classList.remove('active');
    });

    // Slider de precio
    const priceRange = document.getElementById('priceRange');
    const minPrice = document.getElementById('minPrice');
    const maxPrice = document.getElementById('maxPrice');
    const minInput = document.getElementById('minInput');
    const maxInput = document.getElementById('maxInput');

    // Inputs reales
    const min_price = document.getElementById('minPriceR');
    const max_price = document.getElementById('maxPriceR');

    // Max price const

    const MAX_PRICE_CONST = 300000;

    const formatter = new Intl.NumberFormat('es-CO', {
        style: 'currency',
        currency: 'COP',
        minimumFractionDigits: 0 // puedes cambiar a 2 si quieres mostrar decimales
    });

    priceRange.addEventListener('input', function () {
        const value = this.value;
        // console.log(value)
        minPrice.textContent = 'Desde: ' + formatter.format(value);
        min_price.value = value;
        maxPrice.textContent = 'Hasta: ' + formatter.format(priceRange.max);
        max_price.value = priceRange.max;
    });

    minInput.addEventListener('input', function () {
        if (parseInt(this.value) > MAX_PRICE_CONST) {
            this.value = MAX_PRICE_CONST;
        }

        if (parseInt(this.value) < 0) {
            this.value = 0;
        }

        if (parseInt(this.value) > parseInt(priceRange.max)) {
            maxPrice.textContent = 'Hasta: ' + formatter.format(this.value);
            max_price.value = this.value;
            priceRange.max = this.value;
            maxInput.value = this.value;
        }
        minPrice.textContent = 'Desde: ' + formatter.format(this.value);
        min_price.value = this.value;
        priceRange.min = this.value;
        priceRange.value = this.value ? this.value : 0;
        // console.log(priceRange.value)
    });

    maxInput.addEventListener('input', function () {
        if (this.value == '') {
            maxPrice.textContent = 'Hasta: ' + formatter.format(MAX_PRICE_CONST);
            max_price.value = this.value;
            priceRange.max = MAX_PRICE_CONST;
            return;
        }

        if (parseInt(this.value) > MAX_PRICE_CONST) {
            this.value = MAX_PRICE_CONST;
        }

        if (parseInt(this.value) < 0) {
            this.value = 0;
        }

        if (parseInt(this.value) < parseInt(priceRange.min)) {
            maxPrice.textContent = 'Hasta: ' + formatter.format(priceRange.min);
            max_price.value = priceRange.min;
            priceRange.max = priceRange.min;
        } else {
            maxPrice.textContent = 'Hasta: ' + formatter.format(this.value);
            max_price.value = this.value;
            priceRange.max = this.value;
        }


    });

    // Animación de iconos en acordeón
    document.querySelectorAll('.filter-title').forEach(title => {
        title.addEventListener('click', function () {
            const icon = this.querySelector('i');
            if (icon) {
                if (icon.textContent === 'expand_more') {
                    icon.textContent = 'chevron_right';
                } else if (icon.textContent === 'expand_less') {
                    icon.textContent = 'expand_more';
                } else if (icon.textContent === 'chevron_right') {
                    icon.textContent = 'expand_more';
                } else if (icon.textContent === 'expand_more') {
                    icon.textContent = 'chevron_right';
                }
            }
        });
    });
</script>
</body>
</html>
