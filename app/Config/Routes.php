<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'login'], function($routes){
	$routes->get('home', 'Home::home');
	$routes->match(['get', 'post'],'/m-agama', 'MAgama::index');
	$routes->get('/m-agama/hapus/(:num)', 'MAgama::hapus/$1');
	$routes->match(['get', 'post'], '/m-agama/edit/(:num)', 'MAgama::index/$1');
	// form
	$routes->get('/form-sekolah', 'Admin\MSekolah::index');
	// user sekolah
	$routes->get('/form-user-sekolah', 'UserSekolah\UserSekolah::index');
});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
