<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('registrasi', 'Registrasi::index');
$routes->get('shop', 'Shop::index');
$routes->get('sponsor', 'Sponsor::index');
$routes->get('kontak', 'Kontak::index');

$routes->post('Home/flash', 'Home::flash');
$routes->post('Registrasi/input_peserta', 'Registrasi::input_peserta');
$routes->post('Registrasi/refresh_tabel_peserta_verifikasi', 'Registrasi::refresh_tabel_peserta_verifikasi');
$routes->post('Registrasi/refresh_tabel_peserta_unverifikasi', 'Registrasi::refresh_tabel_peserta_unverifikasi');
$routes->post('Registrasi/refresh_tabel_peserta_summary', 'Registrasi::refresh_tabel_peserta_summary');
