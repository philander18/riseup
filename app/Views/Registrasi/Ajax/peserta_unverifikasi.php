<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-peserta_unverifikasi" style="vertical-align:middle">
            <th class="text-center sort-order-unverifikasi" data-kolom="nama" data-sort="<?= $sort_peserta_unverifikasi; ?>">Nama
                <?php if ($kolom_peserta_unverifikasi == 'nama') : ?>
                    <?php if ($sort_peserta_unverifikasi == 'ASC') : ?>
                        <span class="ms-2"><i data-feather="arrow-down"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i data-feather="arrow-up"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-unverifikasi" data-kolom="gereja" data-sort="<?= $sort_peserta_unverifikasi; ?>">Gereja
                <?php if ($kolom_peserta_unverifikasi == 'gereja') : ?>
                    <?php if ($sort_peserta_unverifikasi == 'ASC') : ?>
                        <span class="ms-2"><i data-feather="arrow-down"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i data-feather="arrow-up"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peserta_unverifikasi as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["nama"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["gereja"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($peserta_unverifikasi) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_peserta_unverifikasi['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_unverifikasi" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_peserta_unverifikasi['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_unverifikasi" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_peserta_unverifikasi['number'] as $number) : ?>
                <li class="page-item <?= $pagination_peserta_unverifikasi['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-peserta_unverifikasi" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_peserta_unverifikasi['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_unverifikasi" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_peserta_unverifikasi['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_unverifikasi" aria-label="<?= $last_peserta_unverifikasi; ?>" id="last" name="last" data-page="<?= $last_peserta_unverifikasi; ?>">
                        <span aria-hidden="true"><?= $last_peserta_unverifikasi; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-peserta_unverifikasi" value="<?= $kolom_peserta_unverifikasi; ?>">
<input type="hidden" id="sort-peserta_unverifikasi" value="<?= $sort_peserta_unverifikasi; ?>">
<script>
    $(document).ready(function() {
        feather.replace();
        $(".link-peserta_unverifikasi").on('click', function() {
            refresh_peserta_unverifikasi($('#keyword-peserta_unverifikasi').val(), $(this).data('page'), $('#list_gereja-peserta_unverifikasi').val(), $('#kolom-peserta_unverifikasi').val(), $('#sort-peserta_unverifikasi').val());
        });
        $(".sort-order-unverifikasi").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta_unverifikasi').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta_unverifikasi($('#keyword-peserta_unverifikasi').val(), 1, $('#list_gereja-peserta_unverifikasi').val(), $(this).data('kolom'), sort);
        });
    });
</script>