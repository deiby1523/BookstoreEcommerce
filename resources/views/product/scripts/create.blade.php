<script>


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
        updateSubcategories();

        // Add a change event to the first select (category)
        categorySelect.addEventListener("change", updateSubcategories);

    });

    $(document).ready(function () {
        $('#falseinput').click(function () {
            $("#fileinput").click();
        });
    });
    $('#fileinput').change(function () {
        $('#selected_filename').text($('#fileinput')[0].files[0].name);
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#product_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
