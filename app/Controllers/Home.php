<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Beranda'
        ];
        return view('Home/index', $data);
    }
    public function flash()
    {
        return view('Templates/flash');
    }
}
