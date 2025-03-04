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
        $data = [
            'judul' => 'Usaha Dana',
            'akses' => $session->akses,
            'produk' => $this->RiseupModel->list_produk()
        ];
        return view('Shop/index', $data);
    }
}
