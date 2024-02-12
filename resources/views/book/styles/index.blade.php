<style>
    .mostrar {
        display: block;
        opacity: 1;
    }

    .ocultar {
        opacity: 0;
        pointer-events: none;
    }

    .row-hover:hover {
        background-color: #f8f9fa;
    }

    #loading {
        display: none;
    }


    .loader {
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top: 4px solid #fb8c00;
        width: 24px;
        height: 24px;
        animation: spin 1s linear infinite;
        margin-right: 10px;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .truncated-text-large {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 350px; /* max width before truncate  */
    }

    .truncated-text-short {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 150px; /* max width before truncate */
    }
</style>

@if ($message = Session::get('success'))
    <script>
        // Función para mostrar la alerta y ocultarla después de cierto tiempo
        function mostrarAlerta() {
            const alerta = document.getElementById('alert');
            alerta.style.display = 'block';

            // Ocultar la alerta después de 5 segundos (5000 milisegundos)
            setTimeout(function () {
                alerta.style.display = 'none';
            }, 3000);
        }

        // Llama a la función para mostrar la alerta
        mostrarAlerta();
    </script>

    <div class="container" style="max-width: initial;
    padding: unset;
    position: fixed;
    margin-top: 8rem;
    z-index: 1;
}">
        <div id="alert" class="alert blur alert-success text-white font-weight-bold" role="alert"
             style="transition: opacity 0.5s ease-in-out;;box-shadow: none;background-image: initial;margin: 0 10% 10% 10%; position: absolute;
             backdrop-filter: saturate(0%) blur(4px) !important; background-color: rgb(7 255 0 / 15%) !important;   width: -webkit-fill-available;
             z-index: 1;">
            {{$message}}
        </div>
    </div>
    <script>
        function mostrarAlerta() {
            const alerta = document.getElementById('alert');


            setTimeout(function () {
                alerta.classList.add('ocultar');
            }, 3000);


        }

        mostrarAlerta();
    </script>
@endif

@if ($message = Session::get('danger'))

    <div class="container" style="max-width: initial;
    padding: unset;
    position: fixed;
    margin-top: 8rem;
    z-index: 1;
}">
        <div id="alert" class="alert blur alert-danger text-white font-weight-bold" role="alert"
             style="transition: opacity 0.5s ease-in-out;box-shadow: none;background-image: initial;margin: 0 10% 10% 10%; position: absolute;    width: -webkit-fill-available;backdrop-filter: saturate(0%) blur(4px) !important;
    background-color: rgb(7 255 0 / 15%) !important;    z-index: 1;">
            {{$message}}
        </div>
    </div>
    <script>
        function mostrarAlerta() {
            const alerta = document.getElementById('alert');

            setTimeout(function () {
                alerta.classList.add('ocultar');
            }, 3000);

        }

        mostrarAlerta();
    </script>
@endif
