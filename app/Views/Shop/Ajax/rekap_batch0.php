<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-rekap_batch0" style="vertical-align:middle">
            <th class="text-center sort-rekap_batch0" data-kolom="produk" data-sort="<?= $sort_rekap_batch0; ?>">Produk
                <?php if ($kolom_rekap_batch0 == 'produk') : ?>
                    <?php if ($sort_rekap_batch0 == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-rekap_batch0" data-kolom="jumlah" data-sort="<?= $sort_rekap_batch0; ?>">Jumlah
                <?php if ($kolom_rekap_batch0 == 'jumlah') : ?>
                    <?php if ($sort_rekap_batch0 == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rekap_batch0 as $row) : ?>
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
<?php if ($rekap_batch0) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_rekap_batch0['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_batch0" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_rekap_batch0['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_batch0" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_rekap_batch0['number'] as $number) : ?>
                <li class="page-item <?= $pagination_rekap_batch0['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-rekap_batch0" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_rekap_batch0['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_batch0" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_rekap_batch0['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-rekap_batch0" aria-label="<?= $last_rekap_batch0; ?>" id="last" name="last" data-page="<?= $last_rekap_batch0; ?>">
                        <span aria-hidden="true"><?= $last_rekap_batch0; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-rekap_batch0" value="<?= $kolom_rekap_batch0; ?>">
<input type="hidden" id="sort-rekap_batch0" value="<?= $sort_rekap_batch0; ?>">
<script>
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
</script>