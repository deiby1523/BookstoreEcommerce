<script>

    // Creates a two-dimensional array with all categories and subcategories
    document.addEventListener("DOMContentLoaded", function () {
        var typeSelect = document.getElementById("category_type");
        var categorySelect = document.getElementById("category_id");

        // Define category options for each type with IDs
        var categoryOptions = {
            0: [@foreach($categories as $category)
                    @if($category->category_type == 0)
                    {
                        id: "{{$category->id}}", name: "{{$category->category_name}}"

                    },
                    @endif
                @endforeach
            ],
            1: [@foreach($categories as $category)
                @if($category->category_type == 1)
            {
                id: "{{$category->id}}", name: "{{$category->category_name}}"

            },
                @endif
                @endforeach
            ]

        };

// Function for updating category options
        function updateCategories() {
            var selectedType = typeSelect.value;
            categorySelect.innerHTML = ""; // Clear existing options

            if (categoryOptions[selectedType]) {
                categoryOptions[selectedType].forEach(category => {
                    var option = document.createElement("option");
                    option.value = category.id;
                    option.textContent = category.name;
                    categorySelect.appendChild(option);
                });
            }
        }

// Call function on page load to load initial options
        updateCategories();

// Add a change event to the first select (type)
        typeSelect.addEventListener("change", updateCategories);

    });

</script>
