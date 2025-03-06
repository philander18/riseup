<?= $this->extend('Templates/indexshop'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="page-phil page-shop">
    <!-- <section class="satu-page petunjuk-shop">
        g
    </section> -->
    <section class="satu-page">
        <div class="produk-preorder" x-data="products">
            <h1 class="text-center fw-bold">Produk Pre-Order</h1>
            <div class="produk-grid">
                <template x-for="produk in produks" x-key="produk.id">
                    <div class="produk">
                        <div class="wadah-produk">
                            <div class="icon">
                                <a href="#"><i class="fa-regular fa-eye"></i></a>
                            </div>
                            <div class="gambar">
                                <img :src="`<?= base_url(); ?>public/images/shop/${produk.gambar}`" :alt="produk.nama" height="100%" width="100%">
                            </div>
                            <div class="deskripsi">
                                <h5 class="text-center" x-text="produk.nama"></h5>
                                <div class="harga">
                                    <h6 class="fw-bold" x-text="rupiah(produk.harga)"></h6>
                                </div>
                                <div class="button-beli">
                                    <a href="#" class="btn btn-dark" @click.prevent="$store.cart.add(produk)">Add to <i class="fa-solid fa-cart-shopping"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="petunjuk-shop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>