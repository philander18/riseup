<?php

namespace App\Controllers;

use App\Models\RiseupModel;
use DateTime;

class Registrasi extends BaseController
{
    protected $RiseupModel;
    public function __construct()
    {
        $this->RiseupModel = new RiseupModel();
    }
    public function index(): string
    {
        $data = [
            'judul' => 'Registrasi',
            'list_gereja' => $this->RiseupModel->list_gereja()
        ];
        return view('Registrasi/index', $data);
    }

    public function input_peserta()
    {
        $data = [
            'nama' => $_POST['nama'],
            'hp' => $_POST['hp'],
            'umur' => $_POST['umur'],
            'gender' => $_POST['gender'],
            'gereja' => $_POST['gereja'],
            'harapan' => $_POST['harapan']
        ];
        if ($this->RiseupModel->input_peserta($data)) {
            session()->setFlashdata('pesan', 'Peserta ' . $_POST['nama'] . ' berhasil ditambahkan dan akan segera diverifikasi');
        } else {
            session()->setFlashdata('pesan', 'Penambahan peserta gagal.');
        }
        return view('Templates/flash');
    }
}
