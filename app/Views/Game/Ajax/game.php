<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-game" style="vertical-align:middle">
            <th class="text-center sort-game" data-kolom="kode" data-sort="<?= $sort_game; ?>">Kode
                <?php if ($kolom_game == 'kode') : ?>
                    <?php if ($sort_game == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-game" data-kolom="nama" data-sort="<?= $sort_game; ?>">Nama
                <?php if ($kolom_game == 'nama') : ?>
                    <?php if ($sort_game == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-game" data-kolom="tanggal" data-sort="<?= $sort_game; ?>">Waktu
                <?php if ($kolom_game == 'tanggal') : ?>
                    <?php if ($sort_game == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($game as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <a href="" class="link-primary modal-detail-order" data-bs-toggle="modal" data-bs-target="#detail-order" data-kode="<?= $row["kode"]; ?>">
                        <?= $row["kode"]; ?>
                    </a>

                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["nama"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= date("Y-m-d H:i:s", $row["tanggal"]); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($game) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_game['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-game" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_game['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-game" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_game['number'] as $number) : ?>
                <li class="page-item <?= $pagination_game['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-game" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_game['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-game" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_game['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-game" aria-label="<?= $last_game; ?>" id="last" name="last" data-page="<?= $last_game; ?>">
                        <span aria-hidden="true"><?= $last_game; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-game" value="<?= $kolom_game; ?>">
<input type="hidden" id="sort-game" value="<?= $sort_game; ?>">
<script>
    $('.modal-game').on('click', function() {
        const kode = $(this).data('kode');
        $.ajax({
            url: method_url('shop', 'get_detail_pemenang'),
            data: {
                kode: kode,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.isi-detail-pemenang').html(data);
            }
        });
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
</script>