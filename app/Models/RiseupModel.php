<?php

namespace App\Models;

use CodeIgniter\Model;

class RiseupModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['nama', 'gender', 'gereja', 'tahun_lahir', 'whatsapp', 'group_wa', 'instagram', 'harapan', 'verified', 'pic'];
    public function akses($kode)
    {
        $where = "kode = '" . $kode . "'";
        return $this->db->table('akses')->select('posisi, akses, kode')->where($where)->get()->getResultArray();
    }

    public function list_produk()
    {
        return $this->db->table('produk')->select('id, kode, nama, gambar, harga')->orderBy('urutan asc')->get()->getResultArray();
    }

    public function list_gereja()
    {
        $list_gereja = $this->db->table('list_gereja')->select('nama')->distinct('nama')->orderBy("wilayah asc, nama asc")->get()->getResultArray();
        $data['list_gereja'] = $list_gereja;
        $data['select_gereja'] = $list_gereja[0]['nama'];
        return $data;
    }

    function input_peserta($data)
    {
        return $this->db->table('peserta')->insert($data);
    }
    function input_orderan($data)
    {
        return $this->db->table('orderan')->insert($data);
    }
    function input_list_items($data)
    {
        return $this->db->table('list_items')->insert($data);
    }

    function update_lunas($kode, $data)
    {
        return $this->db->table('orderan')->where('kode', $kode)->update($data);
    }
    function update_bukti_valid($id, $data)
    {
        return $this->db->table('pembayaran')->where('id', $id)->update($data);
    }
    function input_bukti($data)
    {
        return $this->db->table('pembayaran')->insert($data);
    }

    function input_dana($data)
    {
        return $this->db->table('dana')->insert($data);
    }

    function update_kehadiran($id, $data)
    {
        return $this->db->table('peserta')->where('id', $id)->update($data);
    }

    function jumlah_kehadiran()
    {
        return $this->db->table('peserta')->select('count(hadir) as jumlah')->where('hadir = 1')->get()->getResultArray();
    }

    function nama_hadir()
    {
        return $this->db->table('peserta')->select('nama, gereja')->where('hadir = 1')->get()->getResultArray();
    }

    public function search_peserta($keyword, $jumlahlist, $index, $order, $gereja, $verified)
    {
        if ($gereja == 'All') {
            $where = "nama like '%" . $keyword . "%' and verified = " . $verified;
        } else {
            $where = "nama like '%" . $keyword . "%' and gereja = '" . $gereja . "' and verified = " . $verified;
        }
        $select = "id, nama, gereja, harapan, hadir";
        $all = $this->db->table('peserta')->select($select)->where($where)->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }
    public function peserta_random()
    {
        $where = "verified = 1";
        $select = "id, nama, harapan";
        $data = $this->db->table('peserta')->select($select)->where($where)->orderBy('rand()')->limit(50)->get()->getResultArray();
        return $data;
    }

    public function search_summary($keyword, $jumlahlist, $index, $order)
    {
        $where = "gereja like '%" . $keyword . "%' and verified = 1";
        $select = "gereja, count(gereja) as jumlah";
        $all = $this->db->table('peserta')->select($select)->where($where)->orderBy($order)->groupBy('gereja')->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $total = $this->db->table('peserta')->select('count(verified) as jumlah')->where('verified = 1')->groupBy('verified')->get()->getResultArray();
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        $data['total'] = $total[0]['jumlah'];
        return $data;
    }

    function update_verifikasi_peserta($id, $data)
    {
        return $this->db->table('peserta')->where('id', $id)->update($data);
    }

    public function get_hadir()
    {
        return $this->db->table('peserta')->select('nama, gereja, hadir')->where('hadir', 1)->orderBy('updated_at', 'DESC')->limit(10)->get()->getResultArray();
    }

    // Akses database terkait laporan
    public function search_dana_masuk($keyword, $jumlahlist, $index, $order, $kategori)
    {
        if ($kategori == 'All') {
            $where = "deskripsi like '%" . $keyword . "%' and jenis = 'masuk'";
        } else {
            $where = "deskripsi like '%" . $keyword . "%' and jenis = 'masuk' and kategori = '" . $kategori . "'";
        }
        $all = $this->db->table('dana')->select('*')->where($where)->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }
    public function search_dana_keluar($keyword, $jumlahlist, $index, $order, $kategori)
    {
        if ($kategori == 'All') {
            $where = "deskripsi like '%" . $keyword . "%' and jenis = 'keluar'";
        } else {
            $where = "deskripsi like '%" . $keyword . "%' and jenis = 'keluar' and kategori = '" . $kategori . "'";
        }
        $all = $this->db->table('dana')->select('*')->where($where)->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }

    public function search_summary_dana_masuk($keyword, $jumlahlist, $index, $order)
    {

        $where = "kategori like '%" . $keyword . "%' and jenis = 'masuk'";
        $all = $this->db->table('dana')->select('kategori, sum(jumlah) as jumlah')->where($where)->groupBy('kategori')->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }
    public function search_summary_dana_keluar($keyword, $jumlahlist, $index, $order)
    {

        $where = "kategori like '%" . $keyword . "%' and jenis = 'keluar'";
        $all = $this->db->table('dana')->select('kategori, sum(jumlah) as jumlah')->where($where)->groupBy('kategori')->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }

    public function hapus_dana($id)
    {
        $this->db->table('dana')->where('id', $id)->delete();
    }

    // Akses database terkait shop
    public function search_orderan($keyword, $jumlahlist, $index, $order, $lunas, $tanggal_awal, $tanggal_akhir)
    {
        $select = "kode, nama, UNIX_TIMESTAMP(updated_at) as tanggal";
        $where = "nama like '%" . $keyword . "%' and lunas = " . $lunas . " and UNIX_TIMESTAMP(updated_at) >= " . $tanggal_awal . " and UNIX_TIMESTAMP(updated_at) < " . $tanggal_akhir;
        $all = $this->db->table('orderan')->distinct()->select($select)->where($where)->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }
    public function search_rekap_orderan($keyword, $jumlahlist, $index, $order, $tanggal_awal, $tanggal_akhir)
    {
        $select = "produk.nama as produk, sum(list_items.jumlah) as jumlah";
        $where = "produk.nama like '%" . $keyword . "%' and orderan.lunas = 1 and UNIX_TIMESTAMP(orderan.updated_at) >= " . $tanggal_awal . " and UNIX_TIMESTAMP(orderan.updated_at) < " . $tanggal_akhir;
        $all = $this->db->table('list_items')->join('orderan', 'list_items.kode = orderan.kode', 'left')->join('produk', 'list_items.produk = produk.kode', 'left')->select($select)->where($where)->orderBy($order)->groupBy('produk.nama')->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }

    public function hapus_order($kode)
    {
        $this->db->table('orderan')->where('kode', $kode)->delete();
    }

    public function search_game($keyword, $jumlahlist, $index, $order)
    {
        $waktu = (int) $this->get_game_bytanda('mulai')[0]['waktu'];
        $select = "pembayaran.kode as kode, orderan.nama as nama, UNIX_TIMESTAMP(pembayaran.updated_at) as tanggal";
        $where = "orderan.nama like '%" . $keyword . "%' and UNIX_TIMESTAMP(pembayaran.updated_at) >= " . $waktu;
        $all = $this->db->table('pembayaran')->join('orderan', 'pembayaran.kode = orderan.kode', 'left')->distinct()->select($select)->where($where)->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }

    public function get_detail_orderan_bykode($kode)
    {
        return $this->db->table('list_items')->join('orderan', 'orderan.kode = list_items.kode', 'left')->join('produk', 'list_items.produk = produk.kode', 'left')->select("orderan.kode as kode, orderan.nama as nama, orderan.pengiriman as pengiriman, orderan.hp as hp, orderan.alamat as alamat, orderan.gereja as gereja, orderan.lunas as lunas, list_items.produk as produk, list_items.jumlah as jumlah, produk.nama as nama_produk, produk.harga as harga, (produk.harga * list_items.jumlah) as total")->where('orderan.kode', $kode)->get()->getResultArray();
    }

    public function get_orderan_bykode($kode)
    {
        return $this->db->table('orderan')->select('kode')->where('kode', $kode)->get()->getResultArray();
    }
    public function get_produk_bykode($kode)
    {
        return $this->db->table('produk')->select("*")->where('kode', $kode)->get()->getResultArray();
    }
    public function get_game_bytanda($tanda)
    {
        return $this->db->table('game')->select("*")->where('tanda', $tanda)->get()->getResultArray();
    }

    public function get_gambar_bykode($kode)
    {
        return $this->db->table('pembayaran')->select("*")->where('kode', $kode)->get()->getResultArray();
    }

    public function get_dana_byid($id)
    {
        return $this->db->table('dana')->select("*")->where('id', $id)->get()->getResultArray();
    }
    public function get_peserta_byid($id)
    {
        return $this->db->table('peserta')->select("*")->where('id', $id)->get()->getResultArray();
    }

    function update_start_game($tanda, $data)
    {
        return $this->db->table('game')->where('tanda', $tanda)->update($data);
    }
}
