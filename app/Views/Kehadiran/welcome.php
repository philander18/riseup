<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div x-data="welcomeApp()" x-init="init()" class="container-fluid selamat_datang">
    <div class="container-phil">
        <div class="judul-1 text-white m-0" style="font-size: 10vh;">Selamat Datang</div>
        <div x-text="capitalizeEachWord(currentName)" class="judul-1 text-decoration-underline" style="font-size: 8vh;"></div>
        <div x-text="currentGereja" class="judul-1" style="font-size: 4vh;"></div>
    </div>
</div>
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
                    const res = await fetch('<?= base_url(); ?>Kehadiran/get_hadir');
                    const data = await res.json();
                    this.names = data.map(item => item.nama);
                    this.gereja = data.map(item => item.gereja);
                    this.index = 0;
                    this.currentName = this.names.length > 0 ? this.names[0] : '';
                    this.currentGereja = this.gereja.length > 0 ? this.gereja[0] : '';
                } catch (e) {
                    console.error("Gagal fetch data:", e);
                }
            },
            updateName() {
                if (this.names.length === 0) return;
                this.currentName = this.names[this.index];
                this.currentGereja = this.gereja[this.index];
                this.index = (this.index + 1) % this.names.length;
            },

            async init() {
                await this.fetchNames(); // Ambil data & tampilkan nama pertama
                setInterval(() => this.updateName(), 6000); // Ganti nama tiap 5 detik
                setInterval(() => this.fetchNames(), 60000); // Ambil ulang dari DB tiap 1 menit
            }
        }
    }
</script>
<?= $this->endSection(); ?>