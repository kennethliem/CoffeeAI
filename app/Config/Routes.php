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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
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

// Hompage Routes
$routes->get('/', 'Home\Home::index');

$routes->get('/signup', 'Home\Auth::signup');
$routes->get('/signin', 'Home\Auth::signin');
$routes->get('/detection', 'Home\Detection::index');

// Authen Routes
$routes->get('/admin/signin', 'Admin\Auth::index');

// Admin Routes
// Filter Authenadmin
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin\Welcome::index');

    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->group('content', function ($routes) {
        $routes->get('/', 'Admin\PageContent::index');
    });
    $routes->group('client', function ($routes) {
        $routes->get('/', 'Admin\ClientInfo::index');
    });
    $routes->group('modelconfig', function ($routes) {
        $routes->get('/', 'Admin\ModelConfig::index');
    });
    $routes->group('profile', function ($routes) {
        $routes->get('/', 'Admin\Profile::index');
    });
    // Filter Super user
    $routes->group('management', function ($routes) {
        $routes->get('/', 'Admin\AdminManagement::index');
    });
    $routes->group('documentation', function ($routes) {
        $routes->get('/', 'Admin\Documentation::index');
    });
});

// API Routes



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
