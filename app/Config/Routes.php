<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth::index');
$routes->post('/auth/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/employee', 'Employee::index');
$routes->get('/employee/create', 'Employee::create');
$routes->post('/employee/store', 'Employee::store');
$routes->get('/employee/edit/(:num)', 'Employee::edit/$1');
$routes->post('/employee/update/(:num)', 'Employee::update/$1');
$routes->get('/employee/delete/(:num)', 'Employee::delete/$1');


