<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif; ?>