<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<!-- <section class="section-awal" id="registrasi">
    <div class="registrasi-form">
        <h1>Form Registrasi</h1>
        <div class="flash"></div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
            <label for="hp">No. HP</label>
            <input type="text" id="hp" placeholder="Nomor Handphone" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender">
                <option value="">Pilih Gender</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="umur">Umur</label>
            <select id="umur">
                <option value="">Pilih Umur</option>
                <option value="12-18">12-18 tahun</option>
                <option value="19-30">19-30 tahun</option>
                <option value="31+">31+ tahun</option>
            </select>
        </div>
        <div class="form-group">
            <label for="gereja">Gereja</label>
            <select id="gereja">
                <option value="">Pilih Gereja</option>
                <?php foreach ($list_gereja as $gereja) : ?>
                    <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                <?php endforeach ?>
                <option value="lainnya">Lainnya...</option>
            </select>
        </div>
        <div class="form-group" id="gerejaLain">
            <label for="gerejaLainInput"></label>
            <input type="text" id="gerejaLainInput" placeholder="Nama Gereja">
        </div>
        <div class="form-group">
            <label for="harapan">Harapan</label>
            <textarea id="harapan" rows="4" placeholder="Tulis harapanmu untuk acara ini"></textarea>
        </div>
        <button type="button" class="submit-registrasi" id="submit-registrasi" disabled>Daftar</button>
    </div>
</section> -->
<div class="page-phil">
    <section class="satu-page">
        <div class="layout-contents">
            <h5>Area Registrasi</h5>
        </div>
    </section>
    <section class="tiga-page">
        <div class="layout-contents">
            <h6>Tabel Peserta Terverifikasi</h6>
        </div>
        <div class="layout-contents">
            <h6>Tabel Peserta Belum Terverifikasi</h6>
        </div>
        <div class="layout-contents">
            <h6>Summary Registrasi</h6>
        </div>
    </section>
</div>
<div class="satu-page footer-page">
    <div class="layout-contents">
        <h5>Footer</h5>
    </div>
</div>
<?= $this->endSection(); ?>