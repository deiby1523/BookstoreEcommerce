<!-- Estilos para mostrar las alertas con un toque mas suave -->
<style>
    .mostrar {
        display: block;
        opacity: 1;
    }

    .ocultar {
        opacity: 0;
        pointer-events: none;
    }

</style>

@if ($message = Session::get('success'))
    <script>
        // Función para mostrar la alerta y ocultarla después de cierto tiempo
        function mostrarAlerta() {
            var alerta = document.getElementById('alert');
            alerta.style.display = 'block';

            // Ocultar la alerta después de 5 segundos (5000 milisegundos)
            setTimeout(function () {
                alerta.style.display = 'none';
            }, 3000);
        }

        // Llama a la función para mostrar la alerta
        mostrarAlerta();
    </script>
    <div class="container" style="max-width: 800px;
    padding: unset;
    position: fixed;
    bottom: 10%;
    right: 0;
    z-index: 1;
}">
        <div id="alert" class="alert alert-success text-white font-weight-bold" role="alert"
             style="transition: opacity 0.5s ease-in-out;box-shadow: none;margin: 0px 10% 10% 10%; position: absolute; background-color: rgb(174,255,169) !important;   width: -webkit-fill-available;
             z-index: 1;">
            {{$message}}
        </div>
    </div>
    <script>
        function mostrarAlerta() {
            var alerta = document.getElementById('alert');


            setTimeout(function () {
                alerta.classList.add('ocultar');
            }, 3000);


        }

        mostrarAlerta();
    </script>
@endif

@if ($message = Session::get('danger'))

    <div class="container" style="max-width: 800px;
    padding: unset;
    position: fixed;
    bottom: 10%;
    right: 0;
    z-index: 1;
}">
        <div id="alert" class="alert alert-danger text-dark font-weight-bold" role="alert"
             style="transition: opacity 0.5s ease-in-out;box-shadow: none;margin: 0px 10% 10% 10%; position: absolute;width: -webkit-fill-available;
    background-color: rgb(255,191,191) !important;    z-index: 1;">
            {{$message}}
        </div>
    </div>
    <script>
        function mostrarAlerta() {
            var alerta = document.getElementById('alert');

            setTimeout(function () {
                alerta.classList.add('ocultar');
            }, 3000);

        }

        mostrarAlerta();
    </script>
@endif
