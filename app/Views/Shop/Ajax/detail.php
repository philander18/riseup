<?php
function rupiah($angka)
{
    $fmt = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
    $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0); // Menghilangkan desimal
    return $fmt->formatCurrency($angka, 'IDR');
}
$total = 0;
?>
<h5>Kode : <span class="text-success"><?= $detail_produk[0]['kode'] ?></span></h5>
<h5>Nama Pembeli : <span class="text-success"><?= $pembeli['nama']; ?></span></h5>
<table class="table table-striped modal-tabel-detail" style="width:100%">
    <thead>
        <tr class="table-dark">
            <th class="text-center">Produk</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Jumlah</th>
            <th class="text-center">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($detail_produk as $row) : ?>
            <tr>
                <td class="text-center align-middle m-1 p-1 text-dark">
                    <?= $row["nama_produk"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1 text-dark">
                    <?= rupiah($row["harga"]); ?>
                </td>
                <td class="text-center align-middle m-1 p-1 text-dark">
                    <?= $row["jumlah"]; ?>
                </td>
                <td class="text-center align-middle m-1 p-1 text-dark">
                    <?= rupiah($row["total"]); ?>
                    <?php
                    $total +=  $row["total"];
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<h5 class="mb-4">Total Pembayaran : <span class="text-success"><?= rupiah($total); ?></span></h5>
<?php if ($gambar) :
    if (in_array($akses, ['bendahara', 'ketua'])) : ?>
        <div class="modal-image">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($gambar as $row) :
                        if ($detail_produk[0]['lunas'] == 1 && $row['valid'] == 1) : ?>
                            <div class="swiper-slide">
                                <img src="<?= base_url(); ?>public/uploads/<?= $row['bukti']; ?>" alt="<?= $row['kode']; ?>">
                            </div>
                        <?php elseif ($detail_produk[0]['lunas'] == 0) : ?>
                            <div class="swiper-slide">
                                <img src="<?= base_url(); ?>public/uploads/<?= $row['bukti']; ?>" alt="<?= $row['kode']; ?>">
                                <input type="checkbox" class="bukti-valid" value="1" data-id="<?= $row['id']; ?>" <?= ($row['valid'] == 1) ? "checked" : ""; ?>>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    <?php else : ?>
        <h5 class="fw-bold text-center text-success mb-2 text-decoration-underline">Bukti bayar sudah ada</h5>
    <?php endif; ?>
<?php endif; ?>
<?php if ($detail_produk[0]['lunas'] == 0) : ?>
    <form action="<?= base_url(); ?>shop/process" method="post" enctype="multipart/form-data">
        <input type="hidden" name="kode-bukti" value="<?= $detail_produk[0]['kode'] ?>">
        <h5 class="fw-bold text-center">Upload/update Bukti bayar</h5>
        <div class="input-group">
            <input type="file" class="form-control" name="bukti" aria-label="Upload" required>
            <button class="btn btn-outline-secondary btn-dark text-white" type="submit">Upload</button>
        </div>
    </form>
<?php endif; ?>
<?php if (in_array($akses, ['bendahara', 'ketua'])) { ?>
    <form action="<?= base_url(); ?>shop/update_pembayaran" method="post">
        <div class="container-pelunasan mt-4">
            <input type="hidden" name="kode-lunas" value="<?= $detail_produk[0]['kode'] ?>">
            <select class="w-25" id="status-lunas" name="status-lunas">
                <option value="0" <?= $detail_produk[0]['lunas'] == 0 ? 'selected' : ''; ?>>Belum Lunas</option>
                <option value="1" <?= $detail_produk[0]['lunas'] == 1 ? 'selected' : ''; ?>>Sudah Lunas</option>
            </select>
            <button class="btn btn-outline-secondary btn-success text-white" type="submit">Update</button>
        </div>
    </form>
<?php } ?>
<script>
    swiper = new Swiper('.swiper', {
        loop: document.querySelectorAll('.swiper-slide').length > 1,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    $('.bukti-valid').on('change', function() {
        const id = $(this).data('id');
        let valid;
        if ($(this).is(":checked")) {
            valid = 1
        } else {
            valid = 0
        }
        $.ajax({
            url: method_url('shop', 'update_bukti_valid'),
            data: {
                id: id,
                valid: valid,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {}
        });
    });
</script>