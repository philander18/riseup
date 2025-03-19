<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-batch0" style="vertical-align:middle">
            <th class="text-center sort-batch0" data-kolom="kode" data-sort="<?= $sort_batch0; ?>">Kode
                <?php if ($kolom_batch0 == 'kode') : ?>
                    <?php if ($sort_batch0 == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-batch0" data-kolom="nama" data-sort="<?= $sort_batch0; ?>">Nama
                <?php if ($kolom_batch0 == 'nama') : ?>
                    <?php if ($sort_batch0 == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-batch0" data-kolom="tanggal" data-sort="<?= $sort_batch0; ?>">Waktu
                <?php if ($kolom_batch0 == 'tanggal') : ?>
                    <?php if ($sort_batch0 == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($batch0 as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1" style="width: 6.9em;">
                    <a href="" class="link-primary modal-detail-order" data-bs-toggle="modal" data-bs-target="#detail-order" data-kode="<?= $row["kode"]; ?>">
                        <?= $row["kode"]; ?>
                    </a>

                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["nama"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1" style="width: 10.9em;">
                    <?= date("Y-m-d H:i:s", $row["tanggal"]); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($batch0) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_batch0['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-batch0" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_batch0['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-batch0" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_batch0['number'] as $number) : ?>
                <li class="page-item <?= $pagination_batch0['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-batch0" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_batch0['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-batch0" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_batch0['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-batch0" aria-label="<?= $last_batch0; ?>" id="last" name="last" data-page="<?= $last_batch0; ?>">
                        <span aria-hidden="true"><?= $last_batch0; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-batch0" value="<?= $kolom_batch0; ?>">
<input type="hidden" id="sort-batch0" value="<?= $sort_batch0; ?>">
<script>
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
</script>