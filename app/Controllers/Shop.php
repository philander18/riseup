<?php

namespace App\Controllers;

class Shop extends BaseController
{
    public function index(): string
    {
        $session = session();
        $data = [
            'judul' => 'Usaha Dana',
            'akses' => $session->akses
        ];
        return view('Shop/index', $data);
    }
}
