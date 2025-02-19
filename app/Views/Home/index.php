<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<!-- <section class="container-fluid hero" id="hero">
    <div class="judul-hero fw-bold">
        <h1>KKR Paskah 2025<br>Pelprap GPdI Wilayah 1 Bandung</h1>
    </div>
    <div class="waktu-hero">
        <div class="card">
            <h4>Dilaksanakan pada</h4>
            <div class="isi-waktu-hero">
                <div class="isi">
                    <h4>Hari</h4>
                    <h4>: Sabtu</h4>
                </div>
                <div class="isi">
                    <h4>Tanggal</h4>
                    <h4>: 26 April 2025</h4>
                </div>
                <div class="isi">
                    <h4>Waktu</h4>
                    <h4>: 16:00 - 18:30 WIB</h4>
                </div>
                <div class="isi">
                    <h4>Tempat</h4>
                    <h4>: GPdI Bukit Hermon</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="tema-hero">
        <h2>Rise Up, Rising Generation</h2>
    </div>
</section> -->
<div class="page-phil">
    <section class="satu-page">
        <div class="layout-contents layout-hero">
            <div class="judul-hero layout-subcontents">
                <h5>Area Judul</h5>
            </div>
            <div class="waktu-hero layout-subcontents">
                <h5>Area Waktu dan Tempat</h5>
            </div>
            <div class="pembicara-hero layout-subcontents">
                <h5>Area Pembicara</h5>
            </div>
            <div class="tema-hero layout-subcontents">
                <h5>Area Tema</h5>
            </div>
        </div>
    </section>
    <section class="satu-page">
        <div class="layout-contents">
            <h5>Area RAB</h5>
        </div>
    </section>
    <section class="satu-page">
        <div class="layout-contents">
            <h5>Area Acara</h5>
        </div>
    </section>
</div>
<div class="satu-page footer-page">
    <div class="layout-contents">
        <h5>Footer</h5>
    </div>
</div>
<?= $this->endSection(); ?>