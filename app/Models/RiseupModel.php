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
        $list_gereja = $this->db->table('list_gereja')->select('nama')->distinct('nama')->orderBy('nama', 'asc')->get()->getResultArray();
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
    function input_bukti($data)
    {
        return $this->db->table('pembayaran')->insert($data);
    }

    public function search_peserta($keyword, $jumlahlist, $index, $order, $gereja, $verified)
    {
        if ($gereja == 'All') {
            $where = "nama like '%" . $keyword . "%' and verified = " . $verified;
        } else {
            $where = "nama like '%" . $keyword . "%' and gereja = '" . $gereja . "' and verified = " . $verified;
        }
        $select = "nama, gereja";
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

    public function search_summary($keyword, $jumlahlist, $index, $order)
    {
        $where = "gereja like '%" . $keyword . "%' and verified = 1";
        $select = "gereja, count(gereja) as jumlah";
        $all = $this->db->table('peserta')->select($select)->where($where)->orderBy($order)->groupBy('gereja')->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }

    // Akses database terkait shop
    public function search_orderan($keyword, $jumlahlist, $index, $order, $lunas)
    {
        $select = "kode, nama, updated_at as tanggal";
        $where = "nama like '%" . $keyword . "%' and lunas = " . $lunas;
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

    public function get_orderan_bykode($kode)
    {
        return $this->db->table('orderan')->join('produk', 'orderan.produk = produk.kode', 'left')->select("orderan.kode as kode, orderan.nama as pembeli, orderan.lunas as lunas, produk.nama as nama, produk.harga as harga, orderan.jumlah as jumlah, (produk.harga * orderan.jumlah) as total")->where('orderan.kode', $kode)->get()->getResultArray();
    }
}
