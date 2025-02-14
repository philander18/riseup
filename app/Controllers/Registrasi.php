<?php

namespace App\Controllers;

class Registrasi extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Registrasi'
        ];
        return view('Registrasi/index', $data);
    }
}
