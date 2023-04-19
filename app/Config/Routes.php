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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Hompage Routes
$routes->get('/', 'Home\Home::index');

// Authen Clients Routes
$routes->get('/signup', 'Home\Auth::signup');
$routes->post('/signup', 'Home\Auth::signup');
$routes->match(['get', 'post'], '/signin', 'Home\Auth::signin', ['filter' => 'noauthclient']);
$routes->get('/signout', 'Home\Auth::signout');

// Detection Routes
$routes->get('/detection', 'Home\Detection::index', ['filter' => 'authenclient']);
$routes->post('/detection', 'Home\Detection::index', ['filter' => 'authenclient', 'throttler']);

// REST API Routes
$routes->post('/api/detection', 'Home\ApiDetection', ['filter' => 'apifilter', 'throttler']);

// Authen Admin Routes
$routes->match(['get', 'post'], '/admin/signin', 'Admin\Auth::index', ['filter' => 'noauthadmin']);
$routes->get('/admin/signout', 'Admin\Auth::signout');

// Admin Routes
// Filter Authenadmin
$routes->group('admin',  ['filter' => 'authenadmin'], function ($routes) {
    $routes->get('/', 'Admin\Welcome::index');

    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->group('information', function ($routes) {
        $routes->get('/', 'Admin\AppInformation::index');
        $routes->put('update/(:any)', 'Admin\AppInformation::update/$1');
    });
    $routes->group('features', function ($routes) {
        $routes->get('/', 'Admin\AppFeatures::index');
        $routes->get('detail/(:any)', 'Admin\AppFeatures::detail/$1');
        $routes->post('add', 'Admin\AppFeatures::add');
        $routes->put('edit/(:any)', 'Admin\AppFeatures::update/$1');
        $routes->delete('delete/(:any)', 'Admin\AppFeatures::delete/$1');
    });
    $routes->group('beans', function ($routes) {
        $routes->get('/', 'Admin\BeanDirectory::index');
        $routes->get('detail/(:any)', 'Admin\BeanDirectory::detail/$1');
        $routes->post('add', 'Admin\BeanDirectory::add');
        $routes->put('edit/(:any)', 'Admin\BeanDirectory::update/$1');
        $routes->delete('delete/(:any)', 'Admin\BeanDirectory::delete/$1');
    });
    $routes->group('faqs', function ($routes) {
        $routes->get('/', 'Admin\Faq::index');
        $routes->get('detail/(:any)', 'Admin\Faq::detail/$1');
        $routes->post('add', 'Admin\Faq::add');
        $routes->put('edit/(:any)', 'Admin\Faq::update/$1');
        $routes->delete('delete/(:any)', 'Admin\Faq::delete/$1');
    });
    $routes->group('sponsors', function ($routes) {
        $routes->get('/', 'Admin\Sponsors::index');
        $routes->get('detail/(:any)', 'Admin\Sponsors::detail/$1');
        $routes->post('add', 'Admin\Sponsors::add');
        $routes->put('edit/(:any)', 'Admin\Sponsors::update/$1');
        $routes->delete('delete/(:any)', 'Admin\Sponsors::delete/$1');
    });
    $routes->group('teams', function ($routes) {
        $routes->get('/', 'Admin\Teams::index');
        $routes->get('detail/(:any)', 'Admin\Teams::detail/$1');
        $routes->post('add', 'Admin\Teams::add');
        $routes->put('edit/(:any)', 'Admin\Teams::update/$1');
        $routes->delete('delete/(:any)', 'Admin\Teams::delete/$1');
    });
    $routes->group('clients', function ($routes) {
        $routes->get('/', 'Admin\ClientInfo::index');
    });
    $routes->group('contents', function ($routes) {
        $routes->get('/', 'Admin\PageContent::index');
        $routes->get('detail/(:any)', 'Admin\PageContent::detail/$1');
        $routes->post('add', 'Admin\PageContent::add');
        $routes->put('edit/(:any)', 'Admin\PageContent::update/$1');
        $routes->delete('delete/(:any)', 'Admin\PageContent::delete/$1');
    });
    $routes->group('modelconfig', function ($routes) {
        $routes->get('/', 'Admin\ModelConfig::index');
    });
    $routes->group('profile', function ($routes) {
        $routes->get('/', 'Admin\Profile::index');
        $routes->put('edit', 'Admin\Profile::index');
        $routes->match(['get', 'post'], 'change-password', 'Admin\Profile::changePassword');
    });
    // Filter Super user
    $routes->group('management', ['filter' => 'superuser'], function ($routes) {
        $routes->get('/', 'Admin\AdminManagement::index');
        $routes->post('addadmin', 'Admin\AdminManagement::register');
        $routes->put('setactive/(:any)', 'Admin\AdminManagement::setActive/$1');
        $routes->delete('delete/(:any)', 'Admin\AdminManagement::delete/$1');
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
