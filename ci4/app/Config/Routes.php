<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout'); // <-- Tambahan logout di sini

// Halaman utama dan statis
$routes->get('/', 'Home::index');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/services', 'Page::services');

// Artikel publik (frontend)
$routes->get('/artikel', 'Artikel::index');             // daftar artikel publik
$routes->get('/artikel/(:any)', 'Artikel::view/$1');    // detail artikel publik

// Grup Admin (dengan filter auth)
$routes->group('admin', ['filter' => 'auth'], function ($routes) {

    // Daftar artikel (admin index)
    $routes->get('artikel', 'Artikel::admin_index');

    // Tambah artikel
    $routes->get('artikel/add', 'Artikel::add');    // form tambah
    $routes->post('artikel/add', 'Artikel::add');   // proses tambah

    // Edit artikel
    $routes->get('artikel/edit/(:num)', 'Artikel::edit/$1');    // form edit
    $routes->post('artikel/edit/(:num)', 'Artikel::edit/$1');   // proses edit

    // Hapus artikel
    $routes->get('artikel/delete/(:num)', 'Artikel::delete/$1');
});
