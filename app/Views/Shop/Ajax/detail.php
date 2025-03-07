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
<h6>Total Pembayaran : <span class="text-success"><?= $total; ?></span></h6>
<form action="<?= base_url(); ?>shop/process" method="post" enctype="multipart/form-data">
    <label>Pilih Gambar:</label>
    <input type="hidden" name="kode-bukti" value="<?= $detail_produk[0]['kode'] ?>">
    <input type="file" name="bukti" required>
    <button type="submit">Upload</button>
</form>