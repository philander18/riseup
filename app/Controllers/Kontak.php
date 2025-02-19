<?php

namespace App\Controllers;

class Kontak extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Kontak'
        ];
        return view('Kontak/index', $data);
    }
}
