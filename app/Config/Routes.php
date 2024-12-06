<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/layout', 'Home::layout');


    $routes->get('dashboard', 'Home::dashboard');
    $routes->get('pemasukan', 'pemasukanController::index');
    $routes->add('pemasukan', 'pemasukanController::create');
    $routes->add('pemasukan/edit/(:segment)', 'pemasukanController::edit/$1');
	$routes->get('pemasukan/delete/(:segment)', 'pemasukanController::delete/$1');
    
    $routes->get('pengeluaran', 'pengeluaranController::index');
    $routes->add('pengeluaran', 'pengeluaranController::create');
    $routes->add('pengeluaran/edit/(:segment)', 'pengeluaranController::edit/$1');
	$routes->get('pengeluaran/delete/(:segment)', 'pengeluaranController::delete/$1');
    
    $routes->get('hutang', 'hutangController::index');
    $routes->add('hutang', 'hutangController::create');
    $routes->add('hutang/edit/(:segment)', 'hutangController::edit/$1');
	$routes->get('hutang/delete/(:segment)', 'hutangController::delete/$1');
    
    $routes->get('laporan', 'laporanController::index');
    $routes->get('laporan/excel', 'LaporanController::excel');
    $routes->add('laporan', 'laporanController::create');
    $routes->add('laporan/edit/(:segment)', 'laporanController::edit/$1');
	$routes->get('laporan/delete/(:segment)', 'laporanController::delete/$1');

    $routes->group('auth', static function($routes){
        $routes->get('', 'Auth::index');
        $routes->post('login', 'Auth::login');
        $routes->post('logout', 'Auth::logout');
    });