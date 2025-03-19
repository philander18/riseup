<div class="container-produk">
    <h4 class="text-center fw-bold"><?= $produk['nama']; ?></h4>
    <div class="container-produk-image">
        <img src="<?= base_url(); ?>public/images/shop/<?= $produk['gambar']; ?>" alt="<?= $produk['nama']; ?>">
    </div>
    <p><?= $produk['deskripsi']; ?></p>
</div>