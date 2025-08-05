<!doctype html>
<!--suppress ALL -->
<html lang="es" id="html" class="loading" xmlns:a="http://www.w3.org/1999/html">

<head>
    <title>Perfil</title>
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
            
        <div class="section text-left my-4">
            <div class="container" style="margin-top:6rem">
                <!-- Sección de Información del Perfil -->
                <div class="card shadow-lg mb-5">
                    <div class="card-header text-white">
                        <h2 class="title mb-0">Información del perfil</h2>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="{{ route('profile.update') }}" class="mt-2">
                            @csrf
                            @method('patch')
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nombre</label>
                                        <input id="name" name="name" type="text" class="form-control" 
                                               value="{{ old('name', $user->name) }}" required autocomplete="off">
                                        @error('name')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Correo electrónico</label>
                                        <input id="email" name="email" type="email" class="form-control" 
                                               value="{{ old('email', $user->email) }}" 
                                               @if($user->google_account) disabled @else required @endif 
                                               autocomplete="off">
                                        @error('email')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail() && !$user->google_account)
                            <div class="alert alert-warning text-white" role="alert">
                                {{ __('Your email address is unverified.') }}
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-white p-0 ms-1" style="text-decoration: underline;">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </form>
                                @if (session('status') === 'verification-link-sent')
                                    <div class="mt-2 text-white">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </div>
                                @endif
                            </div>
                            @endif
                            
                            <div class="row mt-3">
                                <div class="col-sm-6 text-start">
                                    {{-- <a href="{{ url()->previous() }}" class="btn bg-gradient-secondary">
                                        <i class="material-icons">arrow_back</i> {{ __('Cancel') }}
                                    </a> --}}
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button type="submit" class="btn bg-gradient-warning">
                                        <i class="material-icons">save</i> Guardar
                                    </button>
                                </div>
                            </div>
                            
                            @if (session('status') === 'profile-updated')
                            <div class="alert alert-success alert-dismissible fade show mt-3 text-white" role="alert">
                                Perfil actualizado
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                
                <!-- Sección de Actualización de Contraseña -->
                @if($user->google_account)
                <div class="card shadow-lg mb-5">
                    {{-- <div class="card-header text-white">
                        <h2 class="title mb-0">Autenticación</h2>
                    </div> --}}
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                <img src="{{asset('img/google_logo.webp')}}" alt="Google Logo" style="width: 40px; height: 40px;">
                            </div>
                            <div>
                                <h5 class="mb-1">Has iniciado sesión con Google</h5>
                                <p class="text-sm mb-0">Tu autenticación está gestionada por Google. Para cambiar tu contraseña o correo electrónico, por favor actualiza tu cuenta de Google.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="card shadow-lg mb-5">
                    <div class="card-header text-white">
                        <h2 class="title mb-0">Actualizar contraseña</h2>
                    </div>
                    <div class="card-body p-4">
                        <form method="post" action="{{ route('password.update') }}" class="mt-2">
                            @csrf
                            @method('put')
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Contraseña actual</label>
                                        <input id="current_password" name="current_password" type="password" 
                                               class="form-control" autocomplete="off">
                                        @error('current_password', 'updatePassword')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Nueva contraseña</label>
                                        <input id="password" name="password" type="password" 
                                               class="form-control" autocomplete="off">
                                        @error('password', 'updatePassword')
                                            <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                        <label>Confirmar contraseña</label>
                                        <input id="password_confirmation" name="password_confirmation" type="password" 
                                               class="form-control" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt-3">
                                <div class="col-sm-6 text-start">
                                    {{-- <button type="reset" class="btn bg-gradient-secondary">
                                        <i class="material-icons">restart_alt</i> Restablecer
                                    </button> --}}
                                </div>
                                <div class="col-sm-6 text-end">
                                    <button type="submit" class="btn bg-gradient-warning">
                                        <i class="material-icons">lock_reset</i> Actualizar
                                    </button>
                                </div>
                            </div>
                            
                            @if (session('status') === 'password-updated')
                            <div class="alert alert-success alert-dismissible fade show mt-3 text-white" role="alert">
                                Contraseña actualizada
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
                @endif
                
                <!-- Sección de Eliminar Cuenta -->
                <div class="card shadow-lg">
                    <div class="card-header text-white">
                        <h2 class="title mb-0">Eliminar cuenta</h2>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-sm">
                            Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminarla, descargue cualquier dato o información que desee conservar.
                        </p>
                        
                        <button class="btn bg-gradient-danger mt-3" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                            <i class="material-icons">delete_forever</i> Eliminar
                        </button>
                        
                        <!-- Modal de Confirmación -->
                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">¿Estás seguro?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post" action="{{ route('profile.destroy') }}">
                                        @csrf
                                        @method('delete')
                                        
                                        <div class="modal-body">
                                            <p>Una vez eliminada su cuenta, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar su cuenta permanentemente.</p>
                                            
                                            @if(!$user->google_account)
                                            <div class="input-group input-group-static mt-3">
                                                <label>Contraseña</label>
                                                <input id="password" name="password" type="password" 
                                                       class="form-control" placeholder="Ingrese su contraseña">
                                                @error('password', 'userDeletion')
                                                    <div class="text-danger text-xs pt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            @endif
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">
                                                Cancelar
                                            </button>
                                            <button type="submit" class="btn bg-gradient-danger">
                                                Eliminar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @push('styles')
        <style>
            .input-group.input-group-static label {
                margin-bottom: 8px;
                font-size: 0.75rem;
                color: #495057;
            }
            
            .card-header {
                padding: 1.5rem;
            }
            
            .card-header .title {
                font-weight: 600;
                font-size: 1.25rem;
            }
            
            .btn {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .material-icons {
                font-size: 1rem;
                vertical-align: middle;
            }
            
            /* Estilo para la tarjeta de Google */
            .google-auth-card {
                border-left: 4px solid #4285F4;
            }
        </style>
        @endpush
        {{-- </div> --}}

        @include('layouts.footer')

    </div>

    <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/material-kit.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    {{-- Important --}}
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/loading.js') }}" type="text/javascript"></script>
</body>

</html>
