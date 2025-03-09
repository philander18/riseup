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
        $data = [
            'judul' => 'Laporan',
            'akses' => $session->akses,
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja']
        ];
        return view('Laporan/index', $data);
    }
}
