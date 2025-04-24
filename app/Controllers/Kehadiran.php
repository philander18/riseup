<?php

namespace App\Controllers;

use App\Models\RiseupModel;

class Kehadiran extends BaseController
{
    protected $RiseupModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->RiseupModel = new RiseupModel();
    }
    public function index()
    {
        $session = session();
        if (!$session->has('akses')) {
            return redirect()->to('home/portal')->with('notifikasi', 'Perlu masukkan kode dulu.');
        }
        $page = 1;
        $kolom_peserta_hadir = 'nama';
        $sort_peserta_hadir = 'ASC';
        $order_peserta_hadir = $kolom_peserta_hadir . ' ' . $sort_peserta_hadir;
        $data = [
            'judul' => 'Kehadiran',
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'peserta_hadir' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_hadir, 'All', 1)['tabel'],
            'pagination_peserta_hadir' => $this->pagination($page, $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_hadir, 'All', 1)['lastpage']),
            'last_peserta_hadir' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_hadir, 'All', 1)['lastpage'],
            'jumlah_peserta_hadir' => $this->RiseupModel->search_peserta("", $this->jumlahlist, 0, $order_peserta_hadir, 'All', 1)['jumlah'],
            'page' => $page,
            'kolom_peserta_hadir' => $kolom_peserta_hadir,
            'sort_peserta_hadir' => $sort_peserta_hadir,
            'akses' => $session->akses,
            'produk' => $this->RiseupModel->list_produk(),
        ];
        return view('Kehadiran/index', $data);
    }
    public function refresh_tabel_peserta_hadir()
    {
        $session = session();
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
        $kolom_peserta_hadir = $_POST['kolom'];
        $sort_peserta_hadir = $_POST['sort'];
        $order_peserta_hadir = $kolom_peserta_hadir . ' ' . $sort_peserta_hadir;
        $gereja = $_POST['gereja'];
        $data = [
            'peserta_hadir' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_hadir, $gereja, 1)['tabel'],
            'pagination_peserta_hadir' => $this->pagination($page, $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_hadir, $gereja, 1)['lastpage']),
            'last_peserta_hadir' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_hadir, $gereja, 1)['lastpage'],
            'jumlah_peserta_hadir' => $this->RiseupModel->search_peserta($keyword, $this->jumlahlist, $index, $order_peserta_hadir, $gereja, 1)['jumlah'],
            'page' => $page,
            'kolom_peserta_hadir' => $kolom_peserta_hadir,
            'sort_peserta_hadir' => $sort_peserta_hadir,
            'akses' => $session->akses,
        ];
        return view('Kehadiran/Ajax/peserta_hadir', $data);
    }

    public function update_kehadiran()
    {
        $id = $_POST['id'];
        $data = [
            'hadir' => $_POST['hadir'],
        ];
        $this->RiseupModel->update_kehadiran($id, $data);
    }

    public function welcome()
    {
        $session = session();
        // d($this->RiseupModel->get_hadir());
        $data = [
            'judul' => 'Welcome',
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'akses' => $session->akses,
            'produk' => $this->RiseupModel->list_produk(),
        ];
        return view('Kehadiran/welcome', $data);
    }

    public function get_hadir()
    {
        $data = $this->RiseupModel->get_hadir();
        return $this->response->setJSON($data);
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
