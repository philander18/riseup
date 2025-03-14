<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-dana_masuk" style="vertical-align:middle">
            <th class="text-center sort-order-dana-masuk" data-kolom="deskripsi" data-sort="<?= $sort_dana_masuk; ?>">Nama/Instansi
                <?php if ($kolom_dana_masuk == 'deskripsi') : ?>
                    <?php if ($sort_dana_masuk == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-dana-masuk" data-kolom="jumlah" data-sort="<?= $sort_dana_masuk; ?>">Jumlah
                <?php if ($kolom_dana_masuk == 'jumlah') : ?>
                    <?php if ($sort_dana_masuk == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
            <th class="text-center sort-order-dana-masuk" data-kolom="tanggal" data-sort="<?= $sort_dana_masuk; ?>">Tanggal
                <?php if ($kolom_dana_masuk == 'tanggal') : ?>
                    <?php if ($sort_dana_masuk == 'ASC') : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                    <?php else : ?>
                        <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                    <?php endif ?>
                <?php endif ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dana_masuk as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1">
                    <a href="" class="link-primary modal-detail-dana" data-bs-toggle="modal" data-bs-target="#detail-dana" data-id="<?= $row["id"]; ?>">
                        <?= $row["deskripsi"]; ?>
                    </a>
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
<?php if ($dana_masuk) : ?>
    <div aria-label="Page navigation">
        <ul class="pagination mb-0">
            <?php if ($pagination_dana_masuk['first']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_masuk" aria-label="First" id="first" name="first" data-page="1">
                        <span aria-hidden="false">First</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_dana_masuk['previous']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_masuk" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                        <span aria-hidden=" true">Previous</span>
                    </button>
                </li>
            <?php endif ?>
            <?php foreach ($pagination_dana_masuk['number'] as $number) : ?>
                <li class="page-item <?= $pagination_dana_masuk['page'] == $number ? 'active' : '' ?>">
                    <button class="page-link text-dark link-dana_masuk" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                        <span aria-hidden="true"><?= $number; ?></span>
                    </button>
                </li>
            <?php endforeach ?>
            <?php if ($pagination_dana_masuk['next']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_masuk" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                        <span aria-hidden=" true">Next</span>
                    </button>
                </li>
            <?php endif ?>
            <?php if ($pagination_dana_masuk['last']) : ?>
                <li class="page-item">
                    <button class="page-link text-dark link-dana_masuk" aria-label="<?= $last_dana_masuk; ?>" id="last" name="last" data-page="<?= $last_dana_masuk; ?>">
                        <span aria-hidden="true"><?= $last_dana_masuk; ?></span>
                    </button>
                </li>
            <?php endif ?>
        </ul>
    </div>
<?php endif; ?>
<input type="hidden" id="kolom-dana_masuk" value="<?= $kolom_dana_masuk; ?>">
<input type="hidden" id="sort-dana_masuk" value="<?= $sort_dana_masuk; ?>">
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
        $(".link-dana_masuk").on('click', function() {
            refresh_dana_masuk($('#keyword-dana_masuk').val(), $(this).data('page'), $('#list_kategori_dana_masuk').val(), $('#kolom-dana_masuk').val(), $('#sort-dana_masuk').val());
        });
        $(".sort-order-dana-masuk").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-dana_masuk').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_dana_masuk($('#keyword-dana_masuk').val(), 1, $('#list_kategori_dana_masuk').val(), $(this).data('kolom'), sort);
        });
    });
</script>