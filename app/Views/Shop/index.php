<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<!-- <section class="container-fluid shop">
    <div class="shop-awal">
        <h2 class="text-center mb-2 fw-bold">Daftar Produk</h2>
        <div class="shop-grid">
            <div class="card justify-content-center">
                <div class="shop-icon">
                    <a href="#"><i data-feather="shopping-cart"></i></a>
                    <a href="#"><i data-feather="eye"></i></a>
                </div>
                <div class="shop-image">
                    <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Produk 1</h5>
                    <p class="card-text">Deskripsi singkat produk 1.</p>
                    <p class="card-text"><strong>Harga: Rp 100.000</strong></p>
                    <a href="#" class="btn btn-primary">Beli Sekarang</a>
                </div>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                    <h5 class="card-title">Produk 1</h5>
                    <p class="card-text">Deskripsi singkat produk 1.</p>
                    <p class="card-text"><strong>Harga: Rp 100.000</strong></p>
                    <a href="#" class="btn btn-primary">Beli Sekarang</a>
                </div>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                    <h5 class="card-title">Produk 1</h5>
                    <p class="card-text">Deskripsi singkat produk 1.</p>
                    <p class="card-text"><strong>Harga: Rp 100.000</strong></p>
                    <a href="#" class="btn btn-primary">Beli Sekarang</a>
                </div>
            </div>
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produk 1">
                <div class="card-body">
                    <h5 class="card-title">Produk 1</h5>
                    <p class="card-text">Deskripsi singkat produk 1.</p>
                    <p class="card-text"><strong>Harga: Rp 100.000</strong></p>
                    <a href="#" class="btn btn-primary">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section> -->
<div class="page-phil">
    <section class="satu-page">
        <div class="produk-preorder">
            <h1 class="text-center fw-bold">Produk Pre-Order</h1>
            <div class="produk-grid">
                <div class="produk">
                    <div class="wadah-produk">
                        <div class="icon">
                            <a href="#"><i data-feather="shopping-cart"></i></a>
                            <a href="#"><i data-feather="eye"></i></a>
                        </div>
                        <div class="gambar">
                            <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1" height="100%" width="100%">
                        </div>
                        <div class="deskripsi">
                            <h5 class="text-center" style="font-family: 'Ga Maamli', serif;">Kaos Rise Up</h5>
                            <div class="harga">
                                <h6 class="fw-bold">Rp150.000</h6>
                            </div>
                            <div class="button-beli">
                                <a href="#" class="btn btn-dark">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk card">
                        <h5>produk</h5>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk card">
                        <h5>produk</h5>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk card">
                        <h5>produk</h5>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk card">
                        <h5>produk</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>