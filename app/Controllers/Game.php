<?php

namespace App\Controllers;

use App\Models\RiseupModel;

class Game extends BaseController
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
        $page = 1;
        $kolom_game = 'tanggal';
        $sort_game = 'ASC';
        $order_game = $kolom_game . ' ' . $sort_game;
        $waktu = (int) $this->RiseupModel->get_game_bytanda('mulai')[0]['waktu'];
        $data = [
            'judul' => 'Game',
            'akses' => $session->akses,
            'produk' => $this->RiseupModel->list_produk(),
            'list_gereja' => $this->RiseupModel->list_gereja()['list_gereja'],
            'game' => $this->RiseupModel->search_game("", $this->jumlahlist, 0, $order_game, 0)['tabel'],
            'pagination_game' => $this->pagination($page, $this->RiseupModel->search_game("", $this->jumlahlist, 0, $order_game, 0)['lastpage']),
            'last_game' => $this->RiseupModel->search_game("", $this->jumlahlist, 0, $order_game, 0)['lastpage'],
            'jumlah_game' => $this->RiseupModel->search_game("", $this->jumlahlist, 0, $order_game, 0)['jumlah'],
            'page' => $page,
            'kolom_game' => $kolom_game,
            'sort_game' => $sort_game,
            'game_time' => $waktu
        ];
        return view('Game/index', $data);
    }

    public function refresh_game()
    {
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $page = $_POST['page'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $kolom_game = $_POST['kolom'];
        $sort_game = $_POST['sort'];
        $order_game = $kolom_game . ' ' . $sort_game;
        $data = [
            'game' => $this->RiseupModel->search_game($keyword, $this->jumlahlist, $index, $order_game)['tabel'],
            'pagination_game' => $this->pagination($page, $this->RiseupModel->search_game($keyword, $this->jumlahlist, $index, $order_game)['lastpage']),
            'last_game' => $this->RiseupModel->search_game($keyword, $this->jumlahlist, $index, $order_game)['lastpage'],
            'jumlah_game' => $this->RiseupModel->search_game($keyword, $this->jumlahlist, $index, $order_game)['jumlah'],
            'page' => $page,
            'kolom_game' => $kolom_game,
            'sort_game' => $sort_game
        ];
        return view('Game/Ajax/game', $data);
    }
    public function get_detail_game()
    {
        if ($this->RiseupModel->get_orderan_bykode($_POST['kode'])) {
            $data = [
                'detail_produk' => $this->RiseupModel->get_orderan_bykode($_POST['kode']),
                'pembeli' => $this->RiseupModel->get_orderan_bykode($_POST['kode'])[0],
                'gambar' => $this->RiseupModel->get_gambar_bykode($_POST['kode'])
            ];
            return view('Game/Ajax/detail', $data);
        }
    }

    public function start()
    {
        $data = [
            'waktu' => time(),
        ];
        if ($this->RiseupModel->update_start_game('mulai', $data)) {
            return redirect()->to('game')->with('pesan', 'Game dimulai');
        } else {
            return redirect()->to('game')->with('pesan', 'Gagal memulai');
        }
    }
    public function pagination($page, $lastpage)
    {
        $pagination = [
            'first' => false,
            'previous' => false,
            'next' => false,
            'last' => false
        ];
        if ($lastpage == 1) {
            $pagination['number'] = [1];
        } elseif ($lastpage == 2) {
            $pagination['number'] = [1, 2];
        } elseif ($lastpage == 3) {
            $pagination['number'] = [1, 2, 3];
        } elseif ($lastpage == 4) {
            $pagination['number'] = [1, 2, 3, 4];
        } elseif ($lastpage == 5) {
            $pagination['number'] = [1, 2, 3, 4, 5];
        } else {
            if ($page >= 1 and $page <= 3) {
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [1, 2, 3];
            } elseif ($page >= $lastpage - 2 and $page <= $lastpage) {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['number'] = [$lastpage - 2, $lastpage - 1, $lastpage];
            } else {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [$page - 1, $page, $page + 1];
            }
        };
        $pagination['page'] = $page;
        return $pagination;
    }
}
