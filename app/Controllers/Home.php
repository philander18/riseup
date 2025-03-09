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
            'akses' => $session->akses,
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja']
        ];
        return view('Home/index', $data);
    }
    public function flash()
    {
        return view('Templates/flash');
    }

    public function portal()
    {
        header('Clear-Site-Data: "cache"');
        $session = session();
        if ($session->has('akses')) {
            return redirect()->to('home');
        }
        if (!is_null($this->request->getVar('kode'))) {
            if (!empty($this->RiseupModel->akses($this->request->getVar('kode')))) {
                $session->set('akses', $this->RiseupModel->akses($this->request->getVar('kode'))[0]['akses']);
            } else {
                session()->setFlashdata('notifikasi', 'Kode tidak terdaftar.');
            }
        }
        $data = [
            'judul' => 'Portal',
            'akses' => $session->akses
        ];
        if ($session->has('akses')) {
            return redirect()->to('home');
        } else {
            return view('Portal/index', $data);
        }
    }

    public function keluar()
    {
        $session = session();
        $session->remove('akses');
        return redirect()->to('home');
        exit;
    }
}
