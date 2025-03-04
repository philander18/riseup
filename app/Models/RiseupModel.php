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
        return $this->db->table('produk')->select('id, nama, gambar, harga')->get()->getResultArray();
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
}
