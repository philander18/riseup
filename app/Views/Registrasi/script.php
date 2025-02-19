<script>
    function tombol_registrasi() {
        if ($('#nama').val() != '' && ((($('#gereja').val() != '' && $('#gereja').val() != 'lainnya')) || (($('#gereja').val() == 'lainnya' && $('#gerejaLainInput').val() != ''))) && $('#harapan').val() != '') {
            $('.submit-registrasi').prop('disabled', false);
        } else {
            $('.submit-registrasi').prop('disabled', true);
        }
    }

    function tampil_flash() {
        $.ajax({
            url: method_url('Home', 'flash'),
            data: {},
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.flash').html(data);
            }
        });
    }

    function refresh_peserta_verifikasi(keyword, page, gereja, kolom, sort) {
        $.ajax({
            url: method_url('Registrasi', 'refresh_tabel_peserta_verifikasi'),
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
                $('.tabel-peserta_verifikasi').html(data);
            }
        });
    }
    $(document).ready(function() {
        $('#gereja').change(function() {
            if ($(this).val() === 'lainnya') {
                $("#gerejaLain").addClass('active');
            } else {
                $("#gerejaLain").removeClass('active');
            }
        });

        $('#nama, #gereja, #harapan, #gerejaLainInput').on('change', function() {
            tombol_registrasi();
        });

        $('#submit-registrasi').on('click', function() {
            const nama = $('#nama').val(),
                harapan = $('#harapan').val();
            if ($('#gereja').val() == 'lainnya') {
                var gereja = $('#gerejaLainInput').val();
            } else {
                var gereja = $('#gereja').val();
            }
            $.ajax({
                url: method_url('Registrasi', 'input_peserta'),
                data: {
                    nama: nama,
                    gereja: gereja,
                    harapan: harapan,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.flash').html(data);
                    $('#nama').val('');
                    $('#gereja').val('');
                    $("#gerejaLain").removeClass('active');
                    $('#gerejaLainInput').val('');
                    $('#harapan').val('');
                    tombol_registrasi();
                }
            });
        });
        $('#list_gereja-peserta_verifikasi').on('change', function() {
            refresh_peserta_verifikasi($('#keyword-peserta_verifikasi').val(), 1, $(this).val(), $('#kolom-peserta_verifikasi').val(), $('#sort-peserta_verifikasi').val());
        });
        $('#keyword-peserta_verifikasi').on('keyup', function() {
            refresh_peserta_verifikasi($(this).val(), 1, $('#list_gereja-peserta_verifikasi').val(), $('#kolom-peserta_verifikasi').val(), $('#sort-peserta_verifikasi').val());
        });
        $(".link-peserta_verifikasi").on('click', function() {
            refresh_peserta_verifikasi($('#keyword-peserta_verifikasi').val(), $(this).data('page'), $('#list_gereja-peserta_verifikasi').val(), $('#kolom-peserta_verifikasi').val(), $('#sort-peserta_verifikasi').val());
        });
        $(".sort-order").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta_verifikasi').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta_verifikasi($('#keyword-peserta_verifikasi').val(), 1, $('#list_gereja-peserta_verifikasi').val(), $(this).data('kolom'), sort);
        });
    });
</script>