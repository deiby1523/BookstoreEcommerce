<script>
    $(document).ready(function () {
        $('#falseinput1').click(function () {
            $("#fileinput1").click();
        });

        $('#falseinput2').click(function () {
            $("#fileinput2").click();
        });
    });

    $('#fileinput1').change(function () {
        $('#selected_filename1').text($('#fileinput1')[0].files[0].name);
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#section_img_1').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    $('#fileinput2').change(function () {
        $('#selected_filename2').text($('#fileinput2')[0].files[0].name);
        let reader2 = new FileReader();
        reader2.onload = (e) => {
            $('#section_img_2').attr('src', e.target.result);
        }
        reader2.readAsDataURL(this.files[0]);
    });

</script>
