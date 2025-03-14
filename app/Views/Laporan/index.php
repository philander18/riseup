<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="container-phil" x-data="{akses: '<?= $akses; ?>'}">
    <div class="judul-1" x-show="['bendahara', 'ketua'].includes(akses)">Form Input Dana</div>
    <section class="section-1 mb-2" x-show="['bendahara', 'ketua'].includes(akses)">
        <div class="konten-phil konten-dana" x-data>
            <div class="judul-2">Input Dana</div>
            <div class="flash-dana-masuk"></div>
            <form action="<?= base_url(); ?>laporan/input_dana" method="post" enctype="multipart/form-data">
                <div class="form-phil" x-data="{jenis: ''}">
                    <div class="label-phil" for="nama-dana-masuk">Nama/Instansi</div>
                    <div class="input-phil">
                        <input type="text" id="nama-dana-masuk" name="nama-dana-masuk" maxlength="100" placeholder="Nama/Instansi" required @change="tombol_dana_masuk()">
                    </div>
                    <div class="label-phil">Jenis</div>
                    <div class="input-phil">
                        <select id="jenis-dana-masuk" name="jenis-dana-masuk" @change="tombol_dana_masuk()" x-model="jenis">
                            <option value="">Pilih Jenis</option>
                            <option value="masuk">Dana Masuk</option>
                            <option value="keluar">Dana Keluar</option>
                        </select>
                    </div>
                    <div class="label-phil">Kategori</div>
                    <div class="input-phil">
                        <select id="kategori-dana-masuk" name="kategori-dana-masuk" @change="tombol_dana_masuk()">
                            <option value="">Pilih Kategori</option>
                            <option x-show="jenis == 'masuk'" value="taburan iman">Taburan Iman</option>
                            <option x-show="jenis == 'masuk'" value="kartu kawan">Kartu Kawan</option>
                            <option x-show="jenis == 'masuk'" value="sponsorship">Sponsorship</option>
                            <option x-show="jenis == 'masuk'" value="merchandise">Merchandise</option>
                            <option x-show="jenis == 'keluar'" value="sekretariat">Sekretariat</option>
                            <option x-show="jenis == 'keluar'" value="acara">Acara</option>
                            <option x-show="jenis == 'keluar'" value="danus">DaNus</option>
                            <option x-show="jenis == 'keluar'" value="koper">KoPer</option>
                            <option x-show="jenis == 'keluar'" value="dekdok">DekDok</option>
                            <option x-show="jenis == 'keluar'" value="keamanan">Keamanan</option>
                            <option x-show="jenis == 'keluar'" value="pubmed">PubMed</option>
                            <option x-show="jenis == 'keluar'" value="humas">HuMas</option>
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
                        <input type="file" id="bukti-dana-masuk" name="bukti-dana-masuk" aria-label="Upload" style="accent-color: white;">
                    </div>
                </div>
                <div class="button-konten-phil">
                    <button type="submit" class="submit-dana-masuk" disabled>Submit</button>
                </div>
            </form>
        </div>
    </section>
    <div class="judul-1 mt-4">Dana Masuk</div>
    <section class="section-2">
        <div class="konten-phil konten-dana">
            <div class="judul-2">List Dana Masuk</div>
            <div class="phil-tabel mt-2">
                <div class="search filter-select">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-dana_masuk">
                    <select class="form-select form-select-sm" aria-label="List Dana Masuk" id="list_kategori_dana_masuk">
                        <option value="All" data-kategori="All" selected>All</option>
                        <option value="taburan iman" data-kategori="taburan iman">Taburan Iman</option>
                        <option value="kartu kawan" data-kategori="kartu kawan">Kartu Kawan</option>
                        <option value="sponsorship" data-kategori="sponsorship">Sponsorship</option>
                        <option value="merchandise" data-kategori="merchandise">Merchandise</option>
                    </select>
                </div>
                <div class="tabel tabel-dana_masuk">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark header-dana_masuk" style="vertical-align:middle">
                                <th class="text-center sort-order-dana-masuk" data-kolom="deskripsi" data-sort="<?= $sort_dana_masuk; ?>">Nama/Instansi
                                    <?php if ($kolom_dana_masuk == 'deskripsi') : ?>
                                        <?php if ($sort_dana_masuk == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-dana-masuk" data-kolom="jumlah" data-sort="<?= $sort_dana_masuk; ?>">Jumlah
                                    <?php if ($kolom_dana_masuk == 'jumlah') : ?>
                                        <?php if ($sort_dana_masuk == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-dana-masuk" data-kolom="tanggal" data-sort="<?= $sort_dana_masuk; ?>">Tanggal
                                    <?php if ($kolom_dana_masuk == 'tanggal') : ?>
                                        <?php if ($sort_dana_masuk == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dana_masuk as $row) : ?>
                                <tr>
                                    <td class="text-center align-middle m-1 p-1">
                                        <a href="" class="link-primary modal-detail-dana" data-bs-toggle="modal" data-bs-target="#detail-dana" data-id="<?= $row["id"]; ?>">
                                            <?= $row["deskripsi"]; ?>
                                        </a>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= number_format($row["jumlah"], 0, ',', '.'); ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= $row["tanggal"]; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($dana_masuk) : ?>
                        <div aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <?php if ($pagination_dana_masuk['first']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_masuk" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_dana_masuk['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_masuk" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination_dana_masuk['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination_dana_masuk['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark link-dana_masuk" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination_dana_masuk['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_masuk" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_dana_masuk['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_masuk" aria-label="<?= $last_dana_masuk; ?>" id="last" name="last" data-page="<?= $last_dana_masuk; ?>">
                                            <span aria-hidden="true"><?= $last_dana_masuk; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" id="kolom-dana_masuk" value="<?= $kolom_dana_masuk; ?>">
                    <input type="hidden" id="sort-dana_masuk" value="<?= $sort_dana_masuk; ?>">
                </div>
            </div>
        </div>
        <div class="konten-phil konten-dana">
            <div class="judul-2">Summary Dana Masuk</div>
            <div class="phil-tabel mt-2">
                <div class="search">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-summary_dana_masuk">
                </div>
                <div class="tabel tabel-summary_dana_masuk">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark header-summary_dana_masuk" style="vertical-align:middle">
                                <th class="text-center sort-order-summary-dana-masuk" data-kolom="kategori" data-sort="<?= $sort_summary_dana_masuk; ?>">Kategori
                                    <?php if ($kolom_summary_dana_masuk == 'kategori') : ?>
                                        <?php if ($sort_summary_dana_masuk == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-summary-dana-masuk" data-kolom="jumlah" data-sort="<?= $sort_summary_dana_masuk; ?>">Jumlah
                                    <?php if ($kolom_summary_dana_masuk == 'jumlah') : ?>
                                        <?php if ($sort_summary_dana_masuk == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_dana_masuk = 0;
                            foreach ($summary_dana_masuk as $row) : ?>
                                <tr>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= $row["kategori"]; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= number_format($row["jumlah"], 0, ',', '.');
                                        $total_dana_masuk += $row["jumlah"]; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center align-middle m-1 p-1 fw-bold bg-success">
                                    <strong>Total</strong>
                                </td>
                                <td class="text-center align-middle m-1 p-1 fw-bold bg-success">
                                    <strong><?= number_format($total_dana_masuk, 0, ',', '.'); ?></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php if ($summary_dana_masuk) : ?>
                        <div aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <?php if ($pagination_summary_dana_masuk['first']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_masuk" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_summary_dana_masuk['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_masuk" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination_summary_dana_masuk['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination_summary_dana_masuk['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark link-summary_dana_masuk" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination_summary_dana_masuk['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_masuk" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_summary_dana_masuk['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_masuk" aria-label="<?= $last_summary_dana_masuk; ?>" id="last" name="last" data-page="<?= $last_summary_dana_masuk; ?>">
                                            <span aria-hidden="true"><?= $last_summary_dana_masuk; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" id="kolom-summary_dana_masuk" value="<?= $kolom_summary_dana_masuk; ?>">
                    <input type="hidden" id="sort-summary_dana_masuk" value="<?= $sort_summary_dana_masuk; ?>">
                </div>
            </div>
        </div>
    </section>
    <div class="judul-1 mt-4">Dana Keluar</div>
    <section class="section-2">
        <div class="konten-phil konten-dana">
            <div class="judul-2">List Dana Keluar</div>
            <div class="phil-tabel mt-2">
                <div class="search filter-select">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-dana_keluar">
                    <select class="form-select form-select-sm" aria-label="List Dana keluar" id="list_kategori_dana_keluar">
                        <option value="All" data-kategori="All" selected>All</option>
                        <option data-kategori="sekretariat" value="sekretariat">Sekretariat</option>
                        <option data-kategori="acara" value="acara">Acara</option>
                        <option data-kategori="danus" value="danus">DaNus</option>
                        <option data-kategori="koper" value="koper">KoPer</option>
                        <option data-kategori="dekdok" value="dekdok">DekDok</option>
                        <option data-kategori="keamanan" value="keamanan">Keamanan</option>
                        <option data-kategori="pubmed" value="pubmed">PubMed</option>
                        <option data-kategori="humas" value="humas">HuMas</option>
                    </select>
                </div>
                <div class="tabel tabel-dana_keluar">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark header-dana_keluar" style="vertical-align:middle">
                                <th class="text-center sort-order-dana-keluar" data-kolom="deskripsi" data-sort="<?= $sort_dana_keluar; ?>">Nama/Instansi
                                    <?php if ($kolom_dana_keluar == 'deskripsi') : ?>
                                        <?php if ($sort_dana_keluar == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-dana-keluar" data-kolom="jumlah" data-sort="<?= $sort_dana_keluar; ?>">Jumlah
                                    <?php if ($kolom_dana_keluar == 'jumlah') : ?>
                                        <?php if ($sort_dana_keluar == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-dana-keluar" data-kolom="tanggal" data-sort="<?= $sort_dana_keluar; ?>">Tanggal
                                    <?php if ($kolom_dana_keluar == 'tanggal') : ?>
                                        <?php if ($sort_dana_keluar == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dana_keluar as $row) : ?>
                                <tr>
                                    <td class="text-center align-middle m-1 p-1">
                                        <a href="" class="link-primary modal-detail-dana" data-bs-toggle="modal" data-bs-target="#detail-dana" data-id="<?= $row["id"]; ?>">
                                            <?= $row["deskripsi"]; ?>
                                        </a>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= number_format($row["jumlah"], 0, ',', '.'); ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= $row["tanggal"]; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($dana_keluar) : ?>
                        <div aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <?php if ($pagination_dana_keluar['first']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_keluar" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_dana_keluar['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_keluar" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination_dana_keluar['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination_dana_keluar['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark link-dana_keluar" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination_dana_keluar['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_keluar" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_dana_keluar['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-dana_keluar" aria-label="<?= $last_dana_keluar; ?>" id="last" name="last" data-page="<?= $last_dana_keluar; ?>">
                                            <span aria-hidden="true"><?= $last_dana_keluar; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" id="kolom-dana_keluar" value="<?= $kolom_dana_keluar; ?>">
                    <input type="hidden" id="sort-dana_keluar" value="<?= $sort_dana_keluar; ?>">
                </div>
            </div>
        </div>
        <div class="konten-phil konten-dana">
            <div class="judul-2">Summary Dana keluar</div>
            <div class="phil-tabel mt-2">
                <div class="search">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-summary_dana_keluar">
                </div>
                <div class="tabel tabel-summary_dana_keluar">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark header-summary_dana_keluar" style="vertical-align:middle">
                                <th class="text-center sort-order-summary-dana-keluar" data-kolom="kategori" data-sort="<?= $sort_summary_dana_keluar; ?>">Kategori
                                    <?php if ($kolom_summary_dana_keluar == 'kategori') : ?>
                                        <?php if ($sort_summary_dana_keluar == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-summary-dana-keluar" data-kolom="jumlah" data-sort="<?= $sort_summary_dana_keluar; ?>">Jumlah
                                    <?php if ($kolom_summary_dana_keluar == 'jumlah') : ?>
                                        <?php if ($sort_summary_dana_keluar == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_dana_keluar = 0;
                            foreach ($summary_dana_keluar as $row) : ?>
                                <tr>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= $row["kategori"]; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= number_format($row["jumlah"], 0, ',', '.');
                                        $total_dana_keluar += $row["jumlah"]; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="text-center align-middle m-1 p-1 fw-bold bg-success">
                                    <strong>Total</strong>
                                </td>
                                <td class="text-center align-middle m-1 p-1 fw-bold bg-success">
                                    <strong><?= number_format($total_dana_keluar, 0, ',', '.'); ?></strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <?php if ($summary_dana_keluar) : ?>
                        <div aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <?php if ($pagination_summary_dana_keluar['first']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_keluar" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_summary_dana_keluar['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_keluar" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination_summary_dana_keluar['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination_summary_dana_keluar['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark link-summary_dana_keluar" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination_summary_dana_keluar['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_keluar" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_summary_dana_keluar['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-summary_dana_keluar" aria-label="<?= $last_summary_dana_keluar; ?>" id="last" name="last" data-page="<?= $last_summary_dana_keluar; ?>">
                                            <span aria-hidden="true"><?= $last_summary_dana_keluar; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" id="kolom-summary_dana_keluar" value="<?= $kolom_summary_dana_keluar; ?>">
                    <input type="hidden" id="sort-summary_dana_keluar" value="<?= $sort_summary_dana_keluar; ?>">
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="detail-dana" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="exampleModalLabel">Detail Dana</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body isi-detail-dana">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>