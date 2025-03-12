<?php

namespace App\Controllers;

use App\Models\RiseupModel;

class Sponsor extends BaseController
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
            'judul' => 'Sponsorship',
            'akses' => $session->akses,
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'produk' => $this->RiseupModel->list_produk(),
        ];
        return view('Sponsor/index', $data);
    }
}
