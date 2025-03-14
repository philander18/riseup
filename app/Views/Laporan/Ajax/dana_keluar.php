<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-dana_keluar" style="vertical-align:middle">
            <th class="text-center sort-order-dana-keluar" data-kolom="deskripsi" data-sort="<?= $sort_dana_keluar; ?>">Nama/Instansi
                <?php if ($kolom_dana_keluar == 'deskripsi') : ?>
                    <?php if ($sort_dana_keluar == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-dana-keluar" data-kolom="jumlah" data-sort="<?= $sort_dana_keluar; ?>">Jumlah
                <?php if ($kolom_dana_keluar == 'jumlah') : ?>
                    <?php if ($sort_dana_keluar == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-dana-keluar" data-kolom="tanggal" data-sort="<?= $sort_dana_keluar; ?>">Tanggal
                <?php if ($kolom_dana_keluar == 'tanggal') : ?>
                    <?php if ($sort_dana_keluar == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dana_keluar as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["deskripsi"]; ?>
                    <a href="" x-show="['bendahara', 'ketua'].includes(akses)" class="px-2" @click.prevent="hapus_dana(<?= $row["id"]; ?>);"><i class="fa-solid fa-trash-can"></i></a>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= number_format($row["jumlah"], 0, ',', '.'); ?>
                </td>
                <td class="text-center align-middle m-1 p-1">
                    <?= $row["tanggal"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if ($dana_keluar) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_dana_keluar['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_keluar" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_dana_keluar['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_keluar" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_dana_keluar['number'] as $number) : ?>
                <li class="page-item <?= $pagination_dana_keluar['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-dana_keluar" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_dana_keluar['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_keluar" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_dana_keluar['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_keluar" aria-label="<?= $last_dana_keluar; ?>" id="last" name="last" data-page="<?= $last_dana_keluar; ?>">
                        <span aria-hidden="true"><?= $last_dana_keluar; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-dana_keluar" value="<?= $kolom_dana_keluar; ?>">
<input type="hidden" id="sort-dana_keluar" value="<?= $sort_dana_keluar; ?>">
<script>
    $(document).ready(function() {
        $('.modal-detail-dana').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: method_url('laporan', 'get_detail_dana'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-dana').html(data);
                }
            });
        });
        $(".link-dana_keluar").on('click', function() {
            refresh_dana_keluar($('#keyword-dana_keluar').val(), $(this).data('page'), $('#list_kategori_dana_keluar').val(), $('#kolom-dana_keluar').val(), $('#sort-dana_keluar').val());
        });
        $(".sort-order-dana-keluar").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-dana_keluar').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_dana_keluar($('#keyword-dana_keluar').val(), 1, $('#list_kategori_dana_keluar').val(), $(this).data('kolom'), sort);
        });
    });
</script>