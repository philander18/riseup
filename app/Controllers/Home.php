<?php

namespace App\Controllers;

use App\Models\RiseupModel;

class Home extends BaseController
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
            'judul' => 'Beranda',
            'akses' => $session->akses
        ];
        return view('Home/index', $data);
    }
    public function flash()
    {
        return view('Templates/flash');
    }

    public function portal(): string
    {
        header('Clear-Site-Data: "cache"');
        $session = session();
        if (!is_null($this->request->getVar('kode'))) {
            if (!empty($this->RiseupModel->akses($this->request->getVar('kode')))) {
                $session->set('akses', $this->RiseupModel->akses($this->request->getVar('kode'))[0]['akses']);
            } else {
                session()->setFlashdata('pesan', 'Kode tidak terdaftar.');
            }
        }
        if ($session->has('akses')) {
            header("location: index");
            exit;
        }
        $data = [
            'judul' => 'Portal',
            'akses' => $session->akses
        ];
        return view('Portal/index', $data);
    }

    public function keluar(): string
    {
        $session = session();
        $session->remove('akses');
        header("location: index");
        exit;
    }
}
