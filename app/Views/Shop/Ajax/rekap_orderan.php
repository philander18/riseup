<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-rekap_orderan" style="vertical-align:middle">
            <th class="text-center sort-rekap_orderan" data-kolom="produk" data-sort="<?= $sort_rekap_orderan; ?>">Produk
                <?php if ($kolom_rekap_orderan == 'produk') : ?>
                    <?php if ($sort_rekap_orderan == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-rekap_orderan" data-kolom="jumlah" data-sort="<?= $sort_rekap_orderan; ?>">Jumlah
                <?php if ($kolom_rekap_orderan == 'jumlah') : ?>
                    <?php if ($sort_rekap_orderan == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rekap_orderan as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["produk"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["jumlah"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($rekap_orderan) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_rekap_orderan['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_orderan" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_rekap_orderan['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_orderan" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_rekap_orderan['number'] as $number) : ?>
                <li class="page-item <?= $pagination_rekap_orderan['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-rekap_orderan" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_rekap_orderan['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_orderan" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_rekap_orderan['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_orderan" aria-label="<?= $last_rekap_orderan; ?>" id="last" name="last" data-page="<?= $last_rekap_orderan; ?>">
                        <span aria-hidden="true"><?= $last_rekap_orderan; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-rekap_orderan" value="<?= $kolom_rekap_orderan; ?>">
<input type="hidden" id="sort-rekap_orderan" value="<?= $sort_rekap_orderan; ?>">
<script>
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
</script>