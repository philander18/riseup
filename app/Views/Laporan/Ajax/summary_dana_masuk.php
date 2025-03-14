<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-summary_dana_masuk" style="vertical-align:middle">
            <th class="text-center sort-order-summary-dana-masuk" data-kolom="kategori" data-sort="<?= $sort_summary_dana_masuk; ?>">Kategori
                <?php if ($kolom_summary_dana_masuk == 'kategori') : ?>
                    <?php if ($sort_summary_dana_masuk == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-summary-dana-masuk" data-kolom="jumlah" data-sort="<?= $sort_summary_dana_masuk; ?>">Jumlah
                <?php if ($kolom_summary_dana_masuk == 'jumlah') : ?>
                    <?php if ($sort_summary_dana_masuk == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $total_dana_masuk = 0;
        foreach ($summary_dana_masuk as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["kategori"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= number_format($row["jumlah"], 0, ',', '.');
                    $total_dana_masuk += $row["jumlah"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td class="text-center align-middle m-1 p-1 fw-bold bg-success">
                <strong>Total</strong>
            </td>
            <td class="text-center align-middle m-1 p-1 fw-bold bg-success">
                <strong><?= number_format($total_dana_masuk, 0, ',', '.'); ?></strong>
            </td>
        </tr>
    </tfoot>
</table>
<?php if ($summary_dana_masuk) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_summary_dana_masuk['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_masuk" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_summary_dana_masuk['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_masuk" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_summary_dana_masuk['number'] as $number) : ?>
                <li class="page-item <?= $pagination_summary_dana_masuk['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-summary_dana_masuk" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_summary_dana_masuk['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_masuk" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_summary_dana_masuk['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_masuk" aria-label="<?= $last_summary_dana_masuk; ?>" id="last" name="last" data-page="<?= $last_summary_dana_masuk; ?>">
                        <span aria-hidden="true"><?= $last_summary_dana_masuk; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-summary_dana_masuk" value="<?= $kolom_summary_dana_masuk; ?>">
<input type="hidden" id="sort-summary_dana_masuk" value="<?= $sort_summary_dana_masuk; ?>">
<script>
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
</script>