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
                            <option value="All" data-gereja="All" selected>All</option>
                            <?php foreach ($list_gereja as $row) : ?>
                                <option value="<?= $row['nama']; ?>" data-gereja="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="tabel tabel-peserta_verifikasi">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="table-dark header-peserta_verifikasi" style="vertical-align:middle">
                                    <th class="text-center sort-order-verifikasi" data-kolom="nama" data-sort="<?= $sort_peserta_verifikasi; ?>">Nama
                                        <?php if ($kolom_peserta_verifikasi == 'nama') : ?>
                                            <?php if ($sort_peserta_verifikasi == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-verifikasi" data-kolom="gereja" data-sort="<?= $sort_peserta_verifikasi; ?>">Gereja
                                        <?php if ($kolom_peserta_verifikasi == 'gereja') : ?>
                                            <?php if ($sort_peserta_verifikasi == 'ASC') : ?>
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
                        <input type="hidden" id="kolom-peserta_verifikasi" value="<?= $kolom_peserta_verifikasi; ?>">
                        <input type="hidden" id="sort-peserta_verifikasi" value="<?= $sort_peserta_verifikasi; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-contents area-tabel-unverifikasi">
            <div class="phil-container">
                <h4>Peserta Belum Terverifikasi</h4>
                <div class="phil-tabel">
                    <div class="search filter-select">
                        <label class="text-dark">Search </label>
                        <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-peserta_unverifikasi">
                        <select class="form-select form-select-sm" aria-label="List Gereja" id="list_gereja-peserta_unverifikasi">
                            <option value="All" data-gereja="All" selected>All</option>
                            <?php foreach ($list_gereja as $row) : ?>
                                <option value="<?= $row['nama']; ?>" data-gereja="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="tabel tabel-peserta_unverifikasi">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="table-dark header-peserta_unverifikasi" style="vertical-align:middle">
                                    <th class="text-center sort-order-unverifikasi" data-kolom="nama" data-sort="<?= $sort_peserta_unverifikasi; ?>">Nama
                                        <?php if ($kolom_peserta_unverifikasi == 'nama') : ?>
                                            <?php if ($sort_peserta_unverifikasi == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-unverifikasi" data-kolom="gereja" data-sort="<?= $sort_peserta_unverifikasi; ?>">Gereja
                                        <?php if ($kolom_peserta_unverifikasi == 'gereja') : ?>
                                            <?php if ($sort_peserta_unverifikasi == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta_unverifikasi as $row) : ?>
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
                        <?php if ($peserta_unverifikasi) : ?>
                            <div aria-label="Page navigation">
                                <ul class="pagination mb-0">
                                    <?php if ($pagination_peserta_unverifikasi['first']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_unverifikasi" aria-label="First" id="first" name="first" data-page="1">
                                                <span aria-hidden="false">First</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_peserta_unverifikasi['previous']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_unverifikasi" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                                <span aria-hidden=" true">Previous</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php foreach ($pagination_peserta_unverifikasi['number'] as $number) : ?>
                                        <li class="page-item <?= $pagination_peserta_unverifikasi['page'] == $number ? 'active' : '' ?>">
                                            <button class="page-link text-dark link-peserta_unverifikasi" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                                <span aria-hidden="true"><?= $number; ?></span>
                                            </button>
                                        </li>
                                    <?php endforeach ?>
                                    <?php if ($pagination_peserta_unverifikasi['next']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_unverifikasi" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                                <span aria-hidden=" true">Next</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_peserta_unverifikasi['last']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_unverifikasi" aria-label="<?= $last_peserta_unverifikasi; ?>" id="last" name="last" data-page="<?= $last_peserta_unverifikasi; ?>">
                                                <span aria-hidden="true"><?= $last_peserta_unverifikasi; ?></span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <input type="hidden" id="kolom-peserta_unverifikasi" value="<?= $kolom_peserta_unverifikasi; ?>">
                        <input type="hidden" id="sort-peserta_unverifikasi" value="<?= $sort_peserta_unverifikasi; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-contents area-tabel-summary">
            <div class="phil-container">
                <h4>Summary</h4>
                <div class="phil-tabel">
                    <div class="search">
                        <label class="text-dark">Search </label>
                        <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-peserta_summary">
                    </div>
                    <div class="tabel tabel-peserta_summary">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="table-dark header-peserta_summary" style="vertical-align:middle">
                                    <th class="text-center sort-order-summary" data-kolom="gereja" data-sort="<?= $sort_peserta_summary; ?>">Gereja
                                        <?php if ($kolom_peserta_summary == 'gereja') : ?>
                                            <?php if ($sort_peserta_summary == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-summary" data-kolom="jumlah" data-sort="<?= $sort_peserta_summary; ?>">Jumlah
                                        <?php if ($kolom_peserta_summary == 'jumlah') : ?>
                                            <?php if ($sort_peserta_summary == 'ASC') : ?>
                                                <span class="ms-2"><i data-feather="arrow-down"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i data-feather="arrow-up"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta_summary as $row) : ?>
                                    <tr>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= $row["gereja"]; ?>
                                        </td>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= $row["jumlah"]; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if ($peserta_summary) : ?>
                            <div aria-label="Page navigation">
                                <ul class="pagination mb-0">
                                    <?php if ($pagination_peserta_summary['first']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_summary" aria-label="First" id="first" name="first" data-page="1">
                                                <span aria-hidden="false">First</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_peserta_summary['previous']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_summary" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                                <span aria-hidden=" true">Previous</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php foreach ($pagination_peserta_summary['number'] as $number) : ?>
                                        <li class="page-item <?= $pagination_peserta_summary['page'] == $number ? 'active' : '' ?>">
                                            <button class="page-link text-dark link-peserta_summary" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                                <span aria-hidden="true"><?= $number; ?></span>
                                            </button>
                                        </li>
                                    <?php endforeach ?>
                                    <?php if ($pagination_peserta_summary['next']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_summary" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                                <span aria-hidden=" true">Next</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_peserta_summary['last']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-peserta_summary" aria-label="<?= $last_peserta_summary; ?>" id="last" name="last" data-page="<?= $last_peserta_summary; ?>">
                                                <span aria-hidden="true"><?= $last_peserta_summary; ?></span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <input type="hidden" id="kolom-peserta_summary" value="<?= $kolom_peserta_summary; ?>">
                        <input type="hidden" id="sort-peserta_summary" value="<?= $sort_peserta_summary; ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="satu-page footer-page">
    <footer class="text-light py-4 layout-contents area-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>Tentang Kami</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel urna a velit varius luctus.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url(); ?>" class="text-light text-decoration-none">Home</a></li>
                        <li><a href="<?= base_url(); ?>shop" class="text-light text-decoration-none">Usaha Dana</a></li>
                        <li><a href="<?= base_url(); ?>sponsor" class="text-light text-decoration-none">Sponsorship</a></li>
                        <li><a href="<?= base_url(); ?>registrasi" class="text-light text-decoration-none">Registrasi</a></li>
                        <li><a href="<?= base_url(); ?>kontak" class="text-light text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Kontak Kami</h5>
                    <p>Email : philander.totalis@gmail.com <br>No. HP : 0856 5928 2506 <br>Alamat : Perumahan Batujajar Regency II Blok AI.1</p>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2025 Rise Up. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</div>
<?= $this->endSection(); ?>