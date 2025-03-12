<script>
    function tombol_dana_masuk() {
        if ($('#nama-dana-masuk').val() != '' && $('#kategori-dana-masuk').val() != '' && $('#jumlah-dana-masuk').val() != '' && $('#catatan-dana-masuk').val() != '') {
            $('.submit-dana-masuk').prop('disabled', false);
        } else {
            $('.submit-dana-masuk').prop('disabled', true);
        }
    }
</script>