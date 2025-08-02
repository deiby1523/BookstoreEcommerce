<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading" xmlns:a="http://www.w3.org/1999/html">

<head>
    <title>Política de Tratamiento de Datos</title>
    <!-- Required meta tags for SEO -->
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <meta name="description" content="Política de tratamiento de datos personales de nuestra librería">

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
    <style>
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
        .privacy-section {
            margin-bottom: 2.5rem;
        }

        .privacy-section h2 {
            color: #7d7d7d;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .privacy-section h3 {
            color: #444;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .privacy-section p,
        .privacy-section li {
            color: #555;
            line-height: 1.8;
            margin-bottom: 1rem;
        }

        .privacy-section ul {
            padding-left: 1.5rem;
        }

        .last-updated {
            font-style: italic;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 1rem;
            margin-top: 2rem;
        }

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
    </style>
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

    {{-- Main Body --}}
    <div class="container mt-12">
        {{-- Header --}}
        <section class="contact-header shadow-lg text-center mb-5">
            <div class="container">
                <h1 class="display-3 font-weight-bold mb-3 text-dark">Política de Tratamiento de Datos</h1>
                <p class="lead text-secondary">Comprometidos con la protección de tus datos personales</p>
            </div>
        </section>

        <div class="row mb-7">
            {{-- Contact Form --}}
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="container py-4">
                    <div class="privacy-section">
                        <h2>1. Información General</h2>
                        <p>En <strong>Librería Vida</strong>, valoramos y respetamos tu privacidad. Esta política
                            explica cómo recopilamos, usamos, compartimos y protegemos la información personal que nos
                            proporcionas al utilizar nuestro sitio web y servicios.</p>
                    </div>
    
                    <div class="privacy-section">
                        <h2>2. Datos que Recopilamos</h2>
                        <p>Para brindarte nuestros servicios de librería online, podemos recopilar:</p>
                        <ul>
                            <li><strong>Datos de registro:</strong> Nombre completo, dirección de correo electrónico,
                                contraseña (encriptada).</li>
                                {{-- <li><strong>Datos de compra:</strong> Dirección de envío, datos de facturación, historial de
                                    pedidos.</li> --}}
                            {{-- <li><strong>Datos de pago:</strong> Información de tarjeta de crédito/débito (procesada de forma
                                segura a través de pasarelas de pago).</li> --}}
                            <li><strong>Datos de interacción:</strong>listas de favoritos.</li>
                            <li><strong>Datos técnicos:</strong> Dirección IP, tipo de navegador, tipo de dispositivo utilizado.
                            </li>
                        </ul>
                    </div>
    
                    <div class="privacy-section">
                        <h2>3. Finalidad del Tratamiento</h2>
                        <p>Utilizamos tus datos personales para:</p>
                        <ul>
                            {{-- <li>Procesar y gestionar tus pedidos de libros.</li> --}}
                            <li>Brindarte un servicio de atención al cliente personalizado.</li>
                            <li>Enviarte recomendaciones de libros basadas en tus preferencias.</li>
                            <li>Mejorar nuestros servicios y experiencia de usuario.</li>
                            {{-- <li>Cumplir con obligaciones legales y regulatorias.</li> --}}
                        </ul>
                    </div>
    
                    <div class="privacy-section">
                        <h2>4. Bases Legales para el Tratamiento</h2>
                        <p>El tratamiento de tus datos se basa en:</p>
                        <ul>
                            <li><strong>Ejecución de contrato:</strong> Para autenticación en el sitio web.</li>
                            <li><strong>Consentimiento:</strong> Para enviarte comunicaciones comerciales (Si lo has solicitado).</li>
                            <li><strong>Interés legítimo:</strong> Para mejorar nuestros servicios.</li>
                            {{-- <li><strong>Cumplimiento legal:</strong> Para facturación y requerimientos fiscales.</li> --}}
                        </ul>
                    </div>
    
                    <div class="privacy-section">
                        <h2>5. Compartir Datos con Terceros</h2>
                        <p>Tus datos podrán ser compartidos con:</p>
                        <ul>
                            {{-- <li><strong>Proveedores de servicios:</strong> Empresas de transporte para entregas,
                                procesadores de pago.</li> --}}
                            <li><strong>Autoridades competentes:</strong> Cuando sea requerido por ley.</li>
                            <li><strong>Otras editoriales o autores:</strong> Solo datos agregados y anonimizados para
                                análisis estadísticos.</li>
                        </ul>
                        <p>Nunca vendemos tus datos personales a terceros.</p>
                    </div>
    
                    <div class="privacy-section">
                        <h2>6. Derechos de los Usuarios</h2>
                        <p>De acuerdo con la legislación de protección de datos, tienes derecho a:</p>
                        <ul>
                            <li>Acceder a tus datos personales.</li>
                            <li>Rectificar datos inexactos o incompletos.</li>
                            <li>Suprimir tus datos ("derecho al olvido").</li>
                            <li>Limitar el tratamiento de tus datos.</li>
                            <li>Oponerte al tratamiento.</li>
                            <li>Portabilidad de datos.</li>
                            <li>Retirar tu consentimiento en cualquier momento.</li>
                        </ul>
                        <p>Para ejercer estos derechos, puedes enviar un correo electrónico a: <a
                                href="mailto:protecciondedatos@lavida.com">protecciondedatos@lavida.com</a>.</p>
                    </div>
    
                    <div class="privacy-section">
                        <h2>7. Medidas de Seguridad</h2>
                        <p>Implementamos medidas técnicas y organizativas para proteger tus datos:</p>
                        <ul>
                            <li>Cifrado de datos sensibles.</li>
                            <li>Accesos restringidos al personal autorizado.</li>
                            <li>Protocolos seguros para transacciones (HTTPS, SSL).</li>
                            {{-- <li>Copias de seguridad periódicas.</li> --}}
                        </ul>
                    </div>
    
                    <div class="privacy-section">
                        <h2>8. Conservación de Datos</h2>
                        <p>Conservaremos tus datos personales:</p>
                        <ul>
                            <li>Mientras mantengas una cuenta activa con nosotros.</li>
                            {{-- <li>Durante los plazos legales requeridos para facturación y contabilidad.</li> --}}
                            <li>Hasta que solicites su eliminación, salvo obligación legal de conservación.</li>
                        </ul>
                    </div>
    
                    <div class="privacy-section">
                        <h2>9. Cookies y Tecnologías Similares</h2>
                        <p>Nuestro sitio web utiliza cookies para:</p>
                        <ul>
                            <li>Funcionamiento básico del sitio (sesión de usuario).</li>
                            {{-- <li>Análisis de tráfico y comportamiento (Google Analytics).</li> --}}
                            {{-- <li>Personalización de contenido y publicidad.</li> --}}
                        </ul>
                        {{-- <p>Puedes gestionar tus preferencias de cookies en cualquier momento desde la configuración de tu
                            navegador o mediante nuestro <a href="/politica-cookies">banner de cookies</a>.</p> --}}
                    </div>
    
                    <div class="privacy-section">
                        <h2>10. Cambios en esta Política</h2>
                        <p>Podemos actualizar esta política periódicamente. Te notificaremos sobre cambios significativos a
                            través de nuestro sitio web o por correo electrónico.</p>
                    </div>
    
                    <div class="privacy-section">
                        <h2>11. Contacto</h2>
                        <p>Para cualquier pregunta sobre esta política o el tratamiento de tus datos, contáctanos:</p>
                        <p><strong>Protección de Datos</strong><br>
                            Email: <a
                                href="mailto:protecciondedatos@lavida.com">protecciondedatos@lavida.com</a><br>
                            Dirección: [Dirección física]</p>
                    </div>
    
                    <div class="last-updated">
                        <p>Última actualización: 02/08/2025</p>
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
<script src="{{asset('js/loading.js')}}" type="text/javascript"></script>

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