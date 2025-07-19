<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading" xmlns:a="http://www.w3.org/1999/html">

<head>
    <title>Contacto</title>
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
    <style>
        .contact-header {
            background: #fb8c001c;
            color: white;
            border-radius: 12px;
            margin-top: -8rem;
            padding: 3rem 0;
        }
        .contact-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px 0 rgba(0, 0, 0, 0.1);
            border: none;
        }
        .contact-icon {
            font-size: 2.5rem;
            color: #fb8c00;
            margin-bottom: 1rem;
        }
        .map-container {
            height: 100%;
            min-height: 300px;
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
</head>

<body class="loading">

<div class="container flex justify-content-center position-relative overflow-hidden w-10">
    <div id="spin" class='spinner'></div>
</div>
<div id='load' class="loading">
    <!-- Navbar -->
    @include('layouts.navigation_txt_dark')
    <!-- End Navbar -->

    {{-- Main Body --}}
    <div class="container mt-12">
        {{-- Header --}}
        <section class="contact-header shadow-lg text-center mb-5">
            <div class="container">
                <h1 class="display-3 font-weight-bold mb-3 text-dark">Contáctanos</h1>
                <p class="lead text-secondary">Tu opinión es importante para nosotros</p>
            </div>
        </section>

        <div class="row mb-7">
            {{-- Contact Form --}}
            <div class="col-lg-7 mb-5 mb-lg-0">
                <div class="card contact-card h-100">
                    <div class="card-body p-5">
                        <h2 class="font-weight-bold mb-4">Envíanos tus sugerencias</h2>
                        <p class="text-muted mb-5">¿Tienes alguna pregunta, comentario o sugerencia sobre nuestros productos o servicios? Completa el siguiente formulario y nos pondremos en contacto contigo.</p>
                        
                        <form id="contactForm" method="POST" action="{{ route('contact-us.submit') }}">
                            @csrf

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="input-group input-group-static">
                                        <label>Nombre</label>
                                        <input name="name" id="name" class="form-control" type="text" placeholder="Ingresa tu nombre completo" value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="input-group input-group-static">
                                        <label>Correo</label>
                                        <input name="email" id="email" class="form-control" type="email" placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="input-group input-group-static">
                                    <label>Asunto</label>
                                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <div class="input-group input-group-static">
                                    <label>Mensaje</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" value="{{ old('message') }}" required></textarea>
                                </div>
                            </div>
                            
                            <div class="my-5 form-check">
                                <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="{{ old('newsletter') }}">
                                <label class="form-check-label" for="newsletter">Deseo recibir novedades y promociones</label>
                            </div>
                            
                            <button type="submit" class="btn btn-warning float-end">
                                Enviar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            {{-- Contact Info --}}
            <div class="col-lg-5">
                <div class="card contact-card h-100 p-5">
                    <h2 class="font-weight-bold">Información de contacto</h2>
                    <div class="card-body" style="align-content: center;">
                        
                        <div class="mb-5">
                            <div class="d-flex align-items-start mb-4">
                                <i class="material-icons-round contact-icon">place</i>
                                <div class="ms-3">
                                    <h4 class="font-weight-bold mb-1">Visítanos</h4>
                                    <p class="text-muted mb-0">Calle de los Libros, 123</p>
                                    <p class="text-muted">Barrio Literario, Ciudad Libro</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-4">
                                <i class="material-icons-round contact-icon">phone</i>
                                <div class="ms-3">
                                    <h4 class="font-weight-bold mb-1">Llámarnos</h4>
                                    <p class="text-muted mb-0">+34 912 345 678</p>
                                    <p class="text-muted">Lunes a Viernes: 9am - 6pm</p>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-start mb-4">
                                <i class="material-icons-round contact-icon">email</i>
                                <div class="ms-3">
                                    <h4 class="font-weight-bold mb-1">Escríbenos</h4>
                                    <p class="text-muted mb-0">contacto@tulibreria.com</p>
                                    <p class="text-muted">Soporte: soporte@tulibreria.com</p>
                                </div>
                            </div>
                        </div>
                        
                    
                    </div>
                </div>
            </div>
        </div>
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
        btn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
        btn.disabled = true;
    });
</script>

</body>

</html>