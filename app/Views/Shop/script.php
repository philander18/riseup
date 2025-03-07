<script>
    $(document).ready(function() {
        $('.modal-detail-order').on('click', function() {
            const kode = $(this).data('kode');
            $.ajax({
                url: method_url('shop', 'get_detail_order'),
                data: {
                    kode: kode,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-order').html(data);
                }
            });
        });
    });
</script>