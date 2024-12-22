<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');

// $routes->get('/', function () {
//     if (!session()->get('isLoggedIn')) {
//         return redirect()->to('/login');
//     }
//     return view('dashboard', ['title' => 'Home']);
// });

// group for trasaksi
$routes->group('transaksi', function ($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->get('add', 'Transaksi::add');
    $routes->post('save', 'Transaksi::save');
    $routes->get('edit/(:num)', 'Transaksi::edit/$1');
    $routes->post('update', 'Transaksi::update');
    $routes->get('delete/(:num)', 'Transaksi::delete/$1');

    // quote
    $routes->get('quote', 'Transaksi::quote');
    $routes->post('quote/save', 'Transaksi::quoteSave');
    $routes->get('quote/edit/(:num)', 'Transaksi::quoteEdit/$1');
    $routes->post('quote/update', 'Transaksi::quoteUpdate');
    $routes->get('quote/delete/(:num)', 'Transaksi::quoteDelete/$1');

    // purchase-order
    $routes->get('purchase-order', 'Transaksi::purchaseOrder');

    // invoice
    $routes->get('invoice', 'Transaksi::invoice');

    // delivery-order
    $routes->get('delivery-order', 'Transaksi::deliveryOrder');

});