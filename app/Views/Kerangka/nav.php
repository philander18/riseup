<div class="header-nav-phil">
    <nav class="navbar-phil" x-data="{isActive: false }">
        <a href="#" class="navbar-logo-phil"><img src="<?= base_url(); ?>public/images/nav_logo.png" alt="Logo Rise Up"></a>
        <div x-bind:class="isActive ? 'active' : ''" @click.stop class="navbar-nav-phil">
            <a href="<?= base_url(); ?>">Home</a>
            <a href="<?= base_url(); ?>shop">Usaha Dana</a>
            <a href="<?= base_url(); ?>sponsor">Sponsorship</a>
            <a href="<?= base_url(); ?>registrasi">Registrasi</a>
            <a href="<?= base_url(); ?>kontak">Kontak</a>
        </div>
        <div class="navbar-extra-phil">
            <a href="#" id="shopping-cart"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="#" @click="isActive = !isActive" @click.outside="isActive = false" @click.prevent id="hamburger-menu"><i class="fa-solid fa-bars"></i></a>
        </div>
    </nav>
    <div class="countdown-nav-phil">
        <div id="countdown"></div>
    </div>
</div>