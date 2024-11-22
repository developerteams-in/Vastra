<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::registerSubmit');
$routes->get('/login', 'Home::login'); 
$routes->post('/login', 'Home::loginSubmit');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/logout', 'Home::logout');
$routes->get('/home', 'Home::index'); // If your homepage is '/home'


$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->post('/users/update/(:num)', 'UserController::update/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');
$routes->get('/logout', 'Home::logout');
$routes->get('/admin', 'Home::admin'); 
// File: app/Config/Routes.php
$routes->get('ladies', 'Ladies::showLadies');
$routes->get('men', 'Men::showMen');
$routes->get('kids', 'Kids::showKids');
$routes->get('sport', 'Sport::showSport');







