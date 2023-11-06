<script>

    // author
    // Event click to display the search box
    document.getElementById('author_name').addEventListener('click', function (event) {
        event.preventDefault(); // Bypasses the default behavior of the select
        var selectAuthor = document.getElementById('selectAuthor');
        selectAuthor.classList.add('show');


    });

    // publisher
    // Event click to display the search box
    document.getElementById('publisher_name').addEventListener('click', function (event) {
        event.preventDefault(); // Bypasses the default behavior of the select
        var selectPublisher = document.getElementById('selectPublisher');
        selectPublisher.classList.add('show');


    });

    // author
    // Event to close the search box if you click outside of it
    document.addEventListener('click', function (e) {
        if (!selectAuthor.contains(e.target) && e.target.id !== 'author_name') {
            selectAuthor.classList.remove('show');
        }
    });

    // publisher
    // Event to close the search box if you click outside of it
    document.addEventListener('click', function (e) {
        if (!selectPublisher.contains(e.target) && e.target.id !== 'publisher_name') {
            selectPublisher.classList.remove('show');
        }
    });


    // Publisher
    // Ajax request according to what's in the search box
    function get_authors(search) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '{{ route('author.searchSelect') }}',
            type: 'POST',
            dataType: 'json',
            data: {'search': search},
        })
            .done(function (authors) {
                var resultsList = ""; // Create a variable to store the list of results
                authors.forEach(function (author) {
                    // Add a data attribute with the value of the author to the <a> element.
                    resultsList += `<li style="cursor: default;"><a class='dropdown-item' data-author-id="${author.id}" data-author-name="${author.author_name}">${author.author_name}</a></li>`;
                });

                // Insert the complete list of results in #authorOptions after all authors have been processed
                $("#authorOptions").html(resultsList);

                // Click event on <a> elements.
                $("#authorOptions li a").on("click", function () {
                    selectAuthor.classList.remove('show');
                    // Get the value of the data-author-id attribute
                    var authorId = $(this).data("author-id");
                    var authorName = $(this).data("author-name");
                    // Assign the value to the input "author_name" and the id to the input "author_id".
                    $("#author_name").val(authorName);
                    $("#author_id").val(authorId);
                });
            });
    }

    // publisher
    // Ajax request according to what's in the search box
    function get_publishers(search) {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: '{{ route('publisher.searchSelect') }}',
            type: 'POST',
            dataType: 'json',
            data: {'search': search},
        })
            .done(function (publishers) {
                var resultsList = ""; // Create a variable to store the list of results
                publishers.forEach(function (publisher) {
                    // Add a data attribute with the value of the publisher to the <a> element.
                    resultsList += `<li style="cursor: default;"><a class='dropdown-item' data-publisher-id="${publisher.id}" data-publisher-name="${publisher.publisher_name}">${publisher.publisher_name}</a></li>`;
                });

                // Insert the complete list of results in #publisherOptions after all publishers have been processed
                $("#publisherOptions").html(resultsList);

                // Click event on <a> elements.
                $("#publisherOptions li a").on("click", function () {
                    selectPublisher.classList.remove('show');
                    // Get the value of the data-publisher-id attribute
                    var publisherId = $(this).data("publisher-id");
                    var publisherName = $(this).data("publisher-name");
                    // Assign the value to the input "publisher_name" and the id to the input "publisher_id".
                    $("#publisher_name").val(publisherName);
                    $("#publisher_id").val(publisherId);
                });
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


    // author
    // Wrapped Ajax function with debounce
    const AuthorDelayedRequest = debounce(function (search) {
        get_authors(search);
    }, 300); // 300ms delay, adjustable based on your needs

    // publisher
    // Wrapped Ajax function with debounce
    const PublisherDelayedRequest = debounce(function (search) {
        get_publishers(search);
    }, 300); // 300ms delay, adjustable based on your needs

    // author
    // 'input' event using the debounce function
    $(document).on('input', '#searchAuthor', function () {
        var searchValue = $('#searchAuthor').val();
        if (searchValue !== "") {
            AuthorDelayedRequest(searchValue);
        } else {
            $("#authorOptions").html("");
        }
    });

    // publisher
    // 'input' event using the debounce function
    $(document).on('input', '#searchPublisher', function () {
        var searchValue = $('#searchPublisher').val();
        if (searchValue !== "") {
            PublisherDelayedRequest(searchValue);
        } else {
            $("#publisherOptions").html("");
        }
    });


    // Creates a two-dimensional array with all categories and subcategories
    document.addEventListener("DOMContentLoaded", function () {
        var categorySelect = document.getElementById("category_id");
        var subcategorySelect = document.getElementById("subcategory_id");

        // Define subcategory options for each category with IDs
        var subcategoryOptions = {
            @foreach($categories as $category)
                {{$category->id}}: [
                    @foreach($category->subcategories as $subcategory)
                {
                    id: "{{$subcategory->id}}", name: "{{$subcategory->subcategory_name}}"
                },
                @endforeach
            ],

            @endforeach

        };

// Function for updating subcategory options
        function updateSubcategories() {
            var selectedCategory = categorySelect.value;
            subcategorySelect.innerHTML = ""; // Clear existing options

            if (subcategoryOptions[selectedCategory]) {
                subcategoryOptions[selectedCategory].forEach(subcategory => {
                    var option = document.createElement("option");
                    option.value = subcategory.id;
                    option.textContent = subcategory.name;
                    subcategorySelect.appendChild(option);
                });
            }
        }

// Call function on page load to load initial options
// updateSubcategories();

// Add a change event to the first select (category)
        categorySelect.addEventListener("change", updateSubcategories);

    });

    $(document).ready( function() {
        $('#falseinput').click(function(){
            $("#fileinput").click();
        });
    });
    $('#fileinput').change(function() {
        $('#selected_filename').text($('#fileinput')[0].files[0].name);
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#book_img').attr('src',e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
