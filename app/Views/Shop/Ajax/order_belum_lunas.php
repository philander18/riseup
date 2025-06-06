<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-order_belum_lunas" style="vertical-align:middle">
            <th class="text-center sort-order_belum_lunas" data-kolom="kode" data-sort="<?= $sort_order_belum_lunas; ?>">Kode
                <?php if ($kolom_order_belum_lunas == 'kode') : ?>
                    <?php if ($sort_order_belum_lunas == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order_belum_lunas" data-kolom="nama" data-sort="<?= $sort_order_belum_lunas; ?>">Nama
                <?php if ($kolom_order_belum_lunas == 'nama') : ?>
                    <?php if ($sort_order_belum_lunas == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order_belum_lunas" data-kolom="tanggal" data-sort="<?= $sort_order_belum_lunas; ?>">Waktu
                <?php if ($kolom_order_belum_lunas == 'tanggal') : ?>
                    <?php if ($sort_order_belum_lunas == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($order_belum_lunas as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1" style="width: 6.9em;">
                    <a href="" class="link-primary modal-detail-order" data-bs-toggle="modal" data-bs-target="#detail-order" data-kode="<?= $row["kode"]; ?>">
                        <?= $row["kode"]; ?>
                    </a>
                    <a href="" x-show="['danus', 'ketua'].includes(akses)" class="px-2" @click.prevent="hapus_order('<?= $row["kode"]; ?>');"><i class="fa-solid fa-trash-can"></i></a>
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
<?php if ($order_belum_lunas) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_order_belum_lunas['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-order_belum_lunas" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_order_belum_lunas['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-order_belum_lunas" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_order_belum_lunas['number'] as $number) : ?>
                <li class="page-item <?= $pagination_order_belum_lunas['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-order_belum_lunas" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_order_belum_lunas['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-order_belum_lunas" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_order_belum_lunas['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-order_belum_lunas" aria-label="<?= $last_order_belum_lunas; ?>" id="last" name="last" data-page="<?= $last_order_belum_lunas; ?>">
                        <span aria-hidden="true"><?= $last_order_belum_lunas; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-order_belum_lunas" value="<?= $kolom_order_belum_lunas; ?>">
<input type="hidden" id="sort-order_belum_lunas" value="<?= $sort_order_belum_lunas; ?>">
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
    $(".link-order_belum_lunas").on('click', function() {
        const date1 = new Date("2025-03-19T00:00:00");
        const awal = Math.floor(date1.getTime() / 1000);
        const date2 = new Date("2025-04-12T00:00:00");
        const akhir = Math.floor(date2.getTime() / 1000);
        refresh_order_belum_lunas($('#keyword-order_belum_lunas').val(), $(this).data('page'), $('#kolom-order_belum_lunas').val(), $('#sort-order_belum_lunas').val(), awal, akhir);
    });
    $(".sort-order_belum_lunas").on('click', function() {
        const date1 = new Date("2025-03-19T00:00:00");
        const awal = Math.floor(date1.getTime() / 1000);
        const date2 = new Date("2025-04-12T00:00:00");
        const akhir = Math.floor(date2.getTime() / 1000);
        var sort = "ASC";
        if ($(this).data('kolom') == $('#kolom-order_belum_lunas').val()) {
            if ($(this).data('sort') == 'ASC') {
                sort = "DESC";
            } else {
                sort = "ASC";
            }
        } else {
            sort = "ASC";
        }
        refresh_order_belum_lunas($('#keyword-order_belum_lunas').val(), 1, $(this).data('kolom'), sort, awal, akhir);
    });
</script>