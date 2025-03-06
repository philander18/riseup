<script>
    $(document).ready(function() {
        $('#checkout').on('click', function() {
            const kode = <?= time(); ?>,
                nama = $('#nama-pelanggan').val(),
                pengiriman = $('#pengiriman-pelanggan').val();
            if (pengiriman == 'pribadi') {
                var hp = $('#hp-pelanggan').val(),
                    alamat = $('#alamat-pelanggan').val(),
                    gereja = null
            } else {
                var hp = null,
                    alamat = null,
                    gereja = $('#gereja-pelanggan').val()
            }
            items = $('#data-item').val();
            $.ajax({
                url: method_url('Shop', 'input_orderan'),
                data: {
                    kode: kode,
                    nama: nama,
                    pengiriman: pengiriman,
                    hp: hp,
                    alamat: alamat,
                    gereja: gereja,
                    items: items,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    console.log('berhasil');
                }
            });
        });
    });
</script>