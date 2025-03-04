<?php

namespace App\Controllers;

class Sponsor extends BaseController
{
    public function index(): string
    {
        $session = session();
        $data = [
            'judul' => 'Sponsorship',
            'akses' => $session->akses
        ];
        return view('Sponsor/index', $data);
    }
}
