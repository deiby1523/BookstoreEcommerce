<!doctype html>
<html lang="es">
<head>
    <title>Mensaje</title>
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
@include('layouts.sidebar')
@include('layouts.header')


<main>
    <div class="row mt-4">
        <div class="col-md-3">
            <a class="btn bg-transparent mb-0 mt-lg-auto" href="{{ route('message.index') }}">
                <svg style="margin-right: 1rem" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                </svg>Volver a Mensajes
            </a>
        </div>
    </div>
    
    <div class="container">
        <div class="section text-left my-4">
            {{-- <h2 class="title">Mensaje de Contacto</h2> --}}

            <div class="card">
                <div class="card d-flex justify-content-center p-4 shadow-lg">
                    <div class="card-body pb-2">
                        <!-- Encabezado del mensaje -->
                        <div class="row mb-4">
                            <div class="col-md-8">
                                <h3 class="mb-1">{{ $message->subject }}</h3>
                                <div class="text-muted">
                                    <span class="me-3"><strong>De:</strong> {{ $message->name }}</span>
                                    <span><strong>Email:</strong> {{ $message->email }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                {{-- <span class="badge bg-{{ $message->read ? 'success' : 'warning' }}">
                                    {{ $message->read ? 'Leído' : 'No leído' }}
                                </span> --}}
                                <div class="text-sm text-muted mt-1">
                                    Recibido: {{ $message->created_at->format('d/m/Y H:i') }}
                                </div>
                            </div>
                        </div>

                        <!-- Cuerpo del mensaje -->
                        <div class="border-top pt-4 mb-4">
                            <h5 class="mb-3">Contenido del mensaje:</h5>
                            <div class="p-3 bg-light rounded">
                                {!! nl2br(e($message->message)) !!}
                            </div>
                        </div>

                        <!-- Información adicional -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="me-2"><strong>Newsletter:</strong></span>
                                    <span class="badge bg-{{ $message->newsletter ? 'success' : 'secondary' }}">
                                        {{ $message->newsletter ? 'Sí' : 'No' }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <span class="text-muted">
                                    Leído: {{ $message->updated_at->format('d/m/Y H:i') }}
                                </span>
                            </div>
                        </div>

                        <!-- Acciones -->
                        <div class="row">
                            <div class="col-sm-6 text-start">
                                <a href="{{route('message.index')}}" class="btn bg-gradient-danger mt-3 mb-0"
                                   style="max-width: 233px; width: -webkit-fill-available;">Volver
                                </a>
                            </div>

                            <div class="col-sm-6 text-end">
                                <form method="POST"
                                                        action="{{ route('message.delete', $message->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn bg-gradient-secondary mt-3 mb-0" style="max-width: 233px;width: -webkit-fill-available;">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                {{-- <button type="submit" class="btn bg-gradient-warning mt-3 mb-0"
                                        style="max-width: 233px;width: -webkit-fill-available;">Crear
                                </button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .bg-light {
        background-color: #f8f9fa !important;
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.35em 0.65em;
    }
</style>
<div class="container">
    <div class="row">

    </div>
</div>

<script src="{{asset('js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/material-kit.min.js')}}" type="text/javascript"></script>
</body>
</html>
