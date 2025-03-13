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
        $kolom_taburan_iman = 'deskripsi';
        $sort_taburan_iman = 'ASC';
        $order_taburan_iman = $kolom_taburan_iman . ' ' . $sort_taburan_iman;
        $data = [
            'taburan_iman' => $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_taburan_iman, 'taburan iman')['tabel'],
            'pagination_taburan_iman' => $this->pagination($page, $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_taburan_iman, 'taburan iman')['lastpage']),
            'last_taburan_iman' => $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_taburan_iman, 'taburan iman')['lastpage'],
            'jumlah_taburan_iman' => $this->RiseupModel->search_dana_masuk("", $this->jumlahlist, 0, $order_taburan_iman, 'taburan iman')['jumlah'],
            'page' => $page,
            'kolom_taburan_iman' => $kolom_taburan_iman,
            'sort_taburan_iman' => $sort_taburan_iman,
            'judul' => 'Laporan',
            'akses' => $session->akses,
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'produk' => $this->RiseupModel->list_produk(),
        ];
        return view('Laporan/index', $data);
    }

    public function input_dana_masuk()
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
            'jenis' => 'masuk',
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
