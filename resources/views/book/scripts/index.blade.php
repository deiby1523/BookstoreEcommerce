
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
        $('#searchBook').keyup(function () {
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

    // Book
    // Ajax request according to what's in the search box
    function get_books(search) {
        $.ajax({
            url: `book/search/${search}`,
            type: 'GET',
            dataType: 'json',
            data: {'search': search},
        })
            .done(function (books) {
                function convertToISBN(number) {
                    return 'ISBN ' + number.substring(0, 3) + '-' + number.substring(3, 4) + '-' + number.substring(4, 8) + '-' + number.substring(8, 12) + '-' + number.substring(12, 13);
                }

                let resultsList;
                resultsList = ""; // Create a variable to store the list of results

                books.forEach(function (book) {

                    let isbn = convertToISBN(book.book_isbn);

                    resultsList += `<tr>
                                                    <td class='align-middle text-center'><p class=' mb-0'>${isbn}</p></td>
                                                    <td><p class='mb-0 truncated-text-large' data-bs-toggle='tooltip' data-bs-placement='top' title='${book.book_title}'>${book.book_title}</p></td>
                                                    <td class='align-middle'><p class='mb-0 truncated-text-short' data-bs-toggle='tooltip' data-bs-placement='top' title='${book.publisher_name}'>${book.publisher_name}</p></td>
                                                    <td class='align-middle'><p class='mb-0'>$ ${book.book_price.toLocaleString()}</p>
                                    </td>
                                                    <td class='align-middle' style='text-align: center;'>
                                                        <a href='book/show/${book.id}' class='text-secondary mx-3 font-weight-normal' data-toggle='tooltip' data-original-title='Show user'>
                                                            Visualizar
                                                        </a>
                                                        <a href='book/edit/${book.id}' class='text-secondary mx-3 font-weight-normal' data-toggle='tooltip' data-original-title='Edit user'>
                                                            Editar
                                                        </a>
                                                        <a href='' class='text-secondary font-weight-normal' data-bs-toggle='modal' data-bs-target='#deleteConfirm${book.id}' data-toggle='tooltip' data-original-title='Delete user'>
                                                            Eliminar
                                                        </a>
                                                    </td>
                                                </tr>
                                                <div class='modal fade' id='deleteConfirm${book.id}' tabindex='-1' aria-labelledby='deleteConfirm${book.id}' aria-hidden='true'>
                                                    <div class='modal-dialog' style='margin-top: 10rem;'>
                                                        <div class='modal-content'>
                                                            <div class='modal-header'>
                                                                <h5 class='modal-title' id='exampleModalLabel'>Confirmacion</h5>
                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </div>
                                                            <div class='modal-body'>
                                                                Esta seguro que desea eliminar el libro '${book.book_title}'?
                                                                <br><br>
                                                                Esta accion es irreversible.
                                                            </div>
                                                            <div class='modal-footer justify-content-between'>
                                                                <button type='button' class='btn bg-gradient-dark mb-0' data-bs-dismiss='modal'>Cancelar</button>
                                                                <form method='DELETE' action='book/delete/${book.id}'>
                                                                    <button type='submit' class='btn bg-gradient-danger mb-0'>Eliminar</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

`;
                });



                // Insert the complete list of results in #bookDisplay after all authors have been processed
                $("#bookDisplay").html(resultsList);

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


    // book
    // Wrapped Ajax function with debounce
    const BookDelayedRequest = debounce(function (search) {
        get_books(search);
    }, 2000); // 300ms delay, adjustable based on your needs

    // book
    // 'input' event using the debounce function
    $(document).on('input', '#searchBook', function () {
        const searchValue = $('#searchBook').val();
        if (searchValue !== "") {
            BookDelayedRequest(searchValue);
        } else {
            $("#bookDisplay").html("");
        }
    });
</script>
