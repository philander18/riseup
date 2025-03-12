<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="container-phil">
    <div class="judul-1">Dana Masuk</div>
    <section class="section-1 mb-2">
        <div class="konten-phil konten-dana" x-data>
            <div class="judul-2">Input Dana Masuk</div>
            <div class="flash-dana-masuk"></div>
            <div class="form-phil">
                <div class="label-phil" for="nama-dana-masuk">Nama/Instansi</div>
                <div class="input-phil">
                    <input type="text" id="nama-dana-masuk" name="nama-dana-masuk" maxlength="100" placeholder="Nama/Instansi" required @change="tombol_dana_masuk()">
                </div>
                <div class="label-phil">Kategori</div>
                <div class="input-phil">
                    <select id="kategori-dana-masuk" name="kategori-dana-masuk" @change="tombol_dana_masuk()">
                        <option value="">Pilih Kategori</option>
                        <option value="taburan iman">Taburan Iman</option>
                        <option value="kartu kawan">Kartu Kawan</option>
                        <option value="sponsorship">Sponsorship</option>
                        <option value="merchandise">Merchandise</option>
                    </select>
                </div>
                <div class="label-phil" for="jumlah-dana-masuk">Jumlah</div>
                <div class="input-phil">
                    <input type="text" id="jumlah-dana-masuk" name="jumlah-dana-masuk" placeholder="Jumlah" required @change="tombol_dana_masuk()">
                </div>
                <div class="label-phil" for="catatan-dana-masuk">Catatan</div>
                <div class="input-phil">
                    <textarea maxlength="200" rows="3" id="catatan-dana-masuk" name="catatan-dana-masuk" placeholder="Catatan" @change="tombol_dana_masuk()"></textarea>
                    <span>200</span>
                </div>
                <div class="label-phil" for="tanggal-dana-masuk">Tanggal</div>
                <div class="input-phil">
                    <input type="date" id="tanggal-dana-masuk" name="tanggal-dana-masuk" placeholder="tanggal" value="<?= date('Y-m-d'); ?>">
                </div>
                <div class="label-phil" for="bukti-dana-masuk">Upload Bukti</div>
                <div class="input-phil">
                    <input type="file" id="bukti-dana-masuk" aria-label="Upload" style="accent-color: white;">
                </div>
            </div>
            <div class="button-konten-phil">
                <button type="submit" class="submit-dana-masuk" disabled>Submit</button>
            </div>
        </div>
    </section>
    <section class="section-2">
        <div class="konten-phil konten-dana">
            <div class="judul-2">Taburan Iman</div>
            <div class="phil-tabel mt-2">
                <div class="search">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-taburan_iman">
                </div>
                <div class="tabel tabel-taburan_iman">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark header-taburan_iman" style="vertical-align:middle">
                                <th class="text-center sort-order-taburan-iman" data-kolom="deskripsi" data-sort="<?= $sort_taburan_iman; ?>">Nama/Instansi
                                    <?php if ($kolom_taburan_iman == 'deskripsi') : ?>
                                        <?php if ($sort_taburan_iman == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-taburan-iman" data-kolom="jumlah" data-sort="<?= $sort_taburan_iman; ?>">Jumlah
                                    <?php if ($kolom_taburan_iman == 'jumlah') : ?>
                                        <?php if ($sort_taburan_iman == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-taburan-iman" data-kolom="tanggal" data-sort="<?= $sort_taburan_iman; ?>">Tanggal
                                    <?php if ($kolom_taburan_iman == 'tanggal') : ?>
                                        <?php if ($sort_taburan_iman == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($taburan_iman as $row) : ?>
                                <tr>
                                    <td class="text-center align-middle m-1 p-1">
                                        <a href="" class="link-primary modal-detail-dana" data-bs-toggle="modal" data-bs-target="#detail-dana" data-id="<?= $row["id"]; ?>">
                                            <?= $row["deskripsi"]; ?>
                                        </a>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= $row["jumlah"]; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= $row["tanggal"]; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($taburan_iman) : ?>
                        <div aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <?php if ($pagination_taburan_iman['first']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-taburan_iman" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_taburan_iman['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-taburan_iman" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination_taburan_iman['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination_taburan_iman['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark link-taburan_iman" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination_taburan_iman['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-taburan_iman" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_taburan_iman['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-taburan_iman" aria-label="<?= $last_taburan_iman; ?>" id="last" name="last" data-page="<?= $last_taburan_iman; ?>">
                                            <span aria-hidden="true"><?= $last_taburan_iman; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" id="kolom-taburan_iman" value="<?= $kolom_taburan_iman; ?>">
                    <input type="hidden" id="sort-taburan_iman" value="<?= $sort_taburan_iman; ?>">
                </div>
            </div>
        </div>
        <div class="konten-phil konten-dana">
            <div class="judul-2">Kartu Kawan</div>
        </div>
        <div class="konten-phil konten-dana">
            <div class="judul-2">Sponsorship</div>
        </div>
        <div class="konten-phil konten-dana">
            <div class="judul-2">Merchandise</div>
        </div>
    </section>
    <div class="judul-1">Dana Keluar</div>
    <section class="section-1">
        <div class="konten-phil konten-dana">
            <div class="judul-2">Input Dana Keluar</div>
            <div class="flash-dana-keluar"></div>
            <div class="form-phil">
                <div class="label-phil" for="nama-dana-keluar">Nama/Instansi</div>
                <div class="input-phil">
                    <input type="text" id="nama-dana-keluar" name="nama-dana-keluar" maxlength="100" placeholder="Nama/Instansi" required>
                </div>
                <div class="label-phil">Kategori</div>
                <div class="input-phil" id="kategori-dana-keluar" name="kategori-dana-keluar">
                    <select>
                        <option value="">Pilih Kategori</option>
                        <option value="sekretariat">Sekretariat</option>
                        <option value="acara">Acara</option>
                        <option value="danus">DaNus</option>
                        <option value="koper">KoPer</option>
                        <option value="dekdok">DekDok</option>
                        <option value="keamanan">Keamanan</option>
                        <option value="pubmed">PubMed</option>
                        <option value="humas">HuMas</option>
                    </select>
                </div>
                <div class="label-phil" for="jumlah-dana-keluar">Jumlah</div>
                <div class="input-phil">
                    <input type="text" id="jumlah-dana-keluar" name="jumlah-dana-keluar" placeholder="Jumlah" required>
                </div>
                <div class="label-phil" for="catatan-dana-keluar">Catatan</div>
                <div class="input-phil" id="catatan-dana-keluar" name="catatan-dana-keluar">
                    <textarea maxlength="200" rows="3" placeholder="Catatan"></textarea>
                    <span>200</span>
                </div>
                <div class="label-phil" for="tanggal-dana-keluar">Tanggal</div>
                <div class="input-phil">
                    <input type="date" id="tanggal-dana-keluar" name="tanggal-dana-keluar" placeholder="tanggal" value="<?= date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="button-konten-phil">
                <button type="submit" class="submit-dana-keluar">Submit</button>
            </div>
        </div>
    </section>
</div>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>