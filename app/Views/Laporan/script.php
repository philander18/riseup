<script>
    function tombol_dana_masuk() {
        if ($('#nama-dana-masuk').val() != '' && $('#kategori-dana-masuk').val() != '' && $('#jumlah-dana-masuk').val() != '' && $('#catatan-dana-masuk').val() != '') {
            $('.submit-dana-masuk').prop('disabled', false);
        } else {
            $('.submit-dana-masuk').prop('disabled', true);
        }
    }

    function reset_form_dana_masuk() {
        $('#nama-dana-masuk').val('');
        $('#kategori-dana-masuk').val('');
        $('#jumlah-dana-masuk').val('');
        $('#catatan-dana-masuk').val('');
        $('#tanggal-dana-masuk').val(<?= date('Y-m-d'); ?>);
        $('#bukti-dana-masuk').val('');
    }

    $(document).ready(function() {
        $('.modal-detail-dana').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: method_url('laporan', 'get_detail_dana'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-dana').html(data);
                }
            });
        });
    });
</script>