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
        $tanggal_awal_batch0 = strtotime("2025-03-03 00:00:00");
        $tanggal_akhir_batch0 = strtotime("2025-03-19 00:00:00");
        $tanggal_awal_batch1 = strtotime("2025-03-19 00:00:00");
        $tanggal_akhir_batch1 = strtotime("2025-04-11 00:00:00");
        $session = session();
        $page = 1;
        $kolom_order_belum_lunas = 'kode';
        $sort_order_belum_lunas = 'DESC';
        $order_order_belum_lunas = $kolom_order_belum_lunas . ' ' . $sort_order_belum_lunas;
        $kolom_order_lunas = 'kode';
        $sort_order_lunas = 'DESC';
        $order_order_lunas = $kolom_order_lunas . ' ' . $sort_order_lunas;
        $kolom_rekap_orderan = 'jumlah';
        $sort_rekap_orderan = 'DESC';
        $order_rekap_orderan = $kolom_rekap_orderan . ' ' . $sort_rekap_orderan;
        $kolom_batch0 = 'kode';
        $sort_batch0 = 'DESC';
        $order_batch0 = $kolom_batch0 . ' ' . $sort_batch0;
        $kolom_rekap_batch0 = 'jumlah';
        $sort_rekap_batch0 = 'DESC';
        $order_rekap_batch0 = $kolom_rekap_batch0 . ' ' . $sort_rekap_batch0;
        $data = [
            'judul' => 'Toko',
            'akses' => $session->akses,
            'produk' => $this->RiseupModel->list_produk(),
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'order_belum_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0, $tanggal_awal_batch1, $tanggal_akhir_batch1)['tabel'],
            'pagination_order_belum_lunas' => $this->pagination($page, $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0, $tanggal_awal_batch1, $tanggal_akhir_batch1)['lastpage']),
            'last_order_belum_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0, $tanggal_awal_batch1, $tanggal_akhir_batch1)['lastpage'],
            'jumlah_order_belum_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_belum_lunas, 0, $tanggal_awal_batch1, $tanggal_akhir_batch1)['jumlah'],
            'kolom_order_belum_lunas' => $kolom_order_belum_lunas,
            'sort_order_belum_lunas' => $sort_order_belum_lunas,
            'order_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_lunas, 1,  $tanggal_awal_batch1, $tanggal_akhir_batch1)['tabel'],
            'pagination_order_lunas' => $this->pagination($page, $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_lunas, 1,  $tanggal_awal_batch1, $tanggal_akhir_batch1)['lastpage']),
            'last_order_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_lunas, 1,  $tanggal_awal_batch1, $tanggal_akhir_batch1)['lastpage'],
            'jumlah_order_lunas' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_order_lunas, 1,  $tanggal_awal_batch1, $tanggal_akhir_batch1)['jumlah'],
            'kolom_order_lunas' => $kolom_order_lunas,
            'sort_order_lunas' => $sort_order_lunas,
            'batch0' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_batch0, 1,  $tanggal_awal_batch0, $tanggal_akhir_batch0)['tabel'],
            'pagination_batch0' => $this->pagination($page, $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_batch0, 1,  $tanggal_awal_batch0, $tanggal_akhir_batch0)['lastpage']),
            'last_batch0' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_batch0, 1,  $tanggal_awal_batch0, $tanggal_akhir_batch0)['lastpage'],
            'jumlah_batch0' => $this->RiseupModel->search_orderan("", $this->jumlahlist, 0, $order_batch0, 1,  $tanggal_awal_batch0, $tanggal_akhir_batch0)['jumlah'],
            'kolom_batch0' => $kolom_batch0,
            'sort_batch0' => $sort_batch0,
            'rekap_orderan' => $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch1, $tanggal_akhir_batch1)['tabel'],
            'pagination_rekap_orderan' => $this->pagination($page, $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch1, $tanggal_akhir_batch1)['lastpage']),
            'last_rekap_orderan' => $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch1, $tanggal_akhir_batch1)['lastpage'],
            'jumlah_rekap_orderan' => $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch1, $tanggal_akhir_batch1)['jumlah'],
            'kolom_rekap_orderan' => $kolom_rekap_orderan,
            'sort_rekap_orderan' => $sort_rekap_orderan,
            'rekap_batch0' => $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch0, $tanggal_akhir_batch0)['tabel'],
            'pagination_rekap_batch0' => $this->pagination($page, $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch0, $tanggal_akhir_batch0)['lastpage']),
            'last_rekap_batch0' => $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch0, $tanggal_akhir_batch0)['lastpage'],
            'jumlah_rekap_batch0' => $this->RiseupModel->search_rekap_orderan("", $this->jumlahlist, 0, $order_rekap_orderan, $tanggal_awal_batch0, $tanggal_akhir_batch0)['jumlah'],
            'kolom_rekap_batch0' => $kolom_rekap_batch0,
            'sort_rekap_batch0' => $sort_rekap_batch0,
            'page' => $page,
        ];
        return view('Shop/index', $data);
    }

    public function refresh_rekap_orderan()
    {
        $tanggal_awal_batch1 = strtotime("2025-03-19 00:00:00");
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
        $kolom_rekap_orderan = $_POST['kolom'];
        $sort_rekap_orderan = $_POST['sort'];
        $order_rekap_orderan = $kolom_rekap_orderan . ' ' . $sort_rekap_orderan;
        $kolom_rekap_batch0 = $_POST['kolom'];
        $sort_rekap_batch0 = $_POST['sort'];
        $order_rekap_batch0 = $kolom_rekap_batch0 . ' ' . $sort_rekap_batch0;
        $data = [
            'rekap_orderan' => $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_orderan, $_POST['awal'], $_POST['akhir'])['tabel'],
            'pagination_rekap_orderan' => $this->pagination($page, $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_orderan, $_POST['awal'], $_POST['akhir'])['lastpage']),
            'last_rekap_orderan' => $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_orderan, $_POST['awal'], $_POST['akhir'])['lastpage'],
            'jumlah_rekap_orderan' => $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_orderan, $_POST['awal'], $_POST['akhir'])['jumlah'],
            'rekap_batch0' => $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_batch0, $_POST['awal'], $_POST['akhir'])['tabel'],
            'pagination_rekap_batch0' => $this->pagination($page, $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_batch0, $_POST['awal'], $_POST['akhir'])['lastpage']),
            'last_rekap_batch0' => $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_batch0, $_POST['awal'], $_POST['akhir'])['lastpage'],
            'jumlah_rekap_batch0' => $this->RiseupModel->search_rekap_orderan($keyword, $this->jumlahlist, $index, $order_rekap_batch0, $_POST['awal'], $_POST['akhir'])['jumlah'],
            'page' => $page,
            'kolom_rekap_orderan' => $kolom_rekap_orderan,
            'sort_rekap_orderan' => $sort_rekap_orderan,
            'kolom_rekap_batch0' => $kolom_rekap_batch0,
            'sort_rekap_batch0' => $sort_rekap_batch0,
        ];
        if ($tanggal_awal_batch1 == $_POST['awal']) {
            return view('Shop/Ajax/rekap_orderan', $data);
        } else {
            return view('Shop/Ajax/rekap_batch0', $data);
        }
    }
    public function refresh_order_belum_lunas()
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
        $kolom_order_belum_lunas = $_POST['kolom'];
        $sort_order_belum_lunas = $_POST['sort'];
        $order_order_belum_lunas = $kolom_order_belum_lunas . ' ' . $sort_order_belum_lunas;
        $data = [
            'order_belum_lunas' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_belum_lunas, 0, $_POST['awal'], $_POST['akhir'])['tabel'],
            'pagination_order_belum_lunas' => $this->pagination($page, $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_belum_lunas, 0, $_POST['awal'], $_POST['akhir'])['lastpage']),
            'last_order_belum_lunas' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_belum_lunas, 0, $_POST['awal'], $_POST['akhir'])['lastpage'],
            'jumlah_order_belum_lunas' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_belum_lunas, 0, $_POST['awal'], $_POST['akhir'])['jumlah'],
            'page' => $page,
            'kolom_order_belum_lunas' => $kolom_order_belum_lunas,
            'sort_order_belum_lunas' => $sort_order_belum_lunas
        ];
        return view('Shop/Ajax/order_belum_lunas', $data);
    }
    public function refresh_order_lunas()
    {
        $tanggal_awal_batch1 = strtotime("2025-03-19 00:00:00");
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
        $kolom_order_lunas = $_POST['kolom'];
        $sort_order_lunas = $_POST['sort'];
        $order_order_lunas = $kolom_order_lunas . ' ' . $sort_order_lunas;
        $kolom_batch0 = $_POST['kolom'];
        $sort_batch0 = $_POST['sort'];
        $order_batch0 = $kolom_batch0 . ' ' . $sort_batch0;
        $data = [
            'order_lunas' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_lunas, 1, $_POST['awal'], $_POST['akhir'])['tabel'],
            'pagination_order_lunas' => $this->pagination($page, $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_lunas, 1, $_POST['awal'], $_POST['akhir'])['lastpage']),
            'last_order_lunas' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_lunas, 1, $_POST['awal'], $_POST['akhir'])['lastpage'],
            'jumlah_order_lunas' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_order_lunas, 1, $_POST['awal'], $_POST['akhir'])['jumlah'],
            'batch0' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_batch0, 1, $_POST['awal'], $_POST['akhir'])['tabel'],
            'pagination_batch0' => $this->pagination($page, $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_batch0, 1, $_POST['awal'], $_POST['akhir'])['lastpage']),
            'last_batch0' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_batch0, 1, $_POST['awal'], $_POST['akhir'])['lastpage'],
            'jumlah_batch0' => $this->RiseupModel->search_orderan($keyword, $this->jumlahlist, $index, $order_batch0, 1, $_POST['awal'], $_POST['akhir'])['jumlah'],
            'page' => $page,
            'kolom_order_lunas' => $kolom_order_lunas,
            'sort_order_lunas' => $sort_order_lunas,
            'kolom_batch0' => $kolom_batch0,
            'sort_batch0' => $sort_batch0,
        ];
        if ($tanggal_awal_batch1 == $_POST['awal']) {
            return view('Shop/Ajax/order_lunas', $data);
        } else {
            return view('Shop/Ajax/order_batch0', $data);
        }
    }

    public function input_orderan()
    {
        if ($this->request->getPost('data-item')) {
            $items = json_decode($this->request->getPost('data-item'), true);
            $kode = time() . mt_rand(0, 9);
            while ($this->RiseupModel->get_orderan_bykode($kode)) {
                $kode = time() . mt_rand(0, 9);
            }
            $data = [
                'kode' => $kode,
                'nama' => $this->request->getPost('nama-pelanggan'),
                'pengiriman' => $this->request->getPost('pengiriman-pelanggan'),
                'hp' => $this->request->getPost('hp-pelanggan'),
                'alamat' => $this->request->getPost('alamat-pelanggan'),
                'gereja' => $this->request->getPost('gereja-pelanggan'),
                'lunas' => 0
            ];
            $this->RiseupModel->input_orderan($data);
            foreach ($items as $item) {
                $data_item = [
                    'kode' => $kode,
                    'produk' => $item['kode'],
                    'jumlah' => $item['quantity'],
                ];
                $this->RiseupModel->input_list_items($data_item);
            }
            return redirect()->to('shop')->with('pesan', 'Orderan berhasil dibuat.');
        }
    }

    public function update_pembayaran()
    {
        $kode = $this->request->getPost('kode-lunas');
        $data = [
            'lunas' => $this->request->getPost('status-lunas'),
        ];
        $this->RiseupModel->update_lunas($kode, $data);
        return redirect()->to('shop')->with('pesan', 'Pemesanan berhasil diupdate.');
    }

    public function update_bukti_valid()
    {
        $id = $_POST['id'];
        $data = [
            'valid' => $_POST['valid'],
        ];
        $this->RiseupModel->update_bukti_valid($id, $data);
    }

    public function get_detail_order()
    {
        $session = session();
        if ($this->RiseupModel->get_detail_orderan_bykode($_POST['kode'])) {
            $data = [
                'detail_produk' => $this->RiseupModel->get_detail_orderan_bykode($_POST['kode']),
                'pembeli' => $this->RiseupModel->get_detail_orderan_bykode($_POST['kode'])[0],
                'gambar' => $this->RiseupModel->get_gambar_bykode($_POST['kode']),
                'akses' => $session->akses
            ];
            return view('Shop/Ajax/detail', $data);
        }
    }
    public function get_detail_produk()
    {
        $data = [
            'produk' => $this->RiseupModel->get_produk_bykode($_POST['kode'])[0],
        ];
        return view('Shop/Ajax/produk', $data);
    }
    public function hapus_order()
    {
        $this->RiseupModel->hapus_order($_POST['kode']);
    }

    public function process()
    {
        $file = $this->request->getFile('bukti');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $data = [
                'kode' => $this->request->getPost('kode-bukti'),
                'bukti' => $newName,
                'valid' => 0
            ];
            $this->RiseupModel->input_bukti($data);
            $file->move('uploads', $newName); // Simpan di folder uploads/
            return redirect()->to('shop')->with('pesan', 'Bukti pembayaran berhasil diupload!');
        } else {
            return redirect()->to('shop')->with('pesan', 'Gagal mengupload gambar.');
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
