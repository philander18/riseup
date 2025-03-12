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
