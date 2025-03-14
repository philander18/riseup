<?php

namespace App\Controllers;

use App\Models\RiseupModel;

class Laporan extends BaseController
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
        $kolom_dana_masuk = 'deskripsi';
        $sort_dana_masuk = 'ASC';
        $order_dana_masuk = $kolom_dana_masuk . ' ' . $sort_dana_masuk;
        $kolom_summary_dana_masuk = 'kategori';
        $sort_summary_dana_masuk = 'ASC';
        $order_summary_dana_masuk = $kolom_summary_dana_masuk . ' ' . $sort_summary_dana_masuk;
        $kolom_dana_keluar = 'deskripsi';
        $sort_dana_keluar = 'ASC';
        $order_dana_keluar = $kolom_dana_keluar . ' ' . $sort_dana_keluar;
        $kolom_summary_dana_keluar = 'kategori';
        $sort_summary_dana_keluar = 'ASC';
        $order_summary_dana_keluar = $kolom_summary_dana_keluar . ' ' . $sort_summary_dana_keluar;
        $data = [
            'dana_masuk' => $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_dana_masuk, 'All')['tabel'],
            'pagination_dana_masuk' => $this->pagination($page, $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_dana_masuk, 'All')['lastpage']),
            'last_dana_masuk' => $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_dana_masuk, 'All')['lastpage'],
            'jumlah_dana_masuk' => $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_dana_masuk, 'All')['jumlah'],
            'page' => $page,
            'kolom_dana_masuk' => $kolom_dana_masuk,
            'sort_dana_masuk' => $sort_dana_masuk,
            'summary_dana_masuk' => $this->RiseupModel->search_summary_dana_masuk("", $this->jumlahlist, 0, $order_summary_dana_masuk)['tabel'],
            'pagination_summary_dana_masuk' => $this->pagination($page, $this->RiseupModel->search_summary_dana_masuk("", $this->jumlahlist, 0, $order_summary_dana_masuk)['lastpage']),
            'last_summary_dana_masuk' => $this->RiseupModel->search_summary_dana_masuk("", $this->jumlahlist, 0, $order_summary_dana_masuk)['lastpage'],
            'jumlah_summary_dana_masuk' => $this->RiseupModel->search_summary_dana_masuk("", $this->jumlahlist, 0, $order_summary_dana_masuk)['jumlah'],
            'kolom_summary_dana_masuk' => $kolom_summary_dana_masuk,
            'sort_summary_dana_masuk' => $sort_summary_dana_masuk,
            'dana_keluar' => $this->RiseupModel->search_dana_keluar("", $this->jumlahlist, 0, $order_dana_keluar, 'All')['tabel'],
            'pagination_dana_keluar' => $this->pagination($page, $this->RiseupModel->search_dana_keluar("", $this->jumlahlist, 0, $order_dana_keluar, 'All')['lastpage']),
            'last_dana_keluar' => $this->RiseupModel->search_dana_keluar("", $this->jumlahlist, 0, $order_dana_keluar, 'All')['lastpage'],
            'jumlah_dana_keluar' => $this->RiseupModel->search_dana_keluar("", $this->jumlahlist, 0, $order_dana_keluar, 'All')['jumlah'],
            'kolom_dana_keluar' => $kolom_dana_keluar,
            'sort_dana_keluar' => $sort_dana_keluar,
            'summary_dana_keluar' => $this->RiseupModel->search_summary_dana_keluar("", $this->jumlahlist, 0, $order_summary_dana_keluar)['tabel'],
            'pagination_summary_dana_keluar' => $this->pagination($page, $this->RiseupModel->search_summary_dana_keluar("", $this->jumlahlist, 0, $order_summary_dana_keluar)['lastpage']),
            'last_summary_dana_keluar' => $this->RiseupModel->search_summary_dana_keluar("", $this->jumlahlist, 0, $order_summary_dana_keluar)['lastpage'],
            'jumlah_summary_dana_keluar' => $this->RiseupModel->search_summary_dana_keluar("", $this->jumlahlist, 0, $order_summary_dana_keluar)['jumlah'],
            'kolom_summary_dana_keluar' => $kolom_summary_dana_keluar,
            'sort_summary_dana_keluar' => $sort_summary_dana_keluar,
            'judul' => 'Laporan',
            'akses' => $session->akses,
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'produk' => $this->RiseupModel->list_produk(),
        ];
        return view('Laporan/index', $data);
    }

    public function refresh_dana_masuk()
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
        $kolom_dana_masuk = $_POST['kolom'];
        $sort_dana_masuk = $_POST['sort'];
        $order_dana_masuk = $kolom_dana_masuk . ' ' . $sort_dana_masuk;
        $data = [
            'dana_masuk' => $this->RiseupModel->search_dana_masuk($keyword, $this->jumlahlist, $index, $order_dana_masuk, $_POST['kategori'])['tabel'],
            'pagination_dana_masuk' => $this->pagination($page, $this->RiseupModel->search_dana_masuk($keyword, $this->jumlahlist, $index, $order_dana_masuk, $_POST['kategori'])['lastpage']),
            'last_dana_masuk' => $this->RiseupModel->search_dana_masuk($keyword, $this->jumlahlist, $index, $order_dana_masuk, $_POST['kategori'])['lastpage'],
            'jumlah_dana_masuk' => $this->RiseupModel->search_dana_masuk($keyword, $this->jumlahlist, $index, $order_dana_masuk, $_POST['kategori'])['jumlah'],
            'page' => $page,
            'kolom_dana_masuk' => $kolom_dana_masuk,
            'sort_dana_masuk' => $sort_dana_masuk
        ];
        return view('Laporan/Ajax/dana_masuk', $data);
    }
    public function refresh_summary_dana_masuk()
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
        $kolom_summary_dana_masuk = $_POST['kolom'];
        $sort_summary_dana_masuk = $_POST['sort'];
        $order_summary_dana_masuk = $kolom_summary_dana_masuk . ' ' . $sort_summary_dana_masuk;
        $data = [
            'summary_dana_masuk' => $this->RiseupModel->search_summary_dana_masuk($keyword, $this->jumlahlist, $index, $order_summary_dana_masuk)['tabel'],
            'pagination_summary_dana_masuk' => $this->pagination($page, $this->RiseupModel->search_summary_dana_masuk($keyword, $this->jumlahlist, $index, $order_summary_dana_masuk)['lastpage']),
            'last_summary_dana_masuk' => $this->RiseupModel->search_summary_dana_masuk($keyword, $this->jumlahlist, $index, $order_summary_dana_masuk)['lastpage'],
            'jumlah_summary_dana_masuk' => $this->RiseupModel->search_summary_dana_masuk($keyword, $this->jumlahlist, $index, $order_summary_dana_masuk)['jumlah'],
            'page' => $page,
            'kolom_summary_dana_masuk' => $kolom_summary_dana_masuk,
            'sort_summary_dana_masuk' => $sort_summary_dana_masuk
        ];
        return view('Laporan/Ajax/summary_dana_masuk', $data);
    }

    public function refresh_dana_keluar()
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
        $kolom_dana_keluar = $_POST['kolom'];
        $sort_dana_keluar = $_POST['sort'];
        $order_dana_keluar = $kolom_dana_keluar . ' ' . $sort_dana_keluar;
        $data = [
            'dana_keluar' => $this->RiseupModel->search_dana_keluar($keyword, $this->jumlahlist, $index, $order_dana_keluar, $_POST['kategori'])['tabel'],
            'pagination_dana_keluar' => $this->pagination($page, $this->RiseupModel->search_dana_keluar($keyword, $this->jumlahlist, $index, $order_dana_keluar, $_POST['kategori'])['lastpage']),
            'last_dana_keluar' => $this->RiseupModel->search_dana_keluar($keyword, $this->jumlahlist, $index, $order_dana_keluar, $_POST['kategori'])['lastpage'],
            'jumlah_dana_keluar' => $this->RiseupModel->search_dana_keluar($keyword, $this->jumlahlist, $index, $order_dana_keluar, $_POST['kategori'])['jumlah'],
            'page' => $page,
            'kolom_dana_keluar' => $kolom_dana_keluar,
            'sort_dana_keluar' => $sort_dana_keluar
        ];
        return view('Laporan/Ajax/dana_keluar', $data);
    }
    public function refresh_summary_dana_keluar()
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
        $kolom_summary_dana_keluar = $_POST['kolom'];
        $sort_summary_dana_keluar = $_POST['sort'];
        $order_summary_dana_keluar = $kolom_summary_dana_keluar . ' ' . $sort_summary_dana_keluar;
        $data = [
            'summary_dana_keluar' => $this->RiseupModel->search_summary_dana_keluar($keyword, $this->jumlahlist, $index, $order_summary_dana_keluar)['tabel'],
            'pagination_summary_dana_keluar' => $this->pagination($page, $this->RiseupModel->search_summary_dana_keluar($keyword, $this->jumlahlist, $index, $order_summary_dana_keluar)['lastpage']),
            'last_summary_dana_keluar' => $this->RiseupModel->search_summary_dana_keluar($keyword, $this->jumlahlist, $index, $order_summary_dana_keluar)['lastpage'],
            'jumlah_summary_dana_keluar' => $this->RiseupModel->search_summary_dana_keluar($keyword, $this->jumlahlist, $index, $order_summary_dana_keluar)['jumlah'],
            'page' => $page,
            'kolom_summary_dana_keluar' => $kolom_summary_dana_keluar,
            'sort_summary_dana_keluar' => $sort_summary_dana_keluar
        ];
        return view('Laporan/Ajax/summary_dana_keluar', $data);
    }

    public function input_dana()
    {
        $session = session();
        $file = $this->request->getFile('bukti-dana-masuk');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('images/bukti_dana', $newName); // Simpan di folder images/bukti_dana
        }
        $data = [
            'tanggal' => $this->request->getPost('tanggal-dana-masuk'),
            'deskripsi' => $this->request->getPost('nama-dana-masuk'),
            'jenis' => $this->request->getPost('jenis-dana-masuk'),
            'kategori' => $this->request->getPost('kategori-dana-masuk'),
            'jumlah' => $this->request->getPost('jumlah-dana-masuk'),
            'pic' => $session->akses,
            'catatan' => $this->request->getPost('catatan-dana-masuk'),
            'bukti' => $newName,
        ];
        $this->RiseupModel->input_dana($data);
        return redirect()->to('laporan')->with('pesan', 'Input dana berhasil.');
    }

    public function get_detail_dana()
    {
        $data = [
            'dana' => $this->RiseupModel->get_dana_byid($_POST['id'])[0],
        ];
        return view('Laporan/Ajax/dana', $data);
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
