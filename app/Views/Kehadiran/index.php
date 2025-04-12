<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="container-phil" x-data="{akses: '<?= $akses; ?>'}">
    <section class="section-1 mb-2">
        <div class="konten-phil konten-dana" x-data>
            <div class="judul-2">Konfirmasi Kehadiran</div>
            <div class="phil-tabel">
                <div class="search filter-select">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-peserta_hadir">
                    <select class="form-select form-select-sm" aria-label="List Gereja" id="list_gereja-peserta_hadir">
                        <option value="All" data-gereja="All" selected>All</option>
                        <?php foreach ($list_gereja as $row) : ?>
                            <option value="<?= $row['nama']; ?>" data-gereja="<?= $row['nama']; ?>"><?= $row['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="tabel tabel-peserta_hadir">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark header-peserta_hadir" style="vertical-align:middle">
                                <th class="text-center sort-order-hadir" data-kolom="nama" data-sort="<?= $sort_peserta_hadir; ?>">Nama
                                    <?php if ($kolom_peserta_hadir == 'nama') : ?>
                                        <?php if ($sort_peserta_hadir == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-hadir" data-kolom="gereja" data-sort="<?= $sort_peserta_hadir; ?>">Gereja
                                    <?php if ($kolom_peserta_hadir == 'gereja') : ?>
                                        <?php if ($sort_peserta_hadir == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-order-hadir" data-kolom="hadir" data-sort="<?= $sort_peserta_hadir; ?>">Hadir
                                    <?php if ($kolom_peserta_hadir == 'hadir') : ?>
                                        <?php if ($sort_peserta_hadir == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peserta_hadir as $row) : ?>
                                <tr>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?php if ($akses == $row["gereja"]) : ?>
                                            <a href="" class="link-primary modal-detail-peserta text-decoration-none" data-bs-toggle="modal" data-bs-target="#detail-peserta" data-id="<?= $row["id"]; ?>">
                                                <?= $row["nama"]; ?>
                                            </a>
                                        <?php else :
                                            echo $row["nama"];
                                        endif; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <?= $row["gereja"]; ?>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <input type="checkbox" class="cek_hadir" value="1" data-id="<?= $row['id']; ?>" <?= ($row['hadir'] == 1) ? "checked" : ""; ?>>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($peserta_hadir) : ?>
                        <div aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <?php if ($pagination_peserta_hadir['first']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta_hadir" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_peserta_hadir['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta_hadir" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination_peserta_hadir['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination_peserta_hadir['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark link-peserta_hadir" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination_peserta_hadir['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta_hadir" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_peserta_hadir['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta_hadir" aria-label="<?= $last_peserta_hadir; ?>" id="last" name="last" data-page="<?= $last_peserta_hadir; ?>">
                                            <span aria-hidden="true"><?= $last_peserta_hadir; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" id="kolom-peserta_hadir" value="<?= $kolom_peserta_hadir; ?>">
                    <input type="hidden" id="sort-peserta_hadir" value="<?= $sort_peserta_hadir; ?>">
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>