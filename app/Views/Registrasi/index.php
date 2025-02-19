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
        <div class="layout-contents area-registrasi">
            <div class="form-registrasi">
                <h1>Registrasi KKR</h1>
                <div class="flash"></div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" placeholder="Nama Lengkap" required>
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
        </div>
    </section>
    <section class="tiga-page">
        <div class="layout-contents area-tabel-verifikasi">
            <div class="phil-container">
                <h4>Peserta Terverifikasi</h4>
                <div class="phil-tabel">
                    <div class="search filter-select">
                        <label class="text-dark">Search </label>
                        <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-peserta_verifikasi">
                        <select class="form-select form-select-sm" aria-label="List Gereja" id="list_gereja-peserta_verifikasi">
                            <?php foreach ($list_gereja as $row) : ?>
                                <option value="<?= $row['nama']; ?>" data-gereja="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="tabel tabel-peserta_verifikasi">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="table-dark header-peserta_verifikasi" style="vertical-align:middle">
                                    <th class="text-center sort-order" data-kolom="nama" data-sort="<?= $sort; ?>">Nama
                                        <?php if ($kolom == 'nama') : ?>
                                            <?php if ($sort == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order" data-kolom="gereja" data-sort="<?= $sort; ?>">Gereja
                                        <?php if ($kolom == 'gereja') : ?>
                                            <?php if ($sort == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta_verifikasi as $row) : ?>
                                    <tr>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= $row["nama"]; ?>
                                        </td>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= $row["gereja"]; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if ($peserta_verifikasi) : ?>
                            <div aria-label="Page navigation">
                                <ul class="pagination mb-0">
                                    <?php if ($pagination_peserta_verifikasi['first']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_verifikasi" aria-label="First" id="first" name="first" data-page="1">
                                                <span aria-hidden="false">First</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_peserta_verifikasi['previous']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_verifikasi" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                                <span aria-hidden=" true">Previous</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php foreach ($pagination_peserta_verifikasi['number'] as $number) : ?>
                                        <li class="page-item <?= $pagination_peserta_verifikasi['page'] == $number ? 'active' : '' ?>">
                                            <button class="page-link text-dark link-peserta_verifikasi" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                                <span aria-hidden="true"><?= $number; ?></span>
                                            </button>
                                        </li>
                                    <?php endforeach ?>
                                    <?php if ($pagination_peserta_verifikasi['next']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_verifikasi" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                                <span aria-hidden=" true">Next</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_peserta_verifikasi['last']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_verifikasi" aria-label="<?= $last_peserta_verifikasi; ?>" id="last" name="last" data-page="<?= $last_peserta_verifikasi; ?>">
                                                <span aria-hidden="true"><?= $last_peserta_verifikasi; ?></span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <input type="hidden" id="kolom-peserta_verifikasi" value="<?= $kolom; ?>">
                        <input type="hidden" id="sort-peserta_verifikasi" value="<?= $sort; ?>">
                    </div>
                </div>
            </div>
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