<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::registerSubmit');
$routes->get('/login', 'Home::login'); 
$routes->post('/login', 'Home::loginSubmit');

$routes->get('/logout', 'Home::logout');

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

$routes->get('sport', 'Sport::showSport');
$routes->get('user_list', 'User_list::showUser_list');



// Routes for user and admin dashboards
$routes->post('dashboard/update-order-status', 'DashboardController::updateOrderStatus');


$routes->get('/admin/dashboard', 'AdminController::dashboard'); // Admin dashboard route
$routes->get('/user/dashboard', 'Home::dashboard'); // User dashboard route



$routes->get('/products/search', 'ProductController::search');
$routes->get('/product/view/(:num)', 'ProductController::view/$1');

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
$routes->post('checkoutcontroller/processPayment', 'CheckoutController::processPayment');
$routes->group('cart', function ($routes) {
    $routes->get('', 'CartController::index'); // Load the main cart view
    $routes->post('add', 'CartController::add'); // Add items to cart
});


$routes->get('/cart', 'CartController::index');
$routes->post('cart/add', 'CartController::add');
$routes->post('/cart/remove', 'CartController::remove');

$routes->get('/cart/count', 'CartController::getCartCount');
$routes->post('checkout/process/(:num)', 'CheckoutController::processPayment/$1');
$routes->post('checkout/process', 'CheckoutController::processPayment');

$routes->get('/checkout', 'CheckoutController::index');
$routes->get('/checkout/(:num)', 'CheckoutController::showCheckout/$1');
$routes->post('/checkout/process/(:num)', 'CheckoutController::processPayment/$1');



$routes->get('address', 'AddressController::address');  // List of addresses
$routes->get('address/get/(:num)', 'AddressController::get/$1');
$routes->get('address/create', 'AddressController::create');  // Create a new address form
$routes->post('address/store', 'AddressController::store');  // Store a new address
$routes->get('address/edit/(:num)', 'AddressController::edit/$1');  // Edit address
$routes->post('address/update/(:segment)', 'AddressController::update/$1');
 // Update address
$routes->delete('address/remove/(:num)', 'AddressController::removeAddress/$1');  // Remove address
// Your order 
$routes->get('orders', 'OrderController::index');
$routes->post('orders/payment', 'OrderController::processPayment');
$routes->post('orders/stripe', 'OrderController::process');
$routes->post('cart/clear', 'CartController::clearCart');  // Clear cart after payment

$routes->get('/favorites', 'FavoritesController::showFavorites');


$routes->get('/favorites/remove/(:num)', 'FavoritesController::removeFavorite/$1');
$routes->get('get_user_favorites', 'FavoritesController::getUserFavorites');
$routes->post('add_to_favorites', 'FavoritesController::addToFavorites');

$routes->post('orders/cancel/(:num)', 'OrderController::cancelOrder/$1');

// Footer Routes 
$routes->get('/returns', 'FooterController::index');
$routes->get('/shipping', 'FooterController::Shipping');
$routes->get('/privacy-policy', 'FooterController::privacy');
$routes->get('/customer-service', 'FooterController::CustomerService');
$routes->get('/careers', 'FooterController::Careers');
$routes->get('/magazine', 'FooterController::Magazine');
$routes->get('/beauty', 'FooterController::Beauty');
$routes->get('/t_and_c', 'FooterController::T_and_C');
$routes->get('/faq', 'FooterController::FAQ');


