<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'AuthController::index');
$routes->get('/user', 'User::index');
$routes->post('/user/tambah', 'User::tambah');
$routes->post('/user/delete/(:num)', 'User::delete/$1');
$routes->get('/user/editPage/(:num)', 'User::editPage/$1');
$routes->post('/user/edit/(:num)', 'User::edit/$1');
$routes->get('/user/detail/(:num)', 'User::detail/$1');
$routes->post('/login', 'AuthController::loginLogic');
$routes->get('/user/logout', 'User::logoutLogic');

// API ROUTES User
// $routes->resouce('users', ['controller' => 'UserApiController']);
$routes->get('users', 'UserApiController::index');
$routes->get('users/(:num)', 'UserApiController::detail/$1');
$routes->post('users', 'UserApiController::create');
$routes->put('users/(:num)', 'UserApiController::update/$1');
$routes->delete('users/(:num)', 'UserApiController::delete/$1');

//API ROUTES Biodata
$routes->get('biodata', 'BiodataApiController::index');
$routes->get('biodata/(:num)', 'BiodataApiController::detail/$1');
$routes->post('biodata', 'BiodataApiController::create');
$routes->put('biodata/(:num)', 'BiodataApiController::update/$1');
$routes->delete('biodata/(:num)', 'BiodataApiController::delete/$1');