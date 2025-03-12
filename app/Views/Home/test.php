<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-phil">
    <div class="judul-1">Section 1</div>
    <section class="section-1">
        <div class="konten-phil">
            <div class="judul-2">Input Data Keuangan</div>
            <div class="form-phil">
                <div class="label-phil">Nama</div>
                <div class="input-phil">
                    <input type="text" maxlength="100" placeholder="Nama Lengkap" required>
                </div>
                <div class="label-phil">Jenis</div>
                <div class="input-phil">
                    <select>
                        <option value="">Pilih Jenis</option>
                        <option value="masuk">Pemasukan</option>
                        <option value="keluar">Pengeluaran</option>
                    </select>
                </div>
                <div class="label-phil">Catatan</div>
                <div class="input-phil">
                    <textarea maxlength="200" rows="3" placeholder="Catatan"></textarea>
                    <span>200</span>
                </div>
            </div>
            <div class="button-konten-phil">
                <button type="submit">Submit</button>
            </div>
        </div>
    </section>
    <h2>Section 2</h2>
    <section class="section-2">
        <div class="konten-phil">
            <h3>coba</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam ullam iste, autem, eos recusandae sunt animi earum modi accusantium ducimus quasi corrupti dicta neque!</p>
        </div>
        <div class="konten-phil">
            <h3>coba</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam ullam iste, autem, eos recusandae sunt animi earum modi accusantium ducimus quasi corrupti dicta neque!</p>
        </div>
    </section>
    <h2>Section 3</h2>
    <section class="section-3">
        <div class="konten-phil">
            <h3>coba</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam ullam iste, autem, eos recusandae sunt animi earum modi accusantium ducimus quasi corrupti dicta neque!</p>
        </div>
        <div class="konten-phil">
            <h3>coba</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam ullam iste, autem, eos recusandae sunt animi earum modi accusantium ducimus quasi corrupti dicta neque!</p>
        </div>
        <div class="konten-phil">
            <h3>coba</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quibusdam ullam iste, autem, eos recusandae sunt animi earum modi accusantium ducimus quasi corrupti dicta neque!</p>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>