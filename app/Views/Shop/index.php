<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="page-phil">
    <section class="satu-page">
        <div class="produk-preorder">
            <h1 class="text-center fw-bold">Produk Pre-Order</h1>
            <div class="produk-grid">
                <div class="produk">
                    <div class="wadah-produk">
                        <div class="icon">
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                        <div class="gambar">
                            <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1" height="100%" width="100%">
                        </div>
                        <div class="deskripsi">
                            <h5 class="text-center" style="font-family: 'Ga Maamli', serif;">Kaos Rise Up</h5>
                            <div class="harga">
                                <h6 class="fw-bold">Rp80.000</h6>
                            </div>
                            <div class="button-beli">
                                <a href="#" class="btn btn-dark">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk">
                        <div class="icon">
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                        <div class="gambar">
                            <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1" height="100%" width="100%">
                        </div>
                        <div class="deskripsi">
                            <h5 class="text-center" style="font-family: 'Ga Maamli', serif;">Kaos Rise Up</h5>
                            <div class="harga">
                                <h6 class="fw-bold">Rp80.000</h6>
                            </div>
                            <div class="button-beli">
                                <a href="#" class="btn btn-dark">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk">
                        <div class="icon">
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                        <div class="gambar">
                            <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1" height="100%" width="100%">
                        </div>
                        <div class="deskripsi">
                            <h5 class="text-center" style="font-family: 'Ga Maamli', serif;">Kaos Rise Up</h5>
                            <div class="harga">
                                <h6 class="fw-bold">Rp80.000</h6>
                            </div>
                            <div class="button-beli">
                                <a href="#" class="btn btn-dark">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk">
                        <div class="icon">
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                        <div class="gambar">
                            <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1" height="100%" width="100%">
                        </div>
                        <div class="deskripsi">
                            <h5 class="text-center" style="font-family: 'Ga Maamli', serif;">Kaos Rise Up</h5>
                            <div class="harga">
                                <h6 class="fw-bold">Rp80.000</h6>
                            </div>
                            <div class="button-beli">
                                <a href="#" class="btn btn-dark">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="produk">
                    <div class="wadah-produk">
                        <div class="icon">
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                        <div class="gambar">
                            <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1" height="100%" width="100%">
                        </div>
                        <div class="deskripsi">
                            <h5 class="text-center" style="font-family: 'Ga Maamli', serif;">Kaos Rise Up</h5>
                            <div class="harga">
                                <h6 class="fw-bold">Rp80.000</h6>
                            </div>
                            <div class="button-beli">
                                <a href="#" class="btn btn-dark">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- modal box item detail -->
<!-- <div class="modal" id="item-detail-modal">
    <div class="modal-container">
        <a href="#" class="close-icon"><i class="fa-solid fa-xmark"></i></a>
        <div class="modal-contents">
            <img src="<?= base_url(); ?>public/images/shop/1.png" alt="Produk 1">
        </div>
    </div>
</div> -->
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>