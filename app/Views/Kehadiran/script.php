<script>
    function refresh_peserta_hadir(keyword, page, gereja, kolom, sort) {
        $.ajax({
            url: method_url('Kehadiran', 'refresh_tabel_peserta_hadir'),
            data: {
                keyword: keyword,
                page: page,
                gereja: gereja,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-peserta_hadir').html(data);
            }
        });
    }

    $(document).ready(function() {
        $('.cek_hadir').on('change', function() {
            const id = $(this).data('id');
            let hadir;
            if ($(this).is(":checked")) {
                hadir = 1
            } else {
                hadir = 0
            }
            $.ajax({
                url: method_url('Kehadiran', 'update_kehadiran'),
                data: {
                    id: id,
                    hadir: hadir,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {}
            });
        });
        $('#list_gereja-peserta_hadir').on('change', function() {
            refresh_peserta_hadir($('#keyword-peserta_hadir').val(), 1, $(this).val(), $('#kolom-peserta_hadir').val(), $('#sort-peserta_hadir').val());
        });
        $('#keyword-peserta_hadir').on('keyup', function() {
            refresh_peserta_hadir($(this).val(), 1, $('#list_gereja-peserta_hadir').val(), $('#kolom-peserta_hadir').val(), $('#sort-peserta_hadir').val());
        });
        $(".link-peserta_hadir").on('click', function() {
            refresh_peserta_hadir($('#keyword-peserta_hadir').val(), $(this).data('page'), $('#list_gereja-peserta_hadir').val(), $('#kolom-peserta_hadir').val(), $('#sort-peserta_hadir').val());
        });
        $(".sort-order-hadir").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta_hadir').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta_hadir($('#keyword-peserta_hadir').val(), 1, $('#list_gereja-peserta_hadir').val(), $(this).data('kolom'), sort);
        });
    });
</script>