<script>
    function refresh_game(keyword, page, kolom, sort) {
        $.ajax({
            url: method_url('Game', 'refresh_game'),
            data: {
                keyword: keyword,
                page: page,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-game').html(data);
            }
        });
    }
    $(document).ready(function() {
        $('.modal-game').on('click', function() {
            const kode = $(this).data('kode');
            $.ajax({
                url: method_url('Game', 'get_detail_game'),
                data: {
                    kode: kode,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-game').html(data);
                }
            });
        });
        $('#keyword-game').on('keyup', function() {
            refresh_game($(this).val(), 1, $('#kolom-game').val(), $('#sort-game').val());
        });
        $(".link-game").on('click', function() {
            refresh_game($('#keyword-game').val(), $(this).data('page'), $('#kolom-game').val(), $('#sort-game').val());
        });
        $(".sort-game").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-game').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_game($('#keyword-game').val(), 1, $(this).data('kolom'), sort);
        });
    });
</script>