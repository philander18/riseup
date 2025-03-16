<script>
    function tombol_registrasi() {
        if ($('#nama').val() != '' && $('#gender').val() != '' && ((($('#gereja').val() != '' && $('#gereja').val() != 'lainnya')) || (($('#gereja').val() == 'lainnya' && $('#gerejaLainInput').val() != ''))) && $('#harapan').val() != '') {
            $('.submit-registrasi').prop('disabled', false);
        } else {
            $('.submit-registrasi').prop('disabled', true);
        }
    }

    function kosong_form_registrasi() {
        $('#nama').val('');
        $('#gender').val('');
        $('#gereja').val('');
        $('#tahun').val('');
        $('#whatsapp').val('');
        $('#group_wa').prop('checked', false);
        $('#instagram').val('');
        $('#harapan').val('');
        $("#gerejaLain").removeClass('active');
        $('#gerejaLainInput').val('');
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

    function refresh_peserta_unverifikasi(keyword, page, gereja, kolom, sort) {
        $.ajax({
            url: method_url('Registrasi', 'refresh_tabel_peserta_unverifikasi'),
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
                $('.tabel-peserta_unverifikasi').html(data);
            }
        });
    }

    function refresh_peserta_summary(keyword, page, kolom, sort) {
        $.ajax({
            url: method_url('Registrasi', 'refresh_tabel_peserta_summary'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-peserta_summary').html(data);
            }
        });
    }
    $(document).ready(function() {
        $('#submit-registrasi').on('click', function() {
            const nama = $('#nama').val(),
                gender = $('#gender').val(),
                tahun_lahir = $('#tahun').val(),
                whatsapp = $('#whatsapp').val(),
                group_wa = $('#group_wa').val(),
                instagram = $('#instagram').val(),
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
                    gender: gender,
                    gereja: gereja,
                    tahun_lahir: tahun_lahir,
                    whatsapp: whatsapp,
                    group_wa: group_wa,
                    instagram: instagram,
                    harapan: harapan,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.flash').html(data);
                    kosong_form_registrasi();
                    tombol_registrasi();
                    refresh_peserta_verifikasi($('#keyword-peserta_verifikasi').val(), 1, $('#list_gereja-peserta_verifikasi').val(), $('#kolom-peserta_verifikasi').val(), $('#sort-peserta_verifikasi').val());
                    refresh_peserta_unverifikasi($('#keyword-peserta_unverifikasi').val(), 1, $('#list_gereja-peserta_unverifikasi').val(), $('#kolom-peserta_unverifikasi').val(), $('#sort-peserta_unverifikasi').val());
                    refresh_peserta_summary($('#keyword-peserta_summary').val(), 1, $('#kolom-peserta_summary').val(), $('#sort-peserta_summary').val());
                }
            });
        });
        $('.modal-detail-peserta').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: method_url('Registrasi', 'get_detail_peserta'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-peserta').html(data);
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
        $(".sort-order-verifikasi").on('click', function() {
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
        $('#list_gereja-peserta_unverifikasi').on('change', function() {
            refresh_peserta_unverifikasi($('#keyword-peserta_unverifikasi').val(), 1, $(this).val(), $('#kolom-peserta_unverifikasi').val(), $('#sort-peserta_unverifikasi').val());
        });
        $('#keyword-peserta_unverifikasi').on('keyup', function() {
            refresh_peserta_unverifikasi($(this).val(), 1, $('#list_gereja-peserta_unverifikasi').val(), $('#kolom-peserta_unverifikasi').val(), $('#sort-peserta_unverifikasi').val());
        });
        $(".link-peserta_unverifikasi").on('click', function() {
            refresh_peserta_unverifikasi($('#keyword-peserta_unverifikasi').val(), $(this).data('page'), $('#list_gereja-peserta_unverifikasi').val(), $('#kolom-peserta_unverifikasi').val(), $('#sort-peserta_unverifikasi').val());
        });
        $(".sort-order-unverifikasi").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta_unverifikasi').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta_unverifikasi($('#keyword-peserta_unverifikasi').val(), 1, $('#list_gereja-peserta_unverifikasi').val(), $(this).data('kolom'), sort);
        });
        $('#keyword-peserta_summary').on('keyup', function() {
            refresh_peserta_summary($(this).val(), 1, $('#kolom-peserta_summary').val(), $('#sort-peserta_summary').val());
        });
        $(".link-peserta_summary").on('click', function() {
            refresh_peserta_summary($('#keyword-peserta_summary').val(), $(this).data('page'), $('#kolom-peserta_summary').val(), $('#sort-peserta_summary').val());
        });
        $(".sort-order-summary").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta_summary').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta_summary($('#keyword-peserta_summary').val(), 1, $(this).data('kolom'), sort);
        });
    });
</script>