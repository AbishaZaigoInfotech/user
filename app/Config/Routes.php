<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setDefaultController('AuthController');
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
// $routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->group('users', ['filter' => 'auth'], function($routes) {
	$routes->get('index', 'Users::index');
	$routes->get('create', 'Users::create');
	$routes->post('store', 'Users::store');
	$routes->get('edit/(:num)', 'Users::edit/$1');
	$routes->post('update/(:num)', 'Users::update/$1');
	$routes->get('destroy/(:num)', 'Users::destroy/$1');
	$routes->get('show', 'Users::show');
});
$routes->get('/', 'AuthController::index');
$routes->get('/register', 'AuthController::register');

$routes->group('auth', function($routes) {
	$routes->post('check', 'AuthController::check');
	$routes->post('store', 'AuthController::store');
	$routes->get('logout', 'AuthController::logout');
	$routes->get('changepassword', 'AuthController::changePassword');
	$routes->post('update', 'AuthController::update');
	$routes->get('activate/(:any)', 'AuthController::activate/$1');
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
