<div class="detail-peserta">
    <div class="label-peserta">Nama</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= $peserta['nama']; ?></div>
    <div class="label-peserta">Gender</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= ucfirst($peserta['gender']); ?></div>
    <div class="label-peserta">Gereja</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= $peserta['gereja']; ?></div>
    <div class="label-peserta">Tahun Lahir</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= $peserta['tahun_lahir']; ?></div>
    <div class="label-peserta">Whatsapp</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= ($peserta['whatsapp'] == '' ? '-' : $peserta['whatsapp']); ?></div>
    <div class="label-peserta">Instagram</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= $peserta['instagram']; ?></div>
    <div class="label-peserta">Harapan</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success" style="text-align: justify;"><?= $peserta['harapan']; ?></div>
</div>
<?php if ($peserta['verified'] == 0) : ?>
    <div class="button-konten-phil">
        <button class="update-verifikasi-peserta" data-id="<?= $peserta['id']; ?>" data-bs-dismiss="modal">Diverifikasi</button>
    </div>
<?php endif; ?>

<script>
    $('.update-verifikasi-peserta').on('click', function() {
        const id = $(this).data('id');
        $.ajax({
            url: method_url('Registrasi', 'update_verifikasi_peserta'),
            data: {
                id: id,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                refresh_peserta_verifikasi($('#keyword-peserta_verifikasi').val(), 1, $('#list_gereja-peserta_verifikasi').val(), $('#kolom-peserta_verifikasi').val(), $('#sort-peserta_verifikasi').val());
                refresh_peserta_unverifikasi($('#keyword-peserta_unverifikasi').val(), 1, $('#list_gereja-peserta_unverifikasi').val(), $('#kolom-peserta_unverifikasi').val(), $('#sort-peserta_unverifikasi').val());
                refresh_peserta_summary($('#keyword-peserta_summary').val(), 1, $('#kolom-peserta_summary').val(), $('#sort-peserta_summary').val());
            }
        });
    });
</script>