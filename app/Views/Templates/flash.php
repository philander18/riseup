<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert" style="padding: 0.4rem 0.8rem; margin-bottom: 0.5rem;">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>