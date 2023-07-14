<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home'); // mengatur controller default menjadi Home
$routes->setDefaultMethod('index'); // mengatur method default pada controller menjadi index.
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


// $routes->group('', ['filter' => 'login'], function ($routes) {
//     $routes->get('/', 'DashboardController::index');
// });
$routes->get('/', 'DashboardController::index');
//menetapkan rute untuk URL utama (root) ke DashboardController dengan method index.

$routes->group('dashboard', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'DashboardController::index');
});
// $routes->group('sarana', ['namespace' => 'App\Controllers'], function ($routes) {
//     $routes->get('/', 'SaranaController::index');
//     $routes->get('create', 'SaranaController::create');
//     $routes->post('store', 'SaranaController::store');
//     $routes->get('edit/(:num)', 'SaranaController::edit/$1');
//     $routes->post('update/(:num)', 'SaranaController::update/$1');
//     $routes->get('delete/(:num)', 'SaranaController::delete/$1');
// });

// $routes->get('/sarana', 'SaranaController::index');
// $routes->group('sarana', ['namespace' => 'App\Controllers'], function ($routes) {
//     $routes->get('/', 'SaranaController::index');
// });

//  mengelompokkan beberapa rute yang memiliki prefix pengajuan ke dalam grup dengan filter login.
$routes->group('sarana', ['namespace' => 'App\Controllers', 'filter' => 'login'], function ($routes) {
    $routes->get('/', 'SaranaController::index');
});

$routes->group('pengajuan', ['filter' => 'login'], function ($routes) {
    $routes->get('/', 'PengajuanController::index');
    $routes->get('create', 'PengajuanController::create');
    $routes->post('store', 'PengajuanController::store');
    $routes->get('edit/(:num)', 'PengajuanController::edit/$1');
    $routes->put('update/(:num)', 'PengajuanController::update/$1');
    $routes->get('delete/(:num)', 'PengajuanController::delete/$1');
});

// $routes->group('pengajuan', ['namespace' => 'App\Controllers'], function ($routes) {
//     $routes->get('/', 'PengajuanController::index');
//     $routes->get('create', 'PengajuanController::create');
//     $routes->post('store', 'PengajuanController::store');
//     $routes->get('edit/(:num)', 'PengajuanController::edit/$1');
//     $routes->post('update/(:num)', 'PengajuanController::update/$1');
//     $routes->get('delete/(:num)', 'PengajuanController::delete/$1');
// });

// $routes->setAutoRoute(true);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
