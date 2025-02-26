<?php

namespace App\Controllers;

use App\Models\RiseupModel;
use DateTime;

class Registrasi extends BaseController
{
    protected $RiseupModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->RiseupModel = new RiseupModel();
    }
    public function index(): string
    {
        $page = 1;
        $kolom_peserta_verifikasi = 'nama';
        $sort_peserta_verifikasi = 'ASC';
        $order_peserta_verifikasi = $kolom_peserta_verifikasi . ' ' . $sort_peserta_verifikasi;
        $kolom_peserta_unverifikasi = 'nama';
        $sort_peserta_unverifikasi = 'ASC';
        $order_peserta_unverifikasi = $kolom_peserta_unverifikasi . ' ' . $sort_peserta_unverifikasi;
        $kolom_peserta_summary = 'gereja';
        $sort_peserta_summary = 'ASC';
        $order_peserta_summary = $kolom_peserta_summary . ' ' . $sort_peserta_summary;
        $data = [
            'judul' => 'Registrasi',
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'peserta_verifikasi' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_verifikasi, 'All', 1)['tabel'],
            'pagination_peserta_verifikasi' => $this->pagination($page, $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_verifikasi, 'All', 1)['lastpage']),
            'last_peserta_verifikasi' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_verifikasi, 'All', 1)['lastpage'],
            'jumlah_peserta_verifikasi' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_verifikasi, 'All', 1)['jumlah'],
            'page' => $page,
            'kolom_peserta_verifikasi' => $kolom_peserta_verifikasi,
            'sort_peserta_verifikasi' => $sort_peserta_verifikasi,
            'peserta_unverifikasi' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_unverifikasi, 'All', 0)['tabel'],
            'pagination_peserta_unverifikasi' => $this->pagination($page, $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_unverifikasi, 'All', 0)['lastpage']),
            'last_peserta_unverifikasi' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_unverifikasi, 'All', 0)['lastpage'],
            'jumlah_peserta_unverifikasi' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_unverifikasi, 'All', 0)['jumlah'],
            'kolom_peserta_unverifikasi' => $kolom_peserta_unverifikasi,
            'sort_peserta_unverifikasi' => $sort_peserta_unverifikasi,
            'peserta_summary' => $this->RiseupModel->search_summary("", $this->jumlahlist, 0, $order_peserta_summary)['tabel'],
            'pagination_peserta_summary' => $this->pagination($page, $this->RiseupModel->search_summary("", $this->jumlahlist, 0, $order_peserta_summary)['lastpage']),
            'last_peserta_summary' => $this->RiseupModel->search_summary("", $this->jumlahlist, 0, $order_peserta_summary)['lastpage'],
            'jumlah_peserta_summary' => $this->RiseupModel->search_summary("", $this->jumlahlist, 0, $order_peserta_summary)['jumlah'],
            'kolom_peserta_summary' => $kolom_peserta_summary,
            'sort_peserta_summary' => $sort_peserta_summary
        ];
        return view('Registrasi/index', $data);
    }

    public function refresh_tabel_peserta_verifikasi()
    {
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $kolom_peserta_verifikasi = $_POST['kolom'];
        $sort_peserta_verifikasi = $_POST['sort'];
        $order_peserta_verifikasi = $kolom_peserta_verifikasi . ' ' . $sort_peserta_verifikasi;
        $gereja = $_POST['gereja'];
        $data = [
            'peserta_verifikasi' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_verifikasi, $gereja, 1)['tabel'],
            'pagination_peserta_verifikasi' => $this->pagination($page, $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_verifikasi, $gereja, 1)['lastpage']),
            'last_peserta_verifikasi' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_verifikasi, $gereja, 1)['lastpage'],
            'jumlah_peserta_verifikasi' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_verifikasi, $gereja, 1)['jumlah'],
            'page' => $page,
            'kolom_peserta_verifikasi' => $kolom_peserta_verifikasi,
            'sort_peserta_verifikasi' => $sort_peserta_verifikasi
        ];
        return view('Registrasi/Ajax/peserta_verifikasi', $data);
    }
    public function refresh_tabel_peserta_unverifikasi()
    {
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $kolom_peserta_unverifikasi = $_POST['kolom'];
        $sort_peserta_unverifikasi = $_POST['sort'];
        $order_peserta_unverifikasi = $kolom_peserta_unverifikasi . ' ' . $sort_peserta_unverifikasi;
        $gereja = $_POST['gereja'];
        $data = [
            'peserta_unverifikasi' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_unverifikasi, $gereja, 0)['tabel'],
            'pagination_peserta_unverifikasi' => $this->pagination($page, $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_unverifikasi, $gereja, 0)['lastpage']),
            'last_peserta_unverifikasi' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_unverifikasi, $gereja, 0)['lastpage'],
            'jumlah_peserta_unverifikasi' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_unverifikasi, $gereja, 0)['jumlah'],
            'page' => $page,
            'kolom_peserta_unverifikasi' => $kolom_peserta_unverifikasi,
            'sort_peserta_unverifikasi' => $sort_peserta_unverifikasi
        ];
        return view('Registrasi/Ajax/peserta_unverifikasi', $data);
    }

    public function refresh_tabel_peserta_summary()
    {
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $kolom_peserta_summary = $_POST['kolom'];
        $sort_peserta_summary = $_POST['sort'];
        $order_peserta_summary = $kolom_peserta_summary . ' ' . $sort_peserta_summary;
        $data = [
            'peserta_summary' => $this->RiseupModel->search_summary($keyword, $this->jumlahlist, $index, $order_peserta_summary)['tabel'],
            'pagination_peserta_summary' => $this->pagination($page, $this->RiseupModel->search_summary($keyword, $this->jumlahlist, $index, $order_peserta_summary)['lastpage']),
            'last_peserta_summary' => $this->RiseupModel->search_summary($keyword, $this->jumlahlist, $index, $order_peserta_summary)['lastpage'],
            'jumlah_peserta_summary' => $this->RiseupModel->search_summary($keyword, $this->jumlahlist, $index, $order_peserta_summary)['jumlah'],
            'page' => $page,
            'kolom_peserta_summary' => $kolom_peserta_summary,
            'sort_peserta_summary' => $sort_peserta_summary
        ];
        return view('Registrasi/Ajax/peserta_summary', $data);
    }

    public function input_peserta()
    {
        $data = [
            'nama' => $_POST['nama'],
            'gender' => $_POST['gender'],
            'gereja' => $_POST['gereja'],
            'tahun_lahir' => $_POST['tahun_lahir'],
            'whatsapp' => $_POST['whatsapp'],
            'group_wa' => $_POST['group_wa'],
            'instagram' => $_POST['instagram'],
            'harapan' => $_POST['harapan'],
            'verified' => 0
        ];
        if ($this->RiseupModel->input_peserta($data)) {
            session()->setFlashdata('pesan', 'Registrasi ' . $_POST['nama'] . ' dari gereja ' . $_POST['gereja'] . ' berhasil dan akan segera diverifikasi, jika dalam 3 hari belum diverifikasi bisa menghubungi panitia');
        } else {
            session()->setFlashdata('pesan', 'Registrasi gagal.');
        }
        return view('Templates/flash');
    }

    public function pagination($page, $lastpage)
    {
        $pagination = [
            'first' => false,
            'previous' => false,
            'next' => false,
            'last' => false
        ];
        if ($lastpage == 1) {
            $pagination['number'] = [1];
        } elseif ($lastpage == 2) {
            $pagination['number'] = [1, 2];
        } elseif ($lastpage == 3) {
            $pagination['number'] = [1, 2, 3];
        } elseif ($lastpage == 4) {
            $pagination['number'] = [1, 2, 3, 4];
        } elseif ($lastpage == 5) {
            $pagination['number'] = [1, 2, 3, 4, 5];
        } else {
            if ($page >= 1 and $page <= 3) {
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [1, 2, 3];
            } elseif ($page >= $lastpage - 2 and $page <= $lastpage) {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['number'] = [$lastpage - 2, $lastpage - 1, $lastpage];
            } else {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [$page - 1, $page, $page + 1];
            }
        };
        $pagination['page'] = $page;
        return $pagination;
    }
}
