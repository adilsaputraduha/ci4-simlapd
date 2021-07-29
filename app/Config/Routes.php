<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['filter' => 'auth']);
// Login
$routes->get('/login', 'LoginController::index');
$routes->post('/login/ceklogin', 'LoginController::ceklogin');
$routes->get('/logout', 'LoginController::logout', ['filter' => 'auth']);
// Pegawai
$routes->get('/pegawai', 'PegawaiController::index', ['filter' => 'auth']);
$routes->get('/pegawai/tambah', 'PegawaiController::tambah', ['filter' => 'auth']);
$routes->post('/pegawai/save', 'PegawaiController::save', ['filter' => 'auth']);
$routes->get('/pegawai/update/(:segment)', 'PegawaiController::update/$1', ['filter' => 'auth']);
$routes->post('/pegawai/edit', 'PegawaiController::edit', ['filter' => 'auth']);
$routes->post('/pegawai/delete', 'PegawaiController::delete', ['filter' => 'auth']);
$routes->get('/pegawai/laporan', 'PegawaiController::laporan', ['filter' => 'auth']);
// Tujuan
$routes->get('/tujuan', 'TujuanController::index', ['filter' => 'auth']);
$routes->post('/tujuan/save', 'TujuanController::save', ['filter' => 'auth']);
$routes->post('/tujuan/edit', 'TujuanController::edit', ['filter' => 'auth']);
$routes->post('/tujuan/delete', 'TujuanController::delete', ['filter' => 'auth']);
$routes->get('/tujuan/laporan', 'TujuanController::laporan', ['filter' => 'auth']);
// Spt
$routes->get('/spt', 'SptController::index', ['filter' => 'auth']);
$routes->get('/spt/apiindex', 'SptController::apiindex', ['filter' => 'auth']);
$routes->get('/spt/apiindexdetail/(:segment)', 'SptController::apiindexdetail/$1', ['filter' => 'auth']);
$routes->post('/spt/apisave', 'SptController::apisave', ['filter' => 'auth']);
$routes->post('/spt/apisavedetail', 'SptController::apisavedetail', ['filter' => 'auth']);
$routes->post('/spt/apidelete', 'SptController::apidelete', ['filter' => 'auth']);
$routes->post('/spt/apideletedetail', 'SptController::apideletedetail', ['filter' => 'auth']);
$routes->get('/spt/tambah', 'SptController::tambah', ['filter' => 'auth']);
$routes->post('/spt/save', 'SptController::save', ['filter' => 'auth']);
$routes->get('/spt/update/(:segment)', 'SptController::update/$1', ['filter' => 'auth']);
$routes->post('/spt/edit', 'SptController::edit', ['filter' => 'auth']);
$routes->post('/spt/delete', 'SptController::delete', ['filter' => 'auth']);
$routes->get('/spt/surat/(:segment)', 'SptController::surat/$1', ['filter' => 'auth']);
// Keberangkatan
$routes->get('/keberangkatan', 'KeberangkatanController::index', ['filter' => 'auth']);
$routes->get('/keberangkatan/tambah', 'KeberangkatanController::tambah', ['filter' => 'auth']);
$routes->post('/keberangkatan/save', 'KeberangkatanController::save', ['filter' => 'auth']);
$routes->get('/keberangkatan/update/(:segment)', 'KeberangkatanController::update/$1', ['filter' => 'auth']);
$routes->post('/keberangkatan/edit', 'KeberangkatanController::edit', ['filter' => 'auth']);
$routes->post('/keberangkatan/delete', 'KeberangkatanController::delete', ['filter' => 'auth']);
$routes->get('/keberangkatan/laporan', 'KeberangkatanController::laporan', ['filter' => 'auth']);
// Pembiayaan
$routes->get('/pembiayaan', 'PembiayaanController::index', ['filter' => 'auth']);
$routes->get('/pembiayaan/tambah', 'PembiayaanController::tambah', ['filter' => 'auth']);
$routes->post('/pembiayaan/save', 'PembiayaanController::save', ['filter' => 'auth']);
$routes->get('/pembiayaan/update/(:segment)', 'PembiayaanController::update/$1', ['filter' => 'auth']);
$routes->post('/pembiayaan/edit', 'PembiayaanController::edit', ['filter' => 'auth']);
$routes->get('/pembiayaan/rincianpembiayaan/(:segment)', 'PembiayaanController::rincianpembiayaan/$1', ['filter' => 'auth']);
$routes->get('/pembiayaan/kwitansi/(:segment)', 'PembiayaanController::kwitansi/$1', ['filter' => 'auth']);
$routes->post('/pembiayaan/delete', 'PembiayaanController::delete', ['filter' => 'auth']);
// User
$routes->get('/user', 'UserController::index', ['filter' => 'auth']);
$routes->get('/user/tambah', 'UserController::tambah', ['filter' => 'auth']);
$routes->post('/user/save', 'UserController::save', ['filter' => 'auth']);
$routes->get('/user/update/(:segment)', 'UserController::update/$1', ['filter' => 'auth']);
$routes->post('/user/edit', 'UserController::edit', ['filter' => 'auth']);
$routes->post('/user/delete', 'UserController::delete', ['filter' => 'auth']);
$routes->get('/user/laporan', 'UserController::laporan', ['filter' => 'auth']);
// Sppd
$routes->get('/sppd', 'SppdController::index', ['filter' => 'auth']);
$routes->get('/sppd/tambah', 'SppdController::tambah', ['filter' => 'auth']);
$routes->post('/sppd/save', 'SppdController::save', ['filter' => 'auth']);
$routes->get('/sppd/update/(:segment)', 'SppdController::update/$1', ['filter' => 'auth']);
$routes->post('/sppd/edit', 'SppdController::edit', ['filter' => 'auth']);
$routes->post('/sppd/delete', 'SppdController::delete', ['filter' => 'auth']);
$routes->get('/sppd/surat/(:segment)', 'SppdController::surat/$1', ['filter' => 'auth']);
// Profile
$routes->get('/profile', 'ProfileController::index', ['filter' => 'auth']);
$routes->post('/profile/edit', 'ProfileController::edit', ['filter' => 'auth']);
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
