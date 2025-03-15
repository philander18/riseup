<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="page-phil">
    <section class="satu-page area-hero">
        <div class="layout-hero">
            <div class="judul-hero">
                <H3>KEBAKTIAN KEBANGUNAN ROHANI (KKR)<br>
                    PASKAH PEMUDA DAN REMAJA<br>
                    TAHUN 2025</H3>
            </div>
            <div class="waktu-hero">
                <h3>Waktu dan Tempat</h3>
                <div class="isi-waktu">
                    <h4><span>Hari, Tanggal</span>: Sabtu, 26 April 2025</h4>
                    <h4><span>Waktu</span>: 16:00 - 19:00 WIB</h4>
                    <h4><span>Tempat</span>: GPdI Bukit Hermon</h4>
                    <h4>Jalan Mahar Martanegara No. 103, Cigugur Tengah, Kota Cimahi</h4>
                </div>
            </div>
            <div class="pembicara-hero">
                <h3>Pembicara</h3>
                <div><img src="<?= base_url(); ?>public/images/pembicara.png" alt="Pembicara"></div>
                <h4><Span class="text-decoration-underline">Pdt. Vera Patita Siwi S. E.</Span><br>Ketua KP Pelpap GPdI</h4>
            </div>
            <div class="tema-hero">
                <h3>Tema</h3>
                <h4 class="text-decoration-underline">RISE UP, RISING GENERATION</h4>
                <h4>Isaiah 60:1 (UKJV)</h4>
                <h4>Arise, shine; for your light has come, and the glory of the LORD has risen upon you.</h4>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-home" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close close-home" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="<?= base_url(); ?>public/images/slider/poster.jpeg" alt="Poster">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>