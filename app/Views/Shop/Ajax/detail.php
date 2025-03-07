<?php
function rupiah($angka)
{
    $fmt = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
    $fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 0); // Menghilangkan desimal
    return $fmt->formatCurrency($angka, 'IDR');
}
$total = 0;
?>
<h5>Nama Pembeli : <span class="text-success"><?= $pembeli['pembeli']; ?></span></h5>
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
                    <?= $row["nama"]; ?>
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
<form action="<?= base_url(); ?>shop/process" method="post" enctype="multipart/form-data">
    <input type="hidden" name="kode-bukti" value="<?= $detail_produk[0]['kode'] ?>">
    <h5 class="fw-bold text-center">Upload Bukti bayar</h5>
    <div class="input-group">
        <input type="file" class="form-control" name="bukti" aria-label="Upload" required>
        <button class="btn btn-outline-secondary btn-dark text-white" type="submit">Upload</button>
    </div>

    <!-- <input class="d-block mb-2 w-100" type="file" name="bukti" required>
    <button type="submit" class="btn btn-dark">Upload</button> -->
</form>
<?php if ($akses == 'bendahara') { ?>
    <form action="<?= base_url(); ?>shop/pelunasan" method="post">
        <div class="container-pelunasan mt-4">
            <select class="w-25" id="status-lunas" name="status-lunas">
                <option value="0" <?= $detail_produk[0]['lunas'] == 0 ? 'selected' : ''; ?>>Belum Lunas</option>
                <option value="1" <?= $detail_produk[0]['lunas'] == 1 ? 'selected' : ''; ?>>Sudah Lunas</option>
            </select>
            <button class="btn btn-outline-secondary btn-success text-white" type="submit">Update</button>
        </div>
    </form>
<?php } ?>