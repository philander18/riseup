<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<?= $this->include('Templates/nav'); ?>
<div class="page-phil registrasi">
    <section class="satu-page">
        <div class="layout-contents area-registrasi">
            <div class="form-registrasi" x-data="{ pilihan: '', lainnya: '' }">
                <h1>Registrasi KKR</h1>
                <div class="flash"></div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" maxlength="100" placeholder="Nama Lengkap" @change="tombol_registrasi()" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" @change="tombol_registrasi()">
                        <option value="">Pilih Gender</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gereja">Gereja</label>
                    <select id="gereja" x-model="pilihan" @change="tombol_registrasi()">
                        <option value="">Pilih Gereja</option>
                        <?php foreach ($list_gereja as $gereja) : ?>
                            <option value="<?= $gereja['nama']; ?>"><?= $gereja['nama']; ?></option>
                        <?php endforeach ?>
                        <option value="lainnya">Lainnya...</option>
                    </select>
                </div>
                <div class="form-group" id="gerejaLain" x-bind:class="pilihan === 'lainnya' ? 'active' : ''">
                    <label for="gerejaLainInput"></label>
                    <input type="text" id="gerejaLainInput" maxlength="100" x-model="lainnya" placeholder="Nama Gereja" @change="tombol_registrasi()">
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Lahir<br>(Optional)</label>
                    <input type="text" id="tahun" maxlength="4" placeholder="Tahun Lahir">
                </div>
                <div class="form-group with-checkbox">
                    <label for="whatsapp">Whatsapp<br>(Optional)</label>
                    <input type="text" id="whatsapp" maxlength="15" placeholder="No. Whatsapp">
                    <div class="checkbox" x-data="{ bersedia: false }">
                        <input type="checkbox" id="group_wa" :value="bersedia ? 1 : 0" x-model="bersedia">
                        <label for="group_wa">Bersedia masuk grup whatsapp pelprap wilayah 1
                            <br>(khusus anggota pelprap gereja di wilayah 1)
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="instagram">Instagram<br>(Optional)</label>
                    <input type="text" id="instagram" maxlength="100" placeholder="Akun Instagram">
                </div>
                <div class="form-group with-textarea mb-2" x-data="{ text: '', maxChars: 200 }">
                    <label for="harapan">Harapan</label>
                    <textarea x-model="text" maxlength="200" id="harapan" rows="3" placeholder="Tulis harapanmu untuk acara ini" @change="tombol_registrasi()"></textarea>
                    <span x-text="maxChars - text.length"></span>

                </div>
                <button type="button" class="submit-registrasi" id="submit-registrasi" disabled>Daftar</button>
                <div class="note-registrasi">
                    <p>Note :
                        <br>Informasi data yang masuk dari registrasi hanya akan dipergunakan untuk keperluan kegiatan-kegiatan pelprap GPdI wilayah 1 Jawa Barat.
                        <br>Jika teman-teman bersedia masuk ke grup whatsapp anggota Pelprap GPdI Wilayah 1, Silahkan isi kolom No. Whatsapp diatas dan centang checkboxnya.
                        <br>Jangan lupa juga follow instagram <i class="fa-brands fa-instagram"></i> Pelprap GPdI Wilayah 1 di <span class="ms-1"><a href="https://www.instagram.com/pelprapgpdiwilayah1bandung?igsh=MTV4emJibXd1bDkzOA==" target="_blank">@pelprapgpdiwilayah1bandung</a></span>
                    </p>
                </div>
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
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-verifikasi" data-kolom="gereja" data-sort="<?= $sort_peserta_verifikasi; ?>">Gereja
                                        <?php if ($kolom_peserta_verifikasi == 'gereja') : ?>
                                            <?php if ($sort_peserta_verifikasi == 'ASC') : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta_verifikasi as $row) : ?>
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
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-unverifikasi" data-kolom="gereja" data-sort="<?= $sort_peserta_unverifikasi; ?>">Gereja
                                        <?php if ($kolom_peserta_unverifikasi == 'gereja') : ?>
                                            <?php if ($sort_peserta_unverifikasi == 'ASC') : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($peserta_unverifikasi as $row) : ?>
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
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </th>
                                    <th class="text-center sort-order-summary" data-kolom="jumlah" data-sort="<?= $sort_peserta_summary; ?>">Jumlah
                                        <?php if ($kolom_peserta_summary == 'jumlah') : ?>
                                            <?php if ($sort_peserta_summary == 'ASC') : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                            <?php else : ?>
                                                <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
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
    <section class="section-1">
        <div class="konten-phil registrasi-harapan">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($harapan as $row) : ?>
                        <div class="swiper-slide" style="display: flex; justify-content: center;">
                            <div class="container-gambar-dana" style="width : 360px;">
                                <img src="<?= base_url(); ?>public/images/registrasi/harapan.png" alt="Poster">
                                <div class="nama-peserta"><?= $row['nama']; ?></div>
                                <div class="harapan-peserta"><?= $row['harapan']; ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination swiper-pagination"></div>
                <div class="swiper-button-next swiper-button-next"></div>
                <div class="swiper-button-prev swiper-button-prev"></div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="detail-peserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="exampleModalLabel">Detail Peserta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body isi-detail-peserta">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var swiper = new Swiper('.swiper', {
            slidesPerView: 1, // Menampilkan 2 slide dalam satu tampilan
            spaceBetween: 10,
            loop: document.querySelectorAll('.swiper-slide').length > 1,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                768: {
                    slidesPerView: 2, // 2 slide pada layar lebih besar dari 768px
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3, // 3 slide pada layar lebih besar dari 1024px
                    spaceBetween: 30,
                }
            }
        });
    });
</script>
<?= $this->include('Templates/footer'); ?>
<?= $this->endSection(); ?>