<script>
    $(document).ready(function () {
        let typingTimer;  // Variable para almacenar el temporizador de escritura
        const doneTypingInterval = 2000;  // Intervalo de tiempo después del cual se considera que la escritura ha terminado (en milisegundos)
        let loaderTimeout; // Variable para almacenar el temporizador de la animación de carga

        // Función para mostrar la animación de carga
        function showLoader() {
            // Agrega la clase 'loader' al elemento con ID 'loader'
            $('#loader').addClass('loader');
        }


        // Función para ocultar la animación de carga
        function hideLoader() {
            // Elimina la clase 'loader' del elemento con ID 'loader'
            $('#loader').removeClass('loader');
        }

        // Evento keyup para el campo de búsqueda
        $('#searchPublisher').keyup(function () {
            clearTimeout(typingTimer);  // Reinicia el temporizador en cada pulsación de tecla
            clearTimeout(loaderTimeout);  // Reinicia el temporizador de la animación de carga

            showLoader();  // Muestra la animación de carga

            // Inicia un nuevo temporizador para detectar cuando la escritura ha terminado
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });

        // Función que se ejecuta cuando la escritura ha terminado
        function doneTyping() {
            hideLoader();  // Oculta la animación de carga después de que haya pasado el intervalo de tiempo
        }

    });

    // Publisher
    // Ajax request according to what's in the search box
    function get_publishers(search, page) {
        if (search === '') {
            search = ' ';
        }
        console.log(search + ' ' + page);
        $.ajax({
            url: `publisher/search/${search}`,
            type: 'GET',
            dataType: 'json',
            data: {'search': search, 'page': page},
        })
            .done(function (publishers, response, xhr) {
                function convertToISBN(number) {
                    return 'ISBN ' + number.substring(0, 3) + '-' + number.substring(3, 4) + '-' + number.substring(4, 8) + '-' + number.substring(8, 12) + '-' + number.substring(12, 13);
                }

                let paginationButtons = "";
                let resultsList = "";
                let modals = "";

                publishers.forEach(function (publisher) {
                    resultsList += `<tr>
                                                    <td class='align-middle text-center'><p class=' mb-0'>${publisher.id}</p></td>
                                                    <td><p class='mb-0 truncated-text-large' data-bs-toggle='tooltip' data-bs-placement='right' title='${publisher.publisher_name}'>${publisher.publisher_name}</p></td>
                                                    <td class='align-middle'><p class='mb-0'>${publisher.created_at}</p>
                                                    <td class='align-middle'><p class='mb-0'>${publisher.updated_at}</p>

                                                    <td class='align-middle' style='text-align: center;'>
                                                        <a href='publisher/show/${publisher.id}' class='text-secondary mx-3 font-weight-normal' data-toggle='tooltip' data-original-title='Show user'>
                                                            Visualizar
                                                        </a>
                                                        <a href='publisher/edit/${publisher.id}' class='text-secondary mx-3 font-weight-normal' data-toggle='tooltip' data-original-title='Edit user'>
                                                            Editar
                                                        </a>
                                                        <a href='' class='text-secondary font-weight-normal' data-bs-toggle='modal' data-bs-target='#deleteConfirm${publisher.id}' data-toggle='tooltip' data-original-title='Delete user'>
                                                            Eliminar
                                                        </a>
                                                    </td>
                                                </tr>`;
                });

                publishers.forEach(function (publisher) {
                    modals += `<div class='modal fade' id='deleteConfirm${publisher.id}' tabindex='-1' aria-labelledby='deleteConfirm${publisher.id}' aria-hidden='true'>
                                                    <div class='modal-dialog' style='margin-top: 10rem;'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                Esta seguro que desea eliminar la editorial '${publisher.publisher_name}'?
                                                                <br><br>
                                                                Esta accion es irreversible.
                                                            </div>
                                                            <div class='modal-footer justify-content-between'>
                                                                <button type='button' class='btn bg-gradient-dark mb-0' data-bs-dismiss='modal'>Cancelar</button>
                                                                <form method='DELETE' action='publisher/delete/${publisher.id}'>
                                                                    <button type='submit' class='btn bg-gradient-danger mb-0'>Eliminar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`
                });



                // Insert the complete list of results in #publisherDisplay after all publishers have been processed
                $("#publisherDisplay").html(resultsList);
                $("#modals").html(modals);

                let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });

                // Obtiene la referencia a la tabla por su ID
                const table = document.getElementById("table");
                const display = document.getElementById("noExistsDisplay");

                // Obtiene todas las celdas <td> de la tabla
                const data = table.getElementsByTagName("td");

                // Verifica si hay al menos una celda <td>
                if (data.length > 0) {
                    // Si hay al menos una celda <td>, muestra la tabla
                    display.style.display = "none"
                    table.style.display = "table";
                } else {
                    // Si no hay celdas <td>, oculta la tabla
                    display.style.display = "block";
                    table.style.display = "none";
                }

                paginationButtons += `<li class="page-item">
                                    <button class="page-link pag-link ${xhr.getResponseHeader("page") == 1 ? 'disabled' : ''}" tabindex="-1" onclick="get_publishers('${search}',${xhr.getResponseHeader("page") - 1});">
                                        <i class="fa fa-angle-left"></i>
                                        <span class="sr-only">Anterior</span>
                                    </button>
                                </li>`;

                if (parseInt(xhr.getResponseHeader("numPages")) <= 15) {
                    for (let i = 1; i <= xhr.getResponseHeader("numPages"); i++) {
                        paginationButtons += `<li class="page-item ${xhr.getResponseHeader("page") == i ? 'active' : ''}"><button class="page-link" onclick="get_publishers('${search}',${i});">${i}</button></li>`;
                    }
                } else {
                    for (let i = 1; i <= 5; i++) {
                        paginationButtons += `<li class="page-item ${xhr.getResponseHeader("page") == i ? 'active' : ''}"><button class="page-link" onclick="get_publishers('${search}',${i});">${i}</button></li>`;
                    }
                    paginationButtons += "......";
                    if (parseInt(xhr.getResponseHeader("page")) > 5 && parseInt(xhr.getResponseHeader("page")) < xhr.getResponseHeader("numPages") - 4) {
                        paginationButtons += `<li class="page-item active"><button class="page-link" onclick="get_publishers('${search}',${xhr.getResponseHeader("page")});">${xhr.getResponseHeader("page")}</button></li>`;
                        paginationButtons += "......";
                    }

                    for (let i = xhr.getResponseHeader("numPages") - 4; i <= xhr.getResponseHeader("numPages"); i++) {
                        paginationButtons += `<li class="page-item ${xhr.getResponseHeader("page") == i ? 'active' : ''}"><button class="page-link" onclick="get_publishers('${search}',${i});">${i}</button></li>`;
                    }
                }



                $("#searchPageContainer").html(`
<div class="row" style="justify-content: center">
    <div class="col-sm-1">
        <div class="input-group input-group-static">
            <input id="inputPag" type="number" class="form-control" placeholder="Buscar pág" min=1 max=${xhr.getResponseHeader("numPages")}>
        </div>
    </div>
    <div class="col-sm-1">
        <button id="btnBuscarPag" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path></svg></button>
    </div>
</div>`)

                // $("#infopag").html(`<p class="text-lg"><b>Libros: </b>${xhr.getResponseHeader("numPublishers")}</p>
                //                     <p class="text-lg"><b>Por pagina: </b>${xhr.getResponseHeader("perPage")}</p>
                //                     <p class="text-lg"><b>total paginas: </b>${xhr.getResponseHeader("numPages")}</p>
                //                     <p class="text-lg"><b>pagina actual: </b>${xhr.getResponseHeader("page")}</p>
                //                     <p class="text-lg"><b></b>${xhr.getResponseHeader("display")}</p>`);


                paginationButtons += `<li class="page-item">
                                    <button class="page-link pag-link ${xhr.getResponseHeader("page") == xhr.getResponseHeader("numPages") ? 'disabled' : ''}" tabindex="-1" onclick="get_publishers('${search}',${parseInt(xhr.getResponseHeader("page")) + 1});">
                                        <i class="fa fa-angle-right"></i>
                                        <span class="sr-only">Siguiente</span>
                                    </button>
                                </li>`
                $("#pagination").html(paginationButtons);

            });
    }


    // Function to implement debounce for delaying Ajax calls
    function debounce(func, delay) {
        let timer;
        return function () {
            const context = this;
            const args = arguments;
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(context, args);
            }, delay);
        };
    }


    // publisher
    // Wrapped Ajax function with debounce
    const PublisherDelayedRequest = debounce(function (search) {
        get_publishers(search, 1);
    }, 2000); // 300ms delay, adjustable based on your needs

    // publisher
    // 'input' event using the debounce function
    $(document).on('input', '#searchPublisher', function () {
        const searchValue = $('#searchPublisher').val();
        PublisherDelayedRequest(searchValue);
    });

    $(document).on('click','#btnBuscarPag', function () {
        const searchValue = $('#searchPublisher').val();
        const page = $('#inputPag').val();
        get_publishers(searchValue,page);
    })

    window.addEventListener('load', function () {
        get_publishers(" ", 1);
    });

</script>
