<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-peserta_summary" style="vertical-align:middle">
            <th class="text-center sort-order-summary" data-kolom="gereja" data-sort="<?= $sort_peserta_summary; ?>">Gereja
                <?php if ($kolom_peserta_summary == 'gereja') : ?>
                    <?php if ($sort_peserta_summary == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-summary" data-kolom="jumlah" data-sort="<?= $sort_peserta_summary; ?>">Jumlah
                <?php if ($kolom_peserta_summary == 'jumlah') : ?>
                    <?php if ($sort_peserta_summary == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peserta_summary as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["gereja"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["jumlah"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($peserta_summary) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_peserta_summary['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_summary" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_peserta_summary['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_summary" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_peserta_summary['number'] as $number) : ?>
                <li class="page-item <?= $pagination_peserta_summary['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-peserta_summary" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_peserta_summary['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_summary" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_peserta_summary['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_summary" aria-label="<?= $last_peserta_summary; ?>" id="last" name="last" data-page="<?= $last_peserta_summary; ?>">
                        <span aria-hidden="true"><?= $last_peserta_summary; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-peserta_summary" value="<?= $kolom_peserta_summary; ?>">
<input type="hidden" id="sort-peserta_summary" value="<?= $sort_peserta_summary; ?>">
<script>
    $(document).ready(function() {
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