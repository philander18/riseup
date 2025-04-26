<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('home/index', 'Home::index');
$routes->get('home/portal', 'Home::portal');
$routes->get('home/keluar', 'Home::keluar');
$routes->get('home/test', 'Home::test');
$routes->get('registrasi', 'Registrasi::index');
$routes->get('shop', 'Shop::index');
$routes->get('game', 'Game::index');
$routes->post('shop/test', 'Shop::test');
$routes->get('sponsor', 'Sponsor::index');
$routes->get('kontak', 'Kontak::index');
$routes->get('laporan', 'Laporan::index');
$routes->get('kehadiran', 'Kehadiran::index');
$routes->get('/cetak-pdf', 'PdfController::generatePdf');
$routes->get('kehadiran/welcome', 'Kehadiran::welcome');
$routes->get('kehadiran/get_hadir', 'Kehadiran::get_hadir');
$routes->get('kehadiran/export', 'Kehadiran::export');


$routes->post('Home/flash', 'Home::flash');
$routes->post('Registrasi/input_peserta', 'Registrasi::input_peserta');
$routes->post('Registrasi/refresh_tabel_peserta_verifikasi', 'Registrasi::refresh_tabel_peserta_verifikasi');
$routes->post('Registrasi/refresh_tabel_peserta_unverifikasi', 'Registrasi::refresh_tabel_peserta_unverifikasi');
$routes->post('Registrasi/refresh_tabel_peserta_summary', 'Registrasi::refresh_tabel_peserta_summary');
$routes->post('Registrasi/get_detail_peserta', 'Registrasi::get_detail_peserta');
$routes->post('Registrasi/update_verifikasi_peserta', 'Registrasi::update_verifikasi_peserta');
$routes->post('home/portal', 'Home::portal');
$routes->post('shop/input_orderan', 'Shop::input_orderan');
$routes->post('shop/get_detail_order', 'Shop::get_detail_order');
$routes->post('shop/get_detail_produk', 'Shop::get_detail_produk');
$routes->post('shop', 'Shop::index');
$routes->post('shop/process', 'Shop::process');
$routes->post('shop/update_pembayaran', 'Shop::update_pembayaran');
$routes->post('shop/update_bukti_valid', 'Shop::update_bukti_valid');
$routes->post('Shop/refresh_rekap_orderan', 'Shop::refresh_rekap_orderan');
$routes->post('Shop/refresh_order_belum_lunas', 'Shop::refresh_order_belum_lunas');
$routes->post('Shop/refresh_order_lunas', 'Shop::refresh_order_lunas');
$routes->post('Shop/hapus_order', 'Shop::hapus_order');
$routes->post('Game/refresh_game', 'Game::refresh_game');
$routes->post('Game/get_detail_game', 'Game::get_detail_game');
$routes->post('game/start', 'Game::start');
$routes->post('game', 'Game::index');
$routes->post('laporan/input_dana', 'Laporan::input_dana');
$routes->post('laporan/get_detail_dana', 'Laporan::get_detail_dana');
$routes->post('Laporan/refresh_dana_masuk', 'Laporan::refresh_dana_masuk');
$routes->post('Laporan/refresh_summary_dana_masuk', 'Laporan::refresh_summary_dana_masuk');
$routes->post('Laporan/refresh_dana_keluar', 'Laporan::refresh_dana_keluar');
$routes->post('Laporan/refresh_summary_dana_keluar', 'Laporan::refresh_summary_dana_keluar');
$routes->post('Laporan/hapus_dana', 'Laporan::hapus_dana');
$routes->post('Kehadiran/refresh_tabel_peserta_hadir', 'Kehadiran::refresh_tabel_peserta_hadir');
$routes->post('Kehadiran/update_kehadiran', 'Kehadiran::update_kehadiran');
