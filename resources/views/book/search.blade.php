<!doctype html>
<html lang="es">
<head>
    <title>Libros | Tu Librería Online</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <!-- Fuentes e iconos -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="stylesheet" href="{{asset('icons/icons.css')}}">

    <!-- Estilos -->
    <link href="{{asset('css/material-kit.css')}}" rel="stylesheet"/>
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
            max-height: 200px;
            overflow-y: auto;
        }

        .filter-option {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--gray-color);
            transition: all 0.2s;
            padding: 0.25rem 0;
        }

        .filter-option:hover {
            color: var(--primary-color);
            transform: translateX(2px);
        }

        /* Tarjetas de libros */
        .book-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .book-image-container {
            height: 350px;
            overflow: hidden;
            position: relative;
        }

        .book-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .book-card:hover .book-image {
            transform: scale(1.05);
        }

        .book-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .book-content {
            padding: 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .book-category {
            color: var(--secondary-color);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            letter-spacing: 0.5px;
        }

        .book-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-author {
            color: var(--gray-color);
            font-size: 0.875rem;
            margin-bottom: 1rem;
        }

        .book-price {
            font-weight: 700;
            color: #7b809a;
            font-size: 1.125rem;
            margin-top: auto;
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
                        <h5 class="mb-0">Filtros</h5>
                    </div>

                    <!-- Filtro de categorías -->
                    <div class="filter-section">
                        <div class="filter-title" data-bs-toggle="collapse" data-bs-target="#categoriesCollapse">
                            <span>Categorías</span>
                            <i class="material-icons-round">expand_more</i>
                        </div>
                        <div class="collapse show" id="categoriesCollapse">
                            <div class="filter-options">
                                @foreach($bookCategories as $category)
                                    <div class="mb-3">
                                        <div class="filter-title subcategory-title" data-bs-toggle="collapse" data-bs-target="#subcategories{{$category->id}}">
                                            <span>{{$category->category_name}}</span>
                                            <i class="material-icons-round">chevron_right</i>
                                        </div>
                                        <div class="collapse" id="subcategories{{$category->id}}">
                                            @foreach($category->subcategories as $subcategory)
                                                <form action="{{route('book.search2')}}" method="POST" class="mb-2">
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
                    </div>

                    <!-- Filtro de precio -->
                    <div class="filter-section">
                        <div class="filter-title">Precio</div>
                        <div class="price-slider">
                            <input type="range" class="form-range" min="0" max="300000" step="10000" id="priceRange">
                            <div class="slider-values">
                                <span id="minPrice">$0</span>
                                <span id="maxPrice">$300.000</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Mínimo" id="minInput">
                            </div>
                            <div class="col-6">
                                <input type="number" class="form-control" placeholder="Máximo" id="maxInput">
                            </div>
                        </div>
                    </div>

                    <!-- Filtro de formato -->
                    <div class="filter-section">
                        <div class="filter-title">Formato</div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="formatPaperback">
                            <label class="form-check-label" for="formatPaperback">Tapa blanda</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="formatHardcover">
                            <label class="form-check-label" for="formatHardcover">Tapa dura</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="formatDigital">
                            <label class="form-check-label" for="formatDigital">Digital</label>
                        </div>
                    </div>

                    <!-- Filtro de rating -->
                    <div class="filter-section">
                        <div class="filter-title">Valoración</div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="rating5">
                            <label class="form-check-label" for="rating5">
                                <span class="text-warning">★★★★★</span> (4+)
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="rating4">
                            <label class="form-check-label" for="rating4">
                                <span class="text-warning">★★★★</span>☆ (3+)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rating3">
                            <label class="form-check-label" for="rating3">
                                <span class="text-warning">★★★</span>☆☆ (2+)
                            </label>
                        </div>
                    </div>

                    <div class="filter-section text-center">
                        <button class="btn btn-apply w-100">Aplicar filtros</button>
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
                        <h3 class="mb-0">Todos los libros</h3>
                    @endif

                    <div class="sort-options">
                        <span class="sort-label">Ordenar por:</span>
                        <select class="form-select form-select-sm" style="width: auto;">
                            <option>Relevancia</option>
                            <option>Precio: menor a mayor</option>
                            <option>Precio: mayor a menor</option>
                            <option>Mejor valorados</option>
                            <option>Más recientes</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    @forelse($books as $book)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="book-card">
                                <div class="book-image-container">
                                    <img src="{{$book->book_image_url != null ? asset($book->book_image_url) : asset('img/bookPlaceholder.webp')}}"
                                         alt="{{$book->book_title}}" class="book-image">
{{--                                    @if($book->book_discount > 0)--}}
{{--                                        <span class="book-badge">-{{$book->book_discount}}%</span>--}}
{{--                                    @endif--}}
                                </div>
                                <div class="book-content">
                                    <span class="book-category">{{$book->subcategory_name}}</span>
                                    <h5 class="book-title">
                                        <a href="{{route('book.view',$book->id)}}" class="text-decoration-none">{{$book->book_title}}</a>
                                    </h5>
                                    <p class="book-author">{{$book->author_name}}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <span class="book-price">${{number_format($book->book_price)}}</span>
{{--                                        @if($book->book_discount > 0)--}}
{{--                                            <small class="text-muted text-decoration-line-through">${{number_format(($book->book_price * $book->book_discount) / 100)}}</small>--}}
{{--                                        @endif--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <img src="{{asset('img/no-results.svg')}}" alt="No results" style="max-width: 300px;" class="mb-4">
                            <h4>No se encontraron libros</h4>
                            <p class="text-muted">Intenta ajustar tus filtros de búsqueda</p>
                            <button class="btn btn-primary mt-3">Limpiar filtros</button>
                        </div>
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
    document.getElementById('mobileFilterBtn').addEventListener('click', function() {
        document.querySelector('.filter-sidebar').classList.add('active');
        document.getElementById('filterOverlay').classList.add('active');
    });

    document.getElementById('filterOverlay').addEventListener('click', function() {
        document.querySelector('.filter-sidebar').classList.remove('active');
        this.classList.remove('active');
    });

    // Slider de precio
    const priceRange = document.getElementById('priceRange');
    const minPrice = document.getElementById('minPrice');
    const maxPrice = document.getElementById('maxPrice');
    const minInput = document.getElementById('minInput');
    const maxInput = document.getElementById('maxInput');

    priceRange.addEventListener('input', function() {
        const value = this.value;
        minPrice.textContent = `$${value}`;
    });

    minInput.addEventListener('input', function() {
        if (parseInt(this.value) > parseInt(maxInput.value)) {
            this.value = maxInput.value;
        }
        priceRange.min = this.value || 0;
    });

    maxInput.addEventListener('input', function() {
        if (parseInt(this.value) < parseInt(minInput.value)) {
            this.value = minInput.value;
        }
        priceRange.max = this.value || 300000;
    });

    // Animación de iconos en acordeón
    document.querySelectorAll('.filter-title').forEach(title => {
        title.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon) {
                if (icon.textContent === 'expand_more') {
                    icon.textContent = 'expand_less';
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
