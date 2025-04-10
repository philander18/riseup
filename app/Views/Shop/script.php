<script>
    function refresh_rekap_orderan(keyword, page, kolom, sort, awal, akhir) {
        $.ajax({
            url: method_url('Shop', 'refresh_rekap_orderan'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
                awal: awal,
                akhir: akhir,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-rekap_orderan').html(data);
            }
        });
    }

    function refresh_rekap_batch0(keyword, page, kolom, sort, awal, akhir) {
        $.ajax({
            url: method_url('Shop', 'refresh_rekap_orderan'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
                awal: awal,
                akhir: akhir,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-rekap_batch0').html(data);
            }
        });
    }

    function refresh_order_belum_lunas(keyword, page, kolom, sort, awal, akhir) {
        $.ajax({
            url: method_url('Shop', 'refresh_order_belum_lunas'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
                awal: awal,
                akhir: akhir,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-order_belum_lunas').html(data);
            }
        });
    }

    function refresh_order_lunas(keyword, page, kolom, sort, awal, akhir) {
        $.ajax({
            url: method_url('Shop', 'refresh_order_lunas'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
                awal: awal,
                akhir: akhir,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-order_lunas').html(data);
            }
        });
    }

    function refresh_batch0(keyword, page, kolom, sort, awal, akhir) {
        $.ajax({
            url: method_url('Shop', 'refresh_order_lunas'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
                awal: awal,
                akhir: akhir,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-batch0').html(data);
            }
        });
    }

    function hapus_order(kode) {
        let result = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (result) {
            $.ajax({
                url: method_url('Shop', 'hapus_order'),
                data: {
                    kode: kode,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    const date1 = new Date("2025-03-19T00:00:00");
                    const awal = Math.floor(date1.getTime() / 1000);
                    const date2 = new Date("2025-04-11T00:00:00");
                    const akhir = Math.floor(date2.getTime() / 1000);
                    refresh_order_belum_lunas('', 1, $('#kolom-order_belum_lunas').val(), $('#sort-order_belum_lunas').val(), awal, akhir);
                    alert("Data berhasil dihapus.");
                }
            });
        } else {
            alert("Penghapusan dibatalkan.");
        }
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
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_order_belum_lunas($(this).val(), 1, $('#kolom-order_belum_lunas').val(), $('#sort-order_belum_lunas').val(), awal, akhir);
        });
        $(".link-order_belum_lunas").on('click', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_order_belum_lunas($('#keyword-order_belum_lunas').val(), $(this).data('page'), $('#kolom-order_belum_lunas').val(), $('#sort-order_belum_lunas').val(), awal, akhir);
        });
        $(".sort-order_belum_lunas").on('click', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
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
            refresh_order_belum_lunas($('#keyword-order_belum_lunas').val(), 1, $(this).data('kolom'), sort, awal, akhir);
        });
        $('#keyword-order_lunas').on('keyup', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_order_lunas($(this).val(), 1, $('#kolom-order_lunas').val(), $('#sort-order_lunas').val(), awal, akhir);
        });
        $(".link-order_lunas").on('click', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_order_lunas($('#keyword-order_lunas').val(), $(this).data('page'), $('#kolom-order_lunas').val(), $('#sort-order_lunas').val(), awal, akhir);
        });
        $(".sort-order_lunas").on('click', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
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
            refresh_order_lunas($('#keyword-order_lunas').val(), 1, $(this).data('kolom'), sort, awal, akhir);
        });
        $('#keyword-batch0').on('keyup', function() {
            const date1 = new Date("2025-03-03T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-03-19T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_batch0($(this).val(), 1, $('#kolom-batch0').val(), $('#sort-batch0').val(), awal, akhir);
        });
        $(".link-batch0").on('click', function() {
            const date1 = new Date("2025-03-03T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-03-19T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_batch0($('#keyword-batch0').val(), $(this).data('page'), $('#kolom-batch0').val(), $('#sort-batch0').val(), awal, akhir);
        });
        $(".sort-batch0").on('click', function() {
            const date1 = new Date("2025-03-03T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-03-19T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-batch0').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_batch0($('#keyword-batch0').val(), 1, $(this).data('kolom'), sort, awal, akhir);
        });
        $('#keyword-rekap_orderan').on('keyup', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_rekap_orderan($(this).val(), 1, $('#kolom-rekap_orderan').val(), $('#sort-rekap_orderan').val(), awal, akhir);
        });
        $(".link-rekap_orderan").on('click', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_rekap_orderan($('#keyword-rekap_orderan').val(), $(this).data('page'), $('#kolom-rekap_orderan').val(), $('#sort-rekap_orderan').val(), awal, akhir);
        });
        $(".sort-rekap_orderan").on('click', function() {
            const date1 = new Date("2025-03-19T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-04-12T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
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
            refresh_rekap_orderan($('#keyword-rekap_orderan').val(), 1, $(this).data('kolom'), sort, awal, akhir);
        });
        $('#keyword-rekap_batch0').on('keyup', function() {
            const date1 = new Date("2025-03-03T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-03-19T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_rekap_batch0($(this).val(), 1, $('#kolom-rekap_batch0').val(), $('#sort-rekap_batch0').val(), awal, akhir);
        });
        $(".link-rekap_batch0").on('click', function() {
            const date1 = new Date("2025-03-03T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-03-19T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            refresh_rekap_batch0($('#keyword-rekap_batch0').val(), $(this).data('page'), $('#kolom-rekap_batch0').val(), $('#sort-rekap_batch0').val(), awal, akhir);
        });
        $(".sort-rekap_batch0").on('click', function() {
            const date1 = new Date("2025-03-03T00:00:00");
            const awal = Math.floor(date1.getTime() / 1000);
            const date2 = new Date("2025-03-19T00:00:00");
            const akhir = Math.floor(date2.getTime() / 1000);
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-rekap_batch0').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_rekap_batch0($('#keyword-rekap_batch0').val(), 1, $(this).data('kolom'), sort, awal, akhir);
        });
    });
</script>