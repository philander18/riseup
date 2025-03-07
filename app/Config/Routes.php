<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home/index', 'Home::index');
$routes->get('home/portal', 'Home::portal');
$routes->get('home/keluar', 'Home::keluar');
$routes->get('registrasi', 'Registrasi::index');
$routes->get('shop', 'Shop::index');
$routes->post('shop/test', 'Shop::test');
$routes->get('sponsor', 'Sponsor::index');
$routes->get('kontak', 'Kontak::index');
$routes->get('laporan', 'Laporan::index');
$routes->get('/cetak-pdf', 'PdfController::generatePdf');


$routes->post('Home/flash', 'Home::flash');
$routes->post('Registrasi/input_peserta', 'Registrasi::input_peserta');
$routes->post('Registrasi/refresh_tabel_peserta_verifikasi', 'Registrasi::refresh_tabel_peserta_verifikasi');
$routes->post('Registrasi/refresh_tabel_peserta_unverifikasi', 'Registrasi::refresh_tabel_peserta_unverifikasi');
$routes->post('Registrasi/refresh_tabel_peserta_summary', 'Registrasi::refresh_tabel_peserta_summary');
$routes->post('home/portal', 'Home::portal');
$routes->post('shop/input_orderan', 'Shop::input_orderan');
$routes->post('shop/get_detail_order', 'Shop::get_detail_order');
$routes->post('shop', 'Shop::index');
$routes->post('shop/process', 'Shop::process');
