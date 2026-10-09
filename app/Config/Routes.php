<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Pages::index');
$routes->get('about', 'Pages::about');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');

$routes->group('', ['filter' => 'auth'], static function (RouteCollection $routes): void {
    $routes->get('customers', 'Customers::index');
    $routes->get('customers/new', 'Customers::new');
    $routes->post('customers/new', 'Customers::create');
    $routes->get('customers/(:num)/edit', 'Customers::edit/$1');
    $routes->post('customers/(:num)/edit', 'Customers::update/$1');
    $routes->post('customers/(:num)/delete', 'Customers::delete/$1');
    $routes->get('users', 'Users::index');
    $routes->get('users/new', 'Users::new');
    $routes->post('users/new', 'Users::create');
    $routes->get('users/(:num)/edit', 'Users::edit/$1');
    $routes->post('users/(:num)/edit', 'Users::update/$1');
    $routes->post('users/(:num)/delete', 'Users::delete/$1');
    $routes->get('products', 'Products::index');
    $routes->get('products/new', 'Products::new');
    $routes->post('products/new', 'Products::create');
    $routes->get('products/(:num)/edit', 'Products::edit/$1');
    $routes->post('products/(:num)/edit', 'Products::update/$1');
    $routes->post('products/(:num)/archive', 'Products::archive/$1');
    $routes->get('sales/new', 'Sales::new');
    $routes->post('sales/new', 'Sales::create');
    $routes->get('sales', 'Sales::index');
});
