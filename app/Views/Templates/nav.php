<div class="header-nav-phil">
    <nav class="navbar-phil" x-data="{isActive: false, shop: false }">
        <a href="#" class="navbar-logo-phil"><img src="<?= base_url(); ?>public/images/nav_logo.png" alt="Logo Rise Up"></a>
        <div x-bind:class="isActive ? 'active' : ''" @click.stop class="navbar-nav-phil">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url(); ?>shop">Usaha Dana</a>
            <a href="<?= base_url(); ?>sponsor">Sponsorship</a>
            <a href="<?= base_url(); ?>registrasi">Registrasi</a>
            <a href="<?= base_url(); ?>kontak">Kontak</a>
        </div>
        <div class="navbar-extra-phil">
            <a href="#" @click="shop = !shop" @click.outside="shop = false" @click.prevent id="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="#" @click="isActive = !isActive" @click.outside="isActive = false" @click.prevent id="hamburger-menu"><i class="fa-solid fa-bars"></i></a>
        </div>
        <!-- shopping cart -->
        <div x-bind:class="shop ? 'active' : ''" @click.stop class="shopping-cart">
            <div class="cart-item">
                <img src="<?= base_url(); ?>public/images/shop/1.png" alt="produk 1">
                <div class="item-detail">
                    <h3>Produk 1</h3>
                    <div class="item-price">Rp80.000</div>
                </div>
                <i class="fa-solid fa-trash-can remove-item"></i>
            </div>
            <div class="cart-item">
                <img src="<?= base_url(); ?>public/images/shop/1.png" alt="produk 1">
                <div class="item-detail">
                    <h3>Produk 1</h3>
                    <div class="item-price">Rp80.000</div>
                </div>
                <i class="fa-solid fa-trash-can remove-item"></i>
            </div>
            <div class="cart-item">
                <img src="<?= base_url(); ?>public/images/shop/1.png" alt="produk 1">
                <div class="item-detail">
                    <h3>Produk 1</h3>
                    <div class="item-price">Rp80.000</div>
                </div>
                <i class="fa-solid fa-trash-can remove-item"></i>
            </div>
        </div>
    </nav>
    <div class="countdown-nav-phil">
        <div id="countdown"></div>
    </div>
</div>