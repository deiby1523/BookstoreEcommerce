<script>
    // book
    // Event click to display the search box
    document.getElementById('book_title').addEventListener('click', function (event) {
        event.preventDefault(); // Bypasses the default behavior of the select
        const selectBook = document.getElementById('selectBook');
        selectBook.classList.add('show');
    });

    // book
    // Event to close the search box if you click outside of it
    document.addEventListener('click', function (e) {
        const selectBook = document.getElementById('selectBook');
        if (!selectBook.contains(e.target) && e.target.id !== 'book_title') {
            selectBook.classList.remove('show');
        }
    });


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
    }, 300); // 300ms delay, adjustable based on your needs


    // book
    // 'input' event using the debounce function
    $(document).on('input', '#searchBook', function () {
        var searchValue = $('#searchBook').val();
        if (searchValue !== "") {
            BookDelayedRequest(searchValue);
        } else {
            $("#bookOptions").html("");
        }
    });

    // Book
    // Ajax request according to what's in the search box
    function get_books(search) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '{{ route('book.searchNav') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                'search': search,
            },
        })
            .done(function (books) {
                console.log("Retornar libros");
                var resultsList = ""; // Create a variable to store the list of results
                books.forEach(function (book) {
                    // Add a data attribute with the value of the author to the <a> element.
                    // resultsList += `<li style="cursor: default;"><a class='dropdown-item' data-book-id="${book.id}" data-book-title="${book.book_title}">${book.book_title}</a></li>`;
                });

                // Insert the complete list of results in #authorOptions after all authors have been processed
                $("#bookOptions").html(resultsList);

                // Click event on <a> elements.
                $("#bookOptions li a").on("click", function () {
                    const selectBook = document.getElementById('selectBook');
                    selectBook.classList.remove('show');
                    // Get the value of the data-author-id attribute
                    var bookId = $(this).data("book-id");
                    var bookTitle = $(this).data("book-title");
                    // Assign the value to the input "author_name" and the id to the input "author_id".
                    $("#book_title").val(bookTitle);
                    $("#book_id").val(bookId);
                });
            });
    }

</script>
