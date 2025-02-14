<script>
    function tombol_registrasi() {
        if ($('#nama').val() != '' && $('#hp').val() != '' && $('#umur').val() != null && $('#gereja').val() != null && $('#harapan').val() != '') {
            $('.submit-registrasi').prop('disabled', false);
        } else {
            $('.submit-registrasi').prop('disabled', true);
        }
    }
    $(document).ready(function() {
        $('#gereja').change(function() {
            if ($(this).val() === 'lainnya') {
                $("#gerejaLain").addClass('active');
            } else {
                $("#gerejaLain").removeClass('active');
            }
        });

        $('#nama, #hp, #umur, #gereja, #harapan').on('change', function() {
            tombol_registrasi();
        });

    });
</script>