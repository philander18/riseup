<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="page-sponsor">
    <section class="satu-page sponsor-page d-none">
        <h3 class="fw-bold text-center my-2">Sponsor Diamond</h3>
        <div class="diamond-konten">
        </div>
    </section>
    <section class="satu-page sponsor-page d-none">
        <h3 class="fw-bold text-center my-2">Sponsor Platinum</h3>
        <div class="platinum-konten">
            <div class="platinum-item">
            </div>
            <div class="platinum-item">
            </div>
        </div>
    </section>
    <section class="satu-page sponsor-page d-none">
        <h3 class="fw-bold text-center my-2">Sponsor Gold</h3>
        <div class="gold-konten">
            <div class="gold-item">
            </div>
            <div class="gold-item">
            </div>
            <div class="gold-item">
            </div>
        </div>
    </section>
    <section class="satu-page sponsor-page">
        <h3 class="fw-bold text-center my-2">Sponsor Silver</h3>
        <div class="silver-konten">
            <div class="silver-item">
                <img src="<?= base_url(); ?>public/images/sponsor/silver1.jpg" alt="Silver 1">
            </div>
            <div class="silver-item d-none">

            </div>
            <div class="silver-item d-none">
            </div>
            <div class="silver-item d-none">
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
                    <div class="swiper-slide">
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
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>