<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-peserta_verifikasi" style="vertical-align:middle">
            <th class="text-center sort-order-verifikasi" data-kolom="nama" data-sort="<?= $sort_peserta_verifikasi; ?>">Nama
                <?php if ($kolom_peserta_verifikasi == 'nama') : ?>
                    <?php if ($sort_peserta_verifikasi == 'ASC') : ?>
                        <span class="ms-2"><i data-feather="arrow-down"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i data-feather="arrow-up"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-verifikasi" data-kolom="gereja" data-sort="<?= $sort_peserta_verifikasi; ?>">Gereja
                <?php if ($kolom_peserta_verifikasi == 'gereja') : ?>
                    <?php if ($sort_peserta_verifikasi == 'ASC') : ?>
                        <span class="ms-2"><i data-feather="arrow-down"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i data-feather="arrow-up"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($peserta_verifikasi as $row) : ?>
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
<?php if ($peserta_verifikasi) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_peserta_verifikasi['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_verifikasi" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_peserta_verifikasi['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_verifikasi" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_peserta_verifikasi['number'] as $number) : ?>
                <li class="page-item <?= $pagination_peserta_verifikasi['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-peserta_verifikasi" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_peserta_verifikasi['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_verifikasi" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_peserta_verifikasi['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-peserta_verifikasi" aria-label="<?= $last_peserta_verifikasi; ?>" id="last" name="last" data-page="<?= $last_peserta_verifikasi; ?>">
                        <span aria-hidden="true"><?= $last_peserta_verifikasi; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-peserta_verifikasi" value="<?= $kolom_peserta_verifikasi; ?>">
<input type="hidden" id="sort-peserta_verifikasi" value="<?= $sort_peserta_verifikasi; ?>">
<script>
    $(document).ready(function() {
        $(".link-peserta_verifikasi").on('click', function() {
            refresh_peserta_verifikasi($('#keyword-peserta_verifikasi').val(), $(this).data('page'), $('#list_gereja-peserta_verifikasi').val(), $('#kolom-peserta_verifikasi').val(), $('#sort-peserta_verifikasi').val());
        });
        $(".sort-order-verifikasi").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta_verifikasi').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta_verifikasi($('#keyword-peserta_verifikasi').val(), 1, $('#list_gereja-peserta_verifikasi').val(), $(this).data('kolom'), sort);
        });
    });
</script>