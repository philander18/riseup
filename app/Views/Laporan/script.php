<script>
    function tombol_dana_masuk() {
        if ($('#nama-dana-masuk').val() != '' && $('#kategori-dana-masuk').val() != '' && $('#jumlah-dana-masuk').val() != '' && $('#catatan-dana-masuk').val() != '') {
            $('.submit-dana-masuk').prop('disabled', false);
        } else {
            $('.submit-dana-masuk').prop('disabled', true);
        }
    }

    function refresh_dana_masuk(keyword, page, kategori, kolom, sort) {
        $.ajax({
            url: method_url('Laporan', 'refresh_dana_masuk'),
            data: {
                keyword: keyword,
                page: page,
                kategori: kategori,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-dana_masuk').html(data);
            }
        });
    }

    function refresh_summary_dana_masuk(keyword, page, kolom, sort) {
        $.ajax({
            url: method_url('Laporan', 'refresh_summary_dana_masuk'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-summary_dana_masuk').html(data);
            }
        });
    }

    function refresh_dana_keluar(keyword, page, kategori, kolom, sort) {
        $.ajax({
            url: method_url('Laporan', 'refresh_dana_keluar'),
            data: {
                keyword: keyword,
                page: page,
                kategori: kategori,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-dana_keluar').html(data);
            }
        });
    }

    function refresh_summary_dana_keluar(keyword, page, kolom, sort) {
        $.ajax({
            url: method_url('Laporan', 'refresh_summary_dana_keluar'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-summary_dana_keluar').html(data);
            }
        });
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
        $('#list_kategori_dana_masuk').on('change', function() {
            refresh_dana_masuk($('#keyword-dana_masuk').val(), 1, $(this).val(), $('#kolom-dana_masuk').val(), $('#sort-dana_masuk').val());
        });
        $('#keyword-dana_masuk').on('keyup', function() {
            refresh_dana_masuk($(this).val(), 1, $('#list_kategori_dana_masuk').val(), $('#kolom-dana_masuk').val(), $('#sort-dana_masuk').val());
        });
        $(".link-dana_masuk").on('click', function() {
            refresh_dana_masuk($('#keyword-dana_masuk').val(), $(this).data('page'), $('#list_kategori_dana_masuk').val(), $('#kolom-dana_masuk').val(), $('#sort-dana_masuk').val());
        });
        $(".sort-order-dana-masuk").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-dana_masuk').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_dana_masuk($('#keyword-dana_masuk').val(), 1, $('#list_kategori_dana_masuk').val(), $(this).data('kolom'), sort);
        });
        $('#keyword-summary_dana_masuk').on('keyup', function() {
            refresh_summary_dana_masuk($(this).val(), 1, $('#kolom-summary_dana_masuk').val(), $('#sort-summary_dana_masuk').val());
        });
        $(".link-summary_dana_masuk").on('click', function() {
            refresh_summary_dana_masuk($('#keyword-summary_dana_masuk').val(), $(this).data('page'), $('#kolom-summary_dana_masuk').val(), $('#sort-summary_dana_masuk').val());
        });
        $(".sort-order-summary-dana-masuk").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-summary_dana_masuk').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_summary_dana_masuk($('#keyword-summary_dana_masuk').val(), 1, $(this).data('kolom'), sort);
        });
        $('#list_kategori_dana_keluar').on('change', function() {
            refresh_dana_keluar($('#keyword-dana_keluar').val(), 1, $(this).val(), $('#kolom-dana_keluar').val(), $('#sort-dana_keluar').val());
        });
        $('#keyword-dana_keluar').on('keyup', function() {
            refresh_dana_keluar($(this).val(), 1, $('#list_kategori_dana_keluar').val(), $('#kolom-dana_keluar').val(), $('#sort-dana_keluar').val());
        });
        $(".link-dana_keluar").on('click', function() {
            refresh_dana_keluar($('#keyword-dana_keluar').val(), $(this).data('page'), $('#list_kategori_dana_keluar').val(), $('#kolom-dana_keluar').val(), $('#sort-dana_keluar').val());
        });
        $(".sort-order-dana-keluar").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-dana_keluar').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_dana_keluar($('#keyword-dana_keluar').val(), 1, $('#list_kategori_dana_keluar').val(), $(this).data('kolom'), sort);
        });
        $('#keyword-summary_dana_keluar').on('keyup', function() {
            refresh_summary_dana_keluar($(this).val(), 1, $('#kolom-summary_dana_keluar').val(), $('#sort-summary_dana_keluar').val());
        });
        $(".link-summary_dana_keluar").on('click', function() {
            refresh_summary_dana_keluar($('#keyword-summary_dana_keluar').val(), $(this).data('page'), $('#kolom-summary_dana_keluar').val(), $('#sort-summary_dana_keluar').val());
        });
        $(".sort-order-summary-dana-keluar").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-summary_dana_keluar').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_summary_dana_keluar($('#keyword-summary_dana_keluar').val(), 1, $(this).data('kolom'), sort);
        });
    });
</script>