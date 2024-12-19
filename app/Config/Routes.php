<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/processLogin', 'Auth::processLogin');
$routes->get('/logout', 'Auth::logout');

$routes->get('/', function () {
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }
    return view('dashboard', ['title' => 'Home']);
});
