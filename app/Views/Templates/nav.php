<div class="header-nav-phil" x-data>
    <nav class="navbar-phil" x-data="{isActive: false, shop: false }">
        <a href="#" class="navbar-logo-phil"><img src="<?= base_url(); ?>public/images/nav_logo.png" alt="Logo Rise Up"></a>
        <div x-bind:class="isActive ? 'active' : ''" @click.stop class="navbar-nav-phil">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url(); ?>shop">Toko</a>
            <a href="<?= base_url(); ?>sponsor">Sponsorship</a>
            <a href="<?= base_url(); ?>registrasi">Registrasi</a>
            <a href="<?= base_url(); ?>laporan" class="<?= is_null($akses) ? 'text-decoration-line-through' : ''; ?>">Laporan</a>
        </div>
        <div class="navbar-extra-phil">
            <?php if (is_null($akses)) { ?>
                <a href="<?= base_url(); ?>home/portal" id="log-in"><i class="fa-solid fa-right-to-bracket"></i></a>
            <?php } else { ?>
                <span><?= strtoupper($akses); ?></span><a href="<?= base_url(); ?>home/keluar" id="log-out"><i class="fa-solid fa-right-from-bracket"></i></a>
            <?php } ?>
            <a href="#" @click="shop = !shop" @click.outside="shop = false" @click.prevent id="shopping-cart">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="quantity-badge" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
            </a>
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
                            <button id="remove" @click="$store.cart.remove(item.id)">&minus;</button>
                            <span x-text="item.quantity"></span>
                            <button id="add" @click="$store.cart.add(item)">&plus;</button> &equals;
                            <span x-text="rupiah(item.total)"></span>
                        </div>
                    </div>
                </div>
            </template>
            <h4 x-show="!$store.cart.items.length">keranjang masih kosong</h4>
            <h4 x-show="$store.cart.items.length">Total : <span x-text="rupiah($store.cart.total)"></span></h4>
        </div>
    </nav>
    <div class="countdown-nav-phil">
        <div id="countdown"></div>
    </div>
</div>