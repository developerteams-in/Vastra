<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index'); 
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::registerSubmit');
$routes->get('/login', 'Home::login'); 
$routes->post('/login', 'Home::loginSubmit');
// $routes->get('/dashboard', 'Home::dashboard');
$routes->get('/logout', 'Home::logout');
// $routes->get('/home', 'Home::index'); // If your homepage is '/home'


// $routes->get('/dashboard', 'Home::dashboard');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit_user/$1');

$routes->get('/users/edit/(:num)', 'UserController::edit_user/$1');

$routes->get('/users/delete/(:num)', 'UserController::delete/$1');
$routes->get('/logout', 'Home::logout');
$routes->get('/admin', 'Home::admin'); 
// File: app/Config/Routes.php
$routes->get('ladies', 'Ladies::showLadies');
$routes->get('men', 'Men::showMen');
// $routes->get('kids', 'Kids::showKids');
$routes->get('sport', 'Sport::showSport');
$routes->get('user_list', 'User_list::showUser_list');
// $routes->get('add_products', 'Add_products::showAdd_products');


// Routes for user and admin dashboards
// $routes->get('/home', 'Home::index');
$routes->get('/admin/dashboard', 'AdminController::dashboard'); // Admin dashboard route
$routes->get('/user/dashboard', 'Home::dashboard'); // User dashboard route




$routes->get('product/(:num)', 'ProductController::details/$1');
$routes->get('/dashboard', 'DashboardController::dashboard');

$routes->get('/add_products', 'ProductController::index'); // View add product page
$routes->post('/addProduct', 'ProductController::addProduct'); // Handle product submission




$routes->get('/product_list', 'ProductController::listProducts');
$routes->get('/get-product/(:num)', 'ProductController::getProduct/$1');



$routes->get('/', 'ProductController::Products');
$routes->get('/kids', 'ProductController::kids'); //


$routes->get('products_list/edit/(:num)', 'ProductController::edit/$1');
$routes->post('products_list/update/(:num)', 'ProductController::update/$1');


$routes->get('product_view/(:num)', 'Product_view::showProduct_view/$1');
$routes->get('product_view', 'Product_view::showProduct_view/$1');

$routes->get('/cart/remove/(:num)', 'CartController::remove/$1');  // Remove item from cart
$routes->post('/cart/updateQuantity', 'CartController::updateQuantity'); // Update cart item quantity



// payment routes 
$routes->post('checkout/(:num)', 'CheckoutController::Showcheckout/$1');

// $routes->get('checkout', 'CheckoutController::Showcheckout'); 
$routes->post('checkoutcontroller/processPayment', 'CheckoutController::processPayment');


// $routes->group('cart', function ($routes) {
//     $routes->get('', 'CartController::index');
//     $routes->post('add', 'CartController::add');
// });
$routes->group('cart', function ($routes) {
    $routes->get('', 'CartController::index'); // Load the main cart view
    $routes->post('add', 'CartController::add'); // Add items to cart
});
