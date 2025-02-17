<?php

namespace App\Controllers;

class Shop extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Usaha Dana'
        ];
        return view('Shop/index', $data);
    }
}
