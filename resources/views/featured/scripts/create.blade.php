<script>
    $(document).ready(function () {
        $('#falseinput').click(function () {
            $("#fileinput").click();
        });
    });
    $('#fileinput').change(function () {
        $('#selected_filename').text($('#fileinput')[0].files[0].name);
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#category_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
</script>
