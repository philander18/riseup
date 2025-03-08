<?= $this->extend('Templates/indexshop'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="page-phil page-shop">
    <section class="tiga-page shop-tabel">
        <div class="layout-contents shop-tabel-verifikasi">
            <div class="phil-container">
                <div class="flash">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert m-0 text-center fw-bold">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="tampilan-waktu">
                    <?= date("Y-m-d H:i:s", $game_time); ?>
                </div>
                <form action="<?= base_url(); ?>game/start" method="post">
                    <div class="petunjuk-preorder">
                        <button type="submit" class="mulai-game">Mulai</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="layout-contents shop-tabel-verifikasi">
            <div class="phil-container">
                <h4 class="mt-2 mb-4 fw-bold">Orderan</h4>
                <div class="phil-tabel">
                    <div class="search">
                        <label class="text-dark">Search </label>
                        <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-game">
                    </div>
                    <div class="tabel tabel-game">
                        <table class="table table-striped" style="width:100%">
                            <thead>
                                <tr class="table-dark header-game" style="vertical-align:middle">
                                    <th class="text-center sort-game" data-kolom="kode" data-sort="<?= $sort_game; ?>">Kode
                                        <?php if ($kolom_game == 'kode') : ?>
                                            <?php if ($sort_game == 'ASC') : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-game" data-kolom="nama" data-sort="<?= $sort_game; ?>">Nama
                                        <?php if ($kolom_game == 'nama') : ?>
                                            <?php if ($sort_game == 'ASC') : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-game" data-kolom="tanggal" data-sort="<?= $sort_game; ?>">Waktu
                                        <?php if ($kolom_game == 'tanggal') : ?>
                                            <?php if ($sort_game == 'ASC') : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($game as $row) : ?>
                                    <tr>
                                        <td class="text-center align-middle m-1 p-1">
                                            <a href="" class="link-primary modal-game" data-bs-toggle="modal" data-bs-target="#detail-game" data-kode="<?= $row["kode"]; ?>">
                                                <?= $row["kode"]; ?>
                                            </a>

                                        </td>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= $row["nama"]; ?>
                                        </td>
                                        <td class="text-center align-middle m-1 p-1">
                                            <?= date("Y-m-d H:i:s", $row["tanggal"]); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php if ($game) : ?>
                            <div aria-label="Page navigation">
                                <ul class="pagination mb-0">
                                    <?php if ($pagination_game['first']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-game" aria-label="First" id="first" name="first" data-page="1">
                                                <span aria-hidden="false">First</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_game['previous']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-game" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                                <span aria-hidden=" true">Previous</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php foreach ($pagination_game['number'] as $number) : ?>
                                        <li class="page-item <?= $pagination_game['page'] == $number ? 'active' : '' ?>">
                                            <button class="page-link text-dark link-game" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                                <span aria-hidden="true"><?= $number; ?></span>
                                            </button>
                                        </li>
                                    <?php endforeach ?>
                                    <?php if ($pagination_game['next']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-game" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                                <span aria-hidden=" true">Next</span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($pagination_game['last']) : ?>
                                        <li class="page-item">
                                            <button class="page-link text-dark link-game" aria-label="<?= $last_game; ?>" id="last" name="last" data-page="<?= $last_game; ?>">
                                                <span aria-hidden="true"><?= $last_game; ?></span>
                                            </button>
                                        </li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <input type="hidden" id="kolom-game" value="<?= $kolom_game; ?>">
                        <input type="hidden" id="sort-game" value="<?= $sort_game; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="layout-contents shop-tabel-verifikasi">
            <div class="phil-container">
                <h4>Selamat Bermain Game...</h4>
            </div>
        </div>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="detail-game" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="exampleModalLabel">Detail Pre-Order</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body isi-detail-game" x-data>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>