<div class="header-nav-phil" x-data>
    <nav class="navbar-phil" x-data="{isActive: false, shop: false }">
        <a href="#" class="navbar-logo-phil"><img src="<?= base_url(); ?>public/images/nav_logo.png" alt="Logo Rise Up"></a>
        <div x-bind:class="isActive ? 'active' : ''" @click.stop class="navbar-nav-phil">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url(); ?>shop">Toko</a>
            <a href="<?= base_url(); ?>sponsor">Sponsorship</a>
            <a href="<?= base_url(); ?>registrasi">Registrasi</a>
            <a href="<?= base_url(); ?>kehadiran" class="<?= is_null($akses) ? 'text-decoration-line-through' : ''; ?>">Kehadiran</a>
            <a href="<?= base_url(); ?>laporan" class="<?= is_null($akses) ? 'text-decoration-line-through' : ''; ?>">Laporan</a>
        </div>
        <div class="navbar-extra-phil">
            <?php if (is_null($akses)) { ?>
                <a href="<?= base_url(); ?>home/portal" id="log-in" class="text-decoration-none">Login <i class="fa-solid fa-right-to-bracket"></i></a>
            <?php } else { ?>
                <span class="nama-akses"><?= strtoupper($akses); ?></span><a href="<?= base_url(); ?>home/keluar" id="log-out"><i class="fa-solid fa-right-from-bracket"></i></a>
            <?php } ?>
            <a href="#" @click="shop = !shop" @click.outside="shop = false" @click.prevent id="shopping-cart" x-data="{halaman: 'Toko'}" x-show="halaman === '<?= $judul; ?>'"><i class="fa-solid fa-cart-shopping"></i><span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span></a>
            <a href="#" @click="isActive = !isActive" @click.outside="isActive = false" @click.prevent id="hamburger-menu"><i class="fa-solid fa-bars"></i></a>
        </div>
        <!-- shopping cart -->
        <div x-bind:class="shop ? 'active' : ''" @click.stop class="shopping-cart">
            <template x-for="(item, index) in $store.cart.items" x-key="index">
                <div class="cart-item">
                    <img :src="`<?= base_url(); ?>public/images/shop/${item.gambar}`" :alt="item.nama">
                    <div class="item-detail">
                        <h3 x-text="item.nama"></h3>
                        <div class="item-price">
                            <span x-text="rupiah(item.harga)"></span> &times;
                            <button id="remove" @click="await $store.cart.remove(item.id);tombol_checkout()">&minus;</button>
                            <span x-text="item.quantity"></span>
                            <button id="add" @click="await $store.cart.add(item);tombol_checkout()">&plus;</button> &equals;
                            <span x-text="rupiah(item.total)"></span>
                        </div>
                    </div>
                </div>
            </template>
            <h4 x-show="!$store.cart.items.length">keranjang masih kosong</h4>
            <h4 x-show="$store.cart.items.length">Total : <span x-text="rupiah($store.cart.total)"></span></h4>
            <form action="<?= base_url(); ?>shop/input_orderan" method="post">
                <div class="form-pelanggan" x-data="{pengiriman: ''}">
                    <input type="hidden" id="jumlah-item" :value="$store.cart.items.length">
                    <input type="hidden" id="data-item" name="data-item" :value="JSON.stringify($store.cart.items)">
                    <h4 class="text-center text-dark my-3 fw-bold">Data Pembeli</h4>
                    <div class="form-group">
                        <label for="nama-pelanggan">Nama</label>
                        <input type="text" id="nama-pelanggan" name="nama-pelanggan" maxlength="100" placeholder="Nama Lengkap" @change="tombol_checkout()" required>
                    </div>
                    <div class="form-group">
                        <label for="pengiriman-pelanggan">Pengiriman</label>
                        <select id="pengiriman-pelanggan" name="pengiriman-pelanggan" @change="pengiriman = $event.target.value;tombol_checkout();">
                            <option value="">Pilih Pengiriman</option>
                            <option value="pribadi">Ke alamat pribadi</option>
                            <option value="gereja">Ke gereja</option>
                        </select>
                    </div>
                    <div x-show="pengiriman === 'pribadi'" class="form-group">
                        <label for="hp-pelanggan">No. HP</label>
                        <input type="text" id="hp-pelanggan" name="hp-pelanggan" maxlength="100" placeholder="No. HP" @change="tombol_checkout()">
                    </div>
                    <div x-show="pengiriman === 'pribadi'" class="form-group with-textarea" x-data="{ text: '', maxChars: 200 }">
                        <label for="alamat-pelanggan">Alamat</label>
                        <textarea x-model="text" maxlength="200" id="alamat-pelanggan" name="alamat-pelanggan" rows="3" placeholder="Alamat Lengkap" @change="tombol_checkout()"></textarea>
                        <span id="textarea-alamat-pelanggan" x-text="maxChars - text.length"></span>
                    </div>
                    <div x-show="pengiriman === 'gereja'" class="form-group">
                        <label for="gereja-pelanggan">Gereja</label>
                        <select id="gereja-pelanggan" name="gereja-pelanggan" @change="tombol_checkout()">
                            <option value="">Pilih Gereja</option>
                            <?php foreach ($list_gereja as $gereja) : ?>
                                <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="button-pelanggan">
                        <button type="submit" class="checkout" id="checkout" disabled>Checkout</button>
                        <!-- <button type="button" @click="kosong_form_pelanggan();pengiriman= ''" class="test" id="test">Checkout</button> -->
                    </div>
                    <div class="rekening text-dark">
                        <p>Pembayaran bisa dilakukan dengan transfer ke rekening <span class="fw-bold">BCA 3791692197 a.n Reymond Crist Gunadi</span></p>
                        <p>Melayani juga pemesanan secara chat/ketemu dengan pembayaran langsung ke nomor 081313498165 (Stefan)</p>
                    </div>
                </div>
            </form>
        </div>
    </nav>
    <div class="countdown-nav-phil">
        <div id="countdown"></div>
    </div>
</div>