<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('registrasi', 'Registrasi::index');
$routes->get('shop', 'Shop::index');
$routes->get('sponsor', 'Sponsor::index');

$routes->post('Home/flash', 'Home::flash');
$routes->post('Registrasi/input_peserta', 'Registrasi::input_peserta');
