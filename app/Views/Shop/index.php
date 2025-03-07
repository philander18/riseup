<?= $this->extend('Templates/indexshop'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="page-phil page-shop">
    <section class="tiga-page shop-tabel">
        <div class="layout-contents shop-tabel-verifikasi">
            <div class="petunjuk-preorder">
                <button type="button" data-bs-toggle="modal" data-bs-target="#petunjuk-shop">Panduan Pre-Order</button>
            </div>
            <!-- <?php if (session()->getFlashdata('success')) : ?>
                <p style="color: green;"><?php echo session()->getFlashdata('success'); ?></p>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <p style="color: red;"><?php echo session()->getFlashdata('error'); ?></p>
            <?php endif; ?> -->
        </div>
        <div class="layout-contents shop-tabel-verifikasi">
            <div class="phil-container">
                <h4 class="mt-2 mb-4 fw-bold">Order Belum Lunas</h4>
                <div class="phil-tabel">
                    <div class="search">
                        <label class="text-dark">Search </label>
                        <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-order_belum_lunas">
                    </div>
                    <div class="tabel tabel-order_belum_lunas">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="table-dark header-order_belum_lunas" style="vertical-align:middle">
                                    <th class="text-center sort-order-unverifikasi" data-kolom="kode" data-sort="<?= $sort_order_belum_lunas; ?>">Kode
                                        <?php if ($kolom_order_belum_lunas == 'kode') : ?>
                                            <?php if ($sort_order_belum_lunas == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-unverifikasi" data-kolom="nama" data-sort="<?= $sort_order_belum_lunas; ?>">Nama
                                        <?php if ($kolom_order_belum_lunas == 'nama') : ?>
                                            <?php if ($sort_order_belum_lunas == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-unverifikasi" data-kolom="tanggal" data-sort="<?= $sort_order_belum_lunas; ?>">Waktu
                                        <?php if ($kolom_order_belum_lunas == 'tanggal') : ?>
                                            <?php if ($sort_order_belum_lunas == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order_belum_lunas as $row) : ?>
                                    <tr>
                                        <td class="text-center align-middle m-1 p-1">
                                            <a href="" class="link-primary modal-detail-order" data-bs-toggle="modal" data-bs-target="#detail-order" data-kode="<?= $row["kode"]; ?>">
                                                <?= $row["kode"]; ?>
                                            </a>

                                        </td>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= $row["nama"]; ?>
                                        </td>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= $row["tanggal"]; ?>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-contents shop-tabel-verifikasi"></div>
    </section>
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
                                    <a href="#" class="btn btn-dark" @click.prevent="await $store.cart.add(produk);tombol_checkout()">add to <i class="fa-solid fa-cart-shopping"></i></a>
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
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Panduan Pre-Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Klik tombol add to <i class="fa-solid fa-cart-shopping"></i> dari produk yang dipilih untuk masuk ke keranjang belanja.</li>
                    <li>Cek di icon <i class="fa-solid fa-cart-shopping"></i> sebelah kanan atas untuk melihat barang apa saja yang sudah masuk ke keranjang.</li>
                    <li>Isi form data pembeli dengan lengkap supaya bisa checkout.</li>
                    <li>Setelah selesai checkout bisa lihat pemesanan di tabel order belum lunas.</li>
                    <li>Cari pemesanan yang dibuat menggunakan nama pembeli pada input search.</li>
                    <li>Klik pada kode pemesanan yang ditemukan sehingga muncul informasi pemesanan.</li>
                    <li class="text-justify">Jika informasi pemesanan sudah sesuai, bisa upload bukti bayar dengan klik browse dan arahkan ke file gambar bukti bayarnya, kemudian klik tombol upload.</li>
                    <li>Panitia akan cek pemesanan secepatnya maksimal 24 jam setelah bukti bayar diupload.</li>
                    <li>Cek di tabel order lunas untuk melihat apakah pemesanan sudah terkonfirmasi dibayar.</li>
                    <li>Jika belum tekonfirmasi setelah lebih dari 24 jam bisa menginformasikan ke wa 081310961630.</li>
                    <li>Barang yang diorder akan didistribusikan sesuai jadwal yang diinformasikan.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detail-order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="exampleModalLabel">Detail Pre-Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body isi-detail-order" x-data>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>