<?php

namespace App\Controllers;

use App\Models\RiseupModel;

class Shop extends BaseController
{
    protected $RiseupModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->RiseupModel = new RiseupModel();
    }
    public function index(): string
    {
        $session = session();
        $page = 1;
        $kolom_order_belum_lunas = 'Kode';
        $sort_order_belum_lunas = 'DESC';
        $order_order_belum_lunas = $kolom_order_belum_lunas . ' ' . $sort_order_belum_lunas;
        $data = [
            'judul' => 'Usaha Dana',
            'akses' => $session->akses,
            'produk' => $this->RiseupModel->list_produk(),
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'order_belum_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0)['tabel'],
            'pagination_order_belum_lunas' => $this->pagination($page, $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0)['lastpage']),
            'last_order_belum_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0)['lastpage'],
            'jumlah_order_belum_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0)['jumlah'],
            'page' => $page,
            'kolom_order_belum_lunas' => $kolom_order_belum_lunas,
            'sort_order_belum_lunas' => $sort_order_belum_lunas,
        ];
        return view('Shop/index', $data);
    }

    public function input_orderan()
    {
        if ($this->request->getPost('data-item')) {
            $items = json_decode($this->request->getPost('data-item'), true);
            foreach ($items as $item) {
                $data = [
                    'kode' => time(),
                    'nama' => $this->request->getPost('nama-pelanggan'),
                    'pengiriman' => $this->request->getPost('pengiriman-pelanggan'),
                    'hp' => $this->request->getPost('hp-pelanggan'),
                    'alamat' => $this->request->getPost('alamat-pelanggan'),
                    'gereja' => $this->request->getPost('gereja-pelanggan'),
                    'produk' => $item['kode'],
                    'jumlah' => $item['quantity'],
                    'lunas' => 0
                ];
                $this->RiseupModel->input_orderan($data);
            }
        }
        return redirect()->to('shop')->with('success', 'Orderan berhasil dibuat.');
    }

    public function get_detail_order()
    {
        if ($this->RiseupModel->get_orderan_bykode($_POST['kode'])) {
            $data = [
                'detail_produk' => $this->RiseupModel->get_orderan_bykode($_POST['kode']),
                'pembeli' => $this->RiseupModel->get_orderan_bykode($_POST['kode'])[0],
            ];
            return view('Shop/Ajax/detail', $data);
        }
    }

    public function process()
    {
        $file = $this->request->getFile('bukti');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $data = [
                'kode' => $this->request->getPost('kode-bukti'),
                'bukti' => $newName
            ];
            $this->RiseupModel->input_bukti($data);
            $file->move('uploads', $newName); // Simpan di folder uploads/
            return redirect()->to('shop')->with('success', 'Gambar berhasil diupload!');
        } else {
            return redirect()->to('shop')->with('error', 'Gagal mengupload gambar.');
        }
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

    public function test()
    {
        if (isset($_POST['data'])) {
            $items = json_decode($_POST['data'], true);
            print_r($items);
        }
    }
}
