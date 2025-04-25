<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div x-data="welcomeApp()" class="container-fluid selamat_datang">
    <div class="container-phil">
        <div class="judul-1 text-white m-0" style="font-size: 10vh;">Selamat Datang</div>
        <div x-text="capitalizeEachWord(currentName)" class="judul-1 text-decoration-underline" style="font-size: 8vh;"></div>
        <div x-text="currentGereja" class="judul-1" style="font-size: 4vh;"></div>
    </div>
</div>
<?= $this->endSection(); ?>