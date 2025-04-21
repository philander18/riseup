<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="container-phil" x-data="{akses: '<?= $akses; ?>'}">
    <div class="judul-1">Sponsor Gold</div>
    <section class="section-1">
        <div class="konten-phil py-2">
            <div class="gold-item">
                <img src="<?= base_url(); ?>public/images/sponsor/gold1.png" alt="Gold 1">
            </div>
        </div>
    </section>
    <div class="judul-1">Sponsor Silver</div>
    <section class="section-1">
        <div class="konten-phil py-2">
            <div class="silver-item">
                <img src="<?= base_url(); ?>public/images/sponsor/silver1.jpg" alt="Silver 1">
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-sponsor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close close-home" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide p-2">
                        <h4 class="text-center fw-bold my-2">Sponsor Gold</h4>
                        <img style="border: 2px solid #2980B9; border-radius: 10px" src="<?= base_url(); ?>public/images/sponsor/gold1.png" alt="Poster">
                    </div>
                    <div class="swiper-slide p-2">
                        <h4 class="text-center fw-bold my-2">Sponsor Silver</h4>
                        <img style="border: 2px solid #2980B9; border-radius: 10px" src="<?= base_url(); ?>public/images/sponsor/silver1.jpg" alt="Poster">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<script>
    setTimeout(function() {
        var swiper = new Swiper('.swiper', {
            loop: document.querySelectorAll('.swiper-slide').length > 1,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    }, 1000);
</script>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>