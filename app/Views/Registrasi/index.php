<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<section class="section-awal" id="registrasi">
    <div class="registrasi-form">
        <h1>Form Registrasi</h1>
        <div class="flash-update"></div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
            <label for="hp">No. HP</label>
            <input type="text" id="hp" placeholder="Nomor Handphone" required>
        </div>
        <div class="form-group">
            <label for="umur">Umur</label>
            <select id="umur">
                <option value="">Pilih Umur</option>
                <script>
                    for (let i = 10; i <= 100; i++) {
                        document.write(`<option value="${i}">${i}</option>`);
                    }
                </script>
            </select>
        </div>
        <div class="form-group">
            <label for="gereja">Gereja</label>
            <select id="gereja">
                <option value="">Pilih Gereja</option>
                <option value="Gereja A">Gereja A</option>
                <option value="Gereja B">Gereja B</option>
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
</section>
<?= $this->endSection(); ?>