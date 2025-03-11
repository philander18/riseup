<script>
    function refresh_rekap_orderan(keyword, page, kolom, sort) {
        $.ajax({
            url: method_url('Shop', 'refresh_rekap_orderan'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-rekap_orderan').html(data);
            }
        });
    }

    function refresh_order_belum_lunas(keyword, page, kolom, sort) {
        $.ajax({
            url: method_url('Shop', 'refresh_order_belum_lunas'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-order_belum_lunas').html(data);
            }
        });
    }

    function refresh_order_lunas(keyword, page, kolom, sort) {
        $.ajax({
            url: method_url('Shop', 'refresh_order_lunas'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-order_lunas').html(data);
            }
        });
    }
    $(document).ready(function() {
        $("#modal-shop").modal('show');
        $('.modal-detail-produk').on('click', function() {
            const kode = $(this).data('kode');
            $.ajax({
                url: method_url('shop', 'get_detail_produk'),
                data: {
                    kode: kode,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-produk').html(data);
                }
            });
        });
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
        $('#keyword-order_belum_lunas').on('keyup', function() {
            refresh_order_belum_lunas($(this).val(), 1, $('#kolom-order_belum_lunas').val(), $('#sort-order_belum_lunas').val());
        });
        $(".link-order_belum_lunas").on('click', function() {
            refresh_order_belum_lunas($('#keyword-order_belum_lunas').val(), $(this).data('page'), $('#kolom-order_belum_lunas').val(), $('#sort-order_belum_lunas').val());
        });
        $(".sort-order_belum_lunas").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-order_belum_lunas').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_order_belum_lunas($('#keyword-order_belum_lunas').val(), 1, $(this).data('kolom'), sort);
        });
        $('#keyword-order_lunas').on('keyup', function() {
            refresh_order_lunas($(this).val(), 1, $('#kolom-order_lunas').val(), $('#sort-order_lunas').val());
        });
        $(".link-order_lunas").on('click', function() {
            refresh_order_lunas($('#keyword-order_lunas').val(), $(this).data('page'), $('#kolom-order_lunas').val(), $('#sort-order_lunas').val());
        });
        $(".sort-order_lunas").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-order_lunas').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_order_lunas($('#keyword-order_lunas').val(), 1, $(this).data('kolom'), sort);
        });
        $('#keyword-rekap_orderan').on('keyup', function() {
            refresh_rekap_orderan($(this).val(), 1, $('#kolom-rekap_orderan').val(), $('#sort-rekap_orderan').val());
        });
        $(".link-rekap_orderan").on('click', function() {
            refresh_rekap_orderan($('#keyword-rekap_orderan').val(), $(this).data('page'), $('#kolom-rekap_orderan').val(), $('#sort-rekap_orderan').val());
        });
        $(".sort-rekap_orderan").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-rekap_orderan').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_rekap_orderan($('#keyword-rekap_orderan').val(), 1, $(this).data('kolom'), sort);
        });
        setTimeout(function() {
            var swiper = new Swiper('.swiper', {
                loop: document.querySelectorAll('.swiper-slide').length > 1,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }, 1000);
    });
</script>