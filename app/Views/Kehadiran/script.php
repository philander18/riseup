<script>
    function capitalizeEachWord(str) {
        return str
            .toLowerCase()
            .split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
    }

    function welcomeApp() {
        return {
            names: [],
            gereja: [],
            index: 0,
            currentName: '',
            currentGereja: '',

            async fetchNames() {
                try {
                    const res = await fetch('<?= base_url(); ?>kehadiran/get_hadir');
                    const data = await res.json();
                    this.names = data.map(item => item.nama);
                    this.gereja = data.map(item => item.gereja);
                    this.index = 0;
                    if (this.names.length > 0) {
                        this.currentName = this.names[this.index];
                        this.currentGereja = this.gereja[this.index];
                    }
                    // this.index = 0;
                    // this.currentName = this.names.length > 0 ? this.names[0] : '';
                    // this.currentGereja = this.gereja.length > 0 ? this.gereja[0] : '';
                    // this.currentName = this.names[this.index]
                    // this.currentGereja = this.gereja[this.index]
                } catch (e) {
                    console.error("Gagal fetch data:", e);
                }
            },

            updateName() {
                if (this.names.length === 0) return;
                this.index = (this.index + 1) % this.names.length;
                this.currentName = this.names[this.index];
                this.currentGereja = this.gereja[this.index];
                console.log(this.index);
            },

            async init() {
                await this.fetchNames(); // Ambil data & tampilkan nama pertama
                // this.updateName();
                setInterval(() => this.updateName(), 5000); // Ganti nama tiap 5 detik
                setInterval(() => this.fetchNames(), 50000); // Ambil ulang dari DB tiap 1 menit
            }
        }
    }

    function refresh_peserta_hadir(keyword, page, gereja, kolom, sort) {
        $.ajax({
            url: method_url('Kehadiran', 'refresh_tabel_peserta_hadir'),
            data: {
                keyword: keyword,
                page: page,
                gereja: gereja,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-peserta_hadir').html(data);
            }
        });
    }

    $(document).ready(function() {
        $('.cek_hadir').on('change', function() {
            const id = $(this).data('id');
            let hadir;
            if ($(this).is(":checked")) {
                hadir = 1
            } else {
                hadir = 0
            }
            $.ajax({
                url: method_url('Kehadiran', 'update_kehadiran'),
                data: {
                    id: id,
                    hadir: hadir,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {}
            });
        });
        $('.modal-detail-peserta').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: method_url('Registrasi', 'get_detail_peserta'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-peserta').html(data);
                }
            });
        });
        $('#list_gereja-peserta_hadir').on('change', function() {
            refresh_peserta_hadir($('#keyword-peserta_hadir').val(), 1, $(this).val(), $('#kolom-peserta_hadir').val(), $('#sort-peserta_hadir').val());
        });
        $('#keyword-peserta_hadir').on('keyup', function() {
            refresh_peserta_hadir($(this).val(), 1, $('#list_gereja-peserta_hadir').val(), $('#kolom-peserta_hadir').val(), $('#sort-peserta_hadir').val());
        });
        $(".link-peserta_hadir").on('click', function() {
            refresh_peserta_hadir($('#keyword-peserta_hadir').val(), $(this).data('page'), $('#list_gereja-peserta_hadir').val(), $('#kolom-peserta_hadir').val(), $('#sort-peserta_hadir').val());
        });
        $(".sort-order-hadir").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta_hadir').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta_hadir($('#keyword-peserta_hadir').val(), 1, $('#list_gereja-peserta_hadir').val(), $(this).data('kolom'), sort);
        });
    });
</script>