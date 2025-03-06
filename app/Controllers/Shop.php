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
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        $session = session();
        $data = [
            'judul' => 'Usaha Dana',
            'akses' => $session->akses,
            'produk' => $this->RiseupModel->list_produk(),
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja']
        ];
        return view('Shop/index', $data);
    }

    public function input_orderan()
    {
        $items = json_decode($_POST['items'], true);
        foreach ($items as $item) {
            $data = [
                'kode' => $_POST['kode'],
                'nama' => $_POST['nama'],
                'pengiriman' => $_POST['pengiriman'],
                'hp' => $_POST['hp'],
                'alamat' => $_POST['alamat'],
                'gereja' => $_POST['gereja'],
                'produk' => $item['kode'],
                'jumlah' => $item['quantity'],
                'lunas' => 0
            ];
            $this->RiseupModel->input_orderan($data);
        }
    }
    public function test()
    {
        if (isset($_POST['data'])) {
            $items = json_decode($_POST['data'], true);
            print_r($items);
        }
    }
}
