<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading" xmlns:a="http://www.w3.org/1999/html">

<head>
    <title>Nosotros</title>
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
        .about-header {
            /* background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%); */
            background-image: url(https://static.vecteezy.com/system/resources/previews/046/733/250/non_2x/obscured-details-of-the-authors-book-tour-merchandise-photo.jpg);
            background-size: cover;
            color: white;
            border-radius: 12px;
            width: 97%;
            height: 20rem;
            background-position: center;
            align-self: anchor-center;
            margin-top: -6rem;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 0, 0, 0.4);
        }
        .mission-icon {
            font-size: 3rem;
            color: #acacac;
        }
        .timeline {
            position: relative;
            padding-left: 50px;
        }
        .timeline:before {
            content: '';
            position: absolute;
            left: 20px;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #6a11cb, #2575fc);
        }
        .timeline-item {
            position: relative;
            margin-bottom: 30px;
        }
        .timeline-item:before {
            content: '';
            position: absolute;
            left: -38px;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #6a11cb;
            border: 4px solid #2575fc;
        }

        .location-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(0, 0, 0, 0.4);
            height: 100%
        }
        .map-container1 {
            height: 50%;
            width: 100%;
        }
        .map-container2 {
            height: 50%;
            width: 100%;
        }
        .hours-table {
            width: 100%;
        }
        .hours-table tr td {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }
        .hours-table tr:last-child td {
            border-bottom: none;
        }
        .btn-explore {
        background: linear-gradient(45deg, #0c6cae, #ba3f44) !important;
        box-shadow: 0 3px 3px 0 rgba(36, 83, 255, 0.15), 
                    0 3px 1px -2px rgba(255, 120, 120, 0.2), 
                    0 1px 5px 0 rgba(133, 141, 255, 0.15) !important;
        transition: all 300ms ease-in-out !important;
        background-size: 200% 200% !important;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-explore::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(225deg, #0c6cae, #ba3f44);
        z-index: -1;
        opacity: 0;
        transition: opacity 300ms ease-in-out;
    }

    .btn-explore:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 10px 0 rgba(36, 83, 255, 0.25), 
                    0 5px 3px -3px rgba(255, 120, 120, 0.3), 
                    0 3px 10px 0 rgba(133, 141, 255, 0.25) !important;
    }

    .btn-explore:hover::before {
        opacity: 1;
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
    <div class="card card-body shadow-xl mx-3 mx-md-4" style="margin-top: 15rem">

        
        <section class="about-header py-5 text-center mb-5">
            {{-- <div class="container">
                <h1 class="display-3 font-weight-bold mb-3">Nuestra Historia</h1>
                <p class="lead">Pasión por los libros desde 1995</p>
            </div> --}}
        </section>

        {{-- Mission Section --}}
        <section class="mb-7">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="mission-icon mb-3">
                            <i class="material-icons-round">auto_stories</i>
                        </div>
                        <h3 class="font-weight-bold">Nuestra Misión</h3>
                        <p class="text-muted">Fomentar la lectura y hacer accesible el conocimiento a través de una cuidadosa selección de títulos para todos los gustos y edades.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="mission-icon mb-3">
                            <i class="material-icons-round">visibility</i>
                        </div>
                        <h3 class="font-weight-bold">Nuestra Visión</h3>
                        <p class="text-muted">Ser el referente cultural de nuestra comunidad, un espacio donde los amantes de los libros encuentren su hogar.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="mission-icon mb-3">
                            <i class="material-icons-round">favorite</i>
                        </div>
                        <h3 class="font-weight-bold">Nuestros Valores</h3>
                        <p class="text-muted">Amor por la literatura, compromiso con la cultura, atención personalizada y pasión por compartir conocimientos.</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Location Section --}}
        <section class="py-5 mb-7">
            <div class="container">
                <h2 class="text-center font-weight-bold mb-5">Nuestra Ubicación</h2>
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="location-card">
                            <!-- Reemplaza esto con tu mapa real (Google Maps, Mapbox, etc.) -->
                            <div class="map-container1">
                                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.0388469843006!2d-73.04164237052025!3d6.990971762148591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6847ab2ecf2d93%3A0x93186d3e3b882ebb!2sCra.%2019B%20%23%208-41%2C%20Piedecuesta%2C%20Santander%2C%20Colombia!5e0!3m2!1sen!2sus!4v1752686977712!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                width="100%"  --}}

                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d990.0388469843006!2d-73.04164237052025!3d6.990971762148591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6847ab2ecf2d93%3A0x93186d3e3b882ebb!2sCra.%2019B%20%23%208-41%2C%20Piedecuesta%2C%20Santander%2C%20Colombia!5e0!3m2!1sen!2sus!4v1752686977712!5m2!1sen!2sus" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy">
                            </iframe>
                        </div>
                        <div class="map-container2 bg-gray-200 d-flex align-items-center justify-content-center">
                            <div class="text-center p-4 mt-3">
                                {{-- <i class="material-icons-round text-primary" style="font-size: 4rem;">place</i> --}}
                                <h4>Calle de los Libros, 123</h4>
                                <p>Barrio Literario, Ciudad Libro</p>
                                <p>C.P. 28012</p>
                                {{-- <a href="https://maps.google.com" target="_blank" class="btn btn-warning">
                                    <i class="material-icons-round mr-2">directions</i> Cómo llegar
                                </a> --}}
                                <a class="btn btn-lg bg-gradient-warning me-1 mt-4 mt-md-0 mb-4" target="_blank" href="https://maps.app.goo.gl/xKVKA88yUdbpVJ2d6">¿Cómo llegar?</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="font-weight-bold mb-4">Horario de atención</h3>
                                <table class="hours-table">
                                    <tr>
                                        <td><strong>Lunes a Viernes</strong></td>
                                        <td class="text-right">9:00 AM - 8:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sábados</strong></td>
                                        <td class="text-right">10:00 AM - 9:00 PM</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Domingos</strong></td>
                                        <td class="text-right">11:00 AM - 6:00 PM</td>
                                    </tr>
                                </table>
                                
                                <div class="mt-5">
                                    <h4 class="font-weight-bold mb-3">Contacto</h4>
                                    <p style="font-size: 20px"><i class="material-icons-round mr-2">phone</i> +57 300 354 3513</p>
                                    <p style="font-size: 20px"><i class="material-icons-round mr-2">email</i> contacto@libreriavida.com</p>
                                    {{-- <p><i class="material-icons-round mr-2">wifi</i> WiFi gratuito para clientes</p> --}}
                                    {{-- <p><i class="material-icons-round mr-2">local_cafe</i> Cafetería literaria disponible</p> --}}
                                </div>
                                
                                <div class="mt-4">
                                    <h4 class="font-weight-bold mb-3">Estacionamiento cercano</h4>
                                    <p>Parqueadero 1 - 5 min caminando</p>
                                    <p>Parqueadero 2 - 3 min caminando</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- History Section --}}
        {{-- <section class="py-5 mb-7 bg-gray-100">
            <div class="container">
                <h2 class="text-center font-weight-bold mb-5">Nuestra Historia</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <h4 class="font-weight-bold">1995 - Los Inicios</h4>
                        <p>Fundada por María González en un pequeño local del centro de la ciudad, comenzamos con apenas 200 títulos seleccionados personalmente.</p>
                    </div>
                    <div class="timeline-item">
                        <h4 class="font-weight-bold">2002 - Primera Expansión</h4>
                        <p>Trasladamos la tienda a un espacio más grande para albergar nuestra creciente colección y abrimos nuestra primera cafetería literaria.</p>
                    </div>
                    <div class="timeline-item">
                        <h4 class="font-weight-bold">2010 - Comunidad Literaria</h4>
                        <p>Comenzamos a organizar clubes de lectura y eventos con autores, convirtiéndonos en un punto de encuentro cultural.</p>
                    </div>
                    <div class="timeline-item">
                        <h4 class="font-weight-bold">2020 - Adaptación Digital</h4>
                        <p>Lanzamos nuestra plataforma online manteniendo la esencia de recomendación personalizada que siempre nos ha caracterizado.</p>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- Team Section --}}
        {{-- <section class="py-5 mb-7">
            <div class="container">
                <h2 class="text-center font-weight-bold mb-5">Conoce a Nuestro Equipo</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-4 text-center">
                        <div class="team-member mb-3">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" class="rounded-circle" alt="María González">
                        </div>
                        <h4 class="font-weight-bold mb-1">María González</h4>
                        <p class="text-primary mb-1">Fundadora y Directora</p>
                        <p class="text-muted">"Los libros cambiaron mi vida y quiero compartir esa magia con todos ustedes."</p>
                    </div>
                    <div class="col-md-4 mb-4 text-center">
                        <div class="team-member mb-3">
                            <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" class="rounded-circle" alt="Carlos Mendoza">
                        </div>
                        <h4 class="font-weight-bold mb-1">Carlos Mendoza</h4>
                        <p class="text-primary mb-1">Gerente de Compras</p>
                        <p class="text-muted">"Cada libro que seleccionamos es una promesa de nuevas aventuras para nuestros clientes."</p>
                    </div>
                    <div class="col-md-4 mb-4 text-center">
                        <div class="team-member mb-3">
                            <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" class="rounded-circle" alt="Laura Jiménez">
                        </div>
                        <h4 class="font-weight-bold mb-1">Laura Jiménez</h4>
                        <p class="text-primary mb-1">Coordinadora de Eventos</p>
                        <p class="text-muted">"Nuestros clubes de lectura son como familias que crecen alrededor de historias compartidas."</p>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- Testimonials --}}
        {{-- <section class="py-5 mb-7 bg-gray-100">
            <div class="container">
                <h2 class="text-center font-weight-bold mb-5">Lo que dicen nuestros clientes</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="mb-3 text-warning">
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                </div>
                                <p class="font-italic">"La mejor selección de libros en la ciudad. Siempre encuentran exactamente lo que busco o me recomiendan algo mejor."</p>
                                <p class="font-weight-bold mt-3">- Ana R.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="mb-3 text-warning">
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                </div>
                                <p class="font-italic">"Más que una librería, es un refugio. El personal realmente conoce y ama los libros que venden."</p>
                                <p class="font-weight-bold mt-3">- Javier M.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="mb-3 text-warning">
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star</i>
                                    <i class="material-icons-round">star_half</i>
                                </div>
                                <p class="font-italic">"Los eventos con autores son increíbles. He conocido a mis escritores favoritos gracias a esta librería."</p>
                                <p class="font-weight-bold mt-3">- Sofía L.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- Call to Action --}}
        <section class="py-5 text-center">
            <div class="container">
                <h2 class="font-weight-bold mb-4">¿Listo para tu próxima aventura literaria?</h2>
                <form action="{{route('product.search2')}}" method="POST">
                    @csrf
                    {{-- <button class="btn btn-warning" type="submit">Ver productos</button>
                    <a href="/contacto" class="btn btn-outline-secondary">
                        ¿Necesitas asesoría?
                    </a> --}}
                
                <button type="submit" class="btn btn-warning btn-lg btn-explore">
                    <span class="ct-docs-btn-inner--icon">
                      <i class="fas fa-download mr-2"></i>
                    </span>
                    <span class="ct-docs-navbar-nav-link-inner--text">Explora nuestro catalogo</span>
                  </button>
                </form>
            </div>
        </section>

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
<script src="{{asset('js/loading.js')}}" type="text/javascript"></script>

</body>

</html>