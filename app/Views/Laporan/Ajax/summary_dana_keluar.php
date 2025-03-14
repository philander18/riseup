<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-summary_dana_keluar" style="vertical-align:middle">
            <th class="text-center sort-order-summary-dana-keluar" data-kolom="kategori" data-sort="<?= $sort_summary_dana_keluar; ?>">Kategori
                <?php if ($kolom_summary_dana_keluar == 'kategori') : ?>
                    <?php if ($sort_summary_dana_keluar == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-summary-dana-keluar" data-kolom="jumlah" data-sort="<?= $sort_summary_dana_keluar; ?>">Jumlah
                <?php if ($kolom_summary_dana_keluar == 'jumlah') : ?>
                    <?php if ($sort_summary_dana_keluar == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $total_dana_keluar = 0;
        foreach ($summary_dana_keluar as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["kategori"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= number_format($row["jumlah"], 0, ',', '.');
                    $total_dana_keluar += $row["jumlah"]; ?>
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
                <strong><?= number_format($total_dana_keluar, 0, ',', '.'); ?></strong>
            </td>
        </tr>
    </tfoot>
</table>
<?php if ($summary_dana_keluar) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_summary_dana_keluar['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_keluar" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_summary_dana_keluar['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_keluar" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_summary_dana_keluar['number'] as $number) : ?>
                <li class="page-item <?= $pagination_summary_dana_keluar['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-summary_dana_keluar" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_summary_dana_keluar['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_keluar" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_summary_dana_keluar['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-summary_dana_keluar" aria-label="<?= $last_summary_dana_keluar; ?>" id="last" name="last" data-page="<?= $last_summary_dana_keluar; ?>">
                        <span aria-hidden="true"><?= $last_summary_dana_keluar; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-summary_dana_keluar" value="<?= $kolom_summary_dana_keluar; ?>">
<input type="hidden" id="sort-summary_dana_keluar" value="<?= $sort_summary_dana_keluar; ?>">
<script>
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
</script>