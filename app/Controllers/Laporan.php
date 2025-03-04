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
    public function index(): string
    {
        header('Clear-Site-Data: "cache"');
        $session = session();
        if (!$session->has('akses')) {
            header("location: home/portal");
            exit;
        }
        $data = [
            'judul' => 'Laporan',
            'akses' => $session->akses
        ];
        return view('Laporan/index', $data);
    }
}
