<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading" xmlns:a="http://www.w3.org/1999/html">

<head>
    <title>Términos y Condiciones</title>
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

        .terms-section {
            margin-bottom: 2.5rem;
        }
        .terms-section h2 {
            color: #7d7d7d;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }
        .terms-section h3 {
            color: #444;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        .terms-section p, .terms-section li {
            color: #555;
            line-height: 1.8;
            margin-bottom: 1rem;
        }
        .terms-section ul {
            padding-left: 1.5rem;
        }
        .highlight-box {
            background-color: #f8f9fa;
            border-left: 4px solid #fb8c00;
            padding: 1.5rem;
            margin: 1.5rem 0;
            border-radius: 0 4px 4px 0;
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
                <h1 class="display-3 font-weight-bold mb-3 text-dark">Términos y Condiciones</h1>
                <p class="lead text-secondary">Normas que rigen el uso de nuestro sitio web y servicios</p>
            </div>
        </section>

        <div class="row mb-7">
            {{-- Contact Form --}}
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="container py-4">
                    <div class="highlight-box">
                        <p><strong>Al acceder y utilizar nuestro sitio web, usted acepta estar legalmente obligado por estos términos y condiciones.</strong> Si no está de acuerdo con alguno de estos términos, por favor no utilice nuestro sitio.</p>
                    </div>
        
                    <div class="terms-section">
                        <h2>1. Definiciones</h2>
                        <p>Para los efectos de estos Términos y Condiciones:</p>
                        <ul>
                            <li><strong>"Sitio Web"</strong> se refiere a [www.lavida.com].</li>
                            <li><strong>"Usuario"</strong> es cualquier persona que acceda o utilice el sitio web.</li>
                            <li><strong>"Contenido"</strong> incluye todos los textos, imágenes, gráficos, información y materiales disponibles en el sitio.</li>
                            <li><strong>"Productos"</strong> son los libros y otros artículos ofrecidos para venta.</li>
                        </ul>
                    </div>
        
                    <div class="terms-section">
                        <h2>2. Uso del Sitio Web</h2>
                        <p>El usuario se compromete a:</p>
                        <ul>
                            <li>Utilizar el sitio solo con fines legales.</li>
                            {{-- <li>No realizar compras fraudulentas.</li> --}}
                            <li>No intentar acceder a áreas restringidas del sitio.</li>
                            <li>No interferir con la seguridad o funcionamiento del sitio.</li>
                            <li>No utilizar robots, spiders o cualquier medio automatizado para acceder al sitio.</li>
                        </ul>
                    </div>
        
                    <div class="terms-section">
                        <h2>3. Registro de Cuenta</h2>
                        <p>Para registrarte en el sitio deberás proporcionar información veraz y actualizada:</p>
                        <ul>
                            <li>Eres responsable de mantener la confidencialidad de tu cuenta y contraseña.</li>
                            <li>Debes ser mayor de 18 años o contar con autorización de tus padres/tutores.</li>
                            <li>Nos reservamos el derecho de suspender cuentas que violen estos términos.</li>
                        </ul>
                    </div>
        
                    {{-- <div class="terms-section">
                        <h2>4. Proceso de Compra</h2>
                        <h3>4.1 Disponibilidad</h3>
                        <p>Todos los productos están sujetos a disponibilidad. En caso de agotamiento, te notificaremos y ofreceremos alternativas o reembolso.</p>
                        
                        <h3>4.2 Precios</h3>
                        <p>Los precios mostrados incluyen IVA (cuando aplica) pero no incluyen gastos de envío, que se calcularán al finalizar la compra.</p>
                        
                        <h3>4.3 Formas de Pago</h3>
                        <p>Aceptamos:</p>
                        <ul>
                            <li>Tarjetas de crédito/débito (Visa, MasterCard, etc.)</li>
                            <li>PayPal</li>
                            <li>Transferencias bancarias</li>
                        </ul>
                        
                        <h3>4.4 Confirmación</h3>
                        <p>Recibirás un email confirmando tu pedido con todos los detalles. La venta se considera perfeccionada cuando recibas esta confirmación.</p>
                    </div>
        
                    <div class="terms-section">
                        <h2>5. Envíos y Entregas</h2>
                        <ul>
                            <li>Los plazos de entrega son estimados y pueden variar.</li>
                            <li>Los envíos se realizan de lunes a viernes, excluyendo días festivos.</li>
                            <li>Es responsabilidad del usuario proporcionar una dirección de entrega correcta.</li>
                            <li>Los pedidos internacionales pueden estar sujetos a aduanas e impuestos adicionales.</li>
                        </ul>
                    </div>
        
                    <div class="terms-section">
                        <h2>6. Derecho de Retracto</h2>
                        <p>De acuerdo con la legislación de protección al consumidor, tienes derecho a desistir de tu compra dentro de los 14 días naturales desde la recepción:</p>
                        <ul>
                            <li>Los libros deben estar en perfecto estado, sin señales de uso.</li>
                            <li>Los libros digitales (ebooks) no tienen derecho de retracto por su naturaleza.</li>
                            <li>Los gastos de devolución corren por tu cuenta.</li>
                        </ul>
                    </div>
         --}}
                    <div class="terms-section">
                        <h2>4. Propiedad Intelectual</h2>
                        <p>Todo el contenido del sitio (textos, imágenes, logotipos) está protegido por derechos de autor:</p>
                        <ul>
                            <li>Los libros vendidos están sujetos a las leyes de copyright.</li>
                            <li>Queda prohibida la reproducción no autorizada de cualquier contenido.</li>
                            <li>Las reseñas y comentarios publicados por usuarios son de su exclusiva responsabilidad.</li>
                        </ul>
                    </div>
        
                    <div class="terms-section">
                        <h2>5. Limitación de Responsabilidad</h2>
                        <p>Nuestra responsabilidad está limitada al valor del producto comprado. No somos responsables por:</p>
                        <ul>
                            <li>Daños indirectos o pérdida de beneficios.</li>
                            <li>Errores tipográficos ocasionales en descripciones o precios.</li>
                            <li>Contenido de terceros enlazado desde nuestro sitio.</li>
                            <li>Eventos de fuerza mayor que impidan el cumplimiento.</li>
                        </ul>
                    </div>
        
                    <div class="terms-section">
                        <h2>6. Modificaciones</h2>
                        <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Los cambios entrarán en vigor al ser publicados en el sitio.</p>
                    </div>
        
                    <div class="terms-section">
                        <h2>7. Legislación Aplicable</h2>
                        <p>Estos términos se rigen por las leyes de Colombia.</p>
                    </div>
        
                    <div class="terms-section">
                        <h2>8. Contacto</h2>
                        <p>Para cualquier consulta sobre estos términos:</p>
                        <p><strong>Atención al Cliente</strong><br>
                        Email: <a href="mailto:atencionalcliente@lavida.com">atencionalcliente@lavida.com</a><br>
                        Teléfono: [Número]<br>
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