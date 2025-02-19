<?php

namespace App\Controllers;

class Sponsor extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Sponsorship'
        ];
        return view('Sponsor/index', $data);
    }
}
