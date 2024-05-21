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
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('index', 'Home::index');
$routes->get('acercaDe', 'Home::acercaDe');
$routes->get('contacto', 'Home::contacto');
$routes->get('productos', 'Home::productos');
$routes->get('urnas', 'Home::urnas');
$routes->get('joyeria', 'Home::joyeria');
$routes->get('fotografia', 'Home::fotografia');
$routes->get('venta', 'Home::venta');
$routes->get('privacidad', 'Home::privacidad');
$routes->get('faq', 'Home::faq');
$routes->get('login', 'Home::login');
$routes->get('terminos', 'Home::terminos');
$routes->get('registro', 'Home::registro');
//usuarios
$routes->get('addNew', 'Home::addNew');
$routes->get('crud', 'Home::crud');
$routes->get('delete', 'Home::delete');
$routes->get('edit', 'Home::edit');
//productos
$routes->get('addNewP', 'Home::addNewP');
$routes->get('crudP', 'Home::crudP');
$routes->get('deleteP', 'Home::deleteP');
$routes->get('editP', 'Home::editP');


//Rutas para el controlador de productos
$routes->get('productos', 'productos_controller::index'); // Mostrar lista de producto
$routes->get('productos/create', 'productos_controller::create'); // Mostrar formulario para crear producto
$routes->post('productos/store', 'productos_controller::store'); // Almacenar nuevo producto
$routes->get('productos/edit/(:num)', 'productos_controller::edit/$1'); // Mostrar formulario para editar producto
$routes->post('productos/update/(:num)', 'productos_controller::update/$1'); // Actualizar productos
$routes->get('productos/delete/(:num)', 'productos_controller::delete/$1'); // Eliminar productos

/*rutas para el manejo de usuarios*/
$routes->get('usuarios', 'usuarios_controller::index'); // Mostrar lista de usuarios
$routes->get('usuarios/create', 'usuarios_controller::create'); // Mostrar formulario para crear usuario
$routes->post('usuarios/store', 'usuarios_controller::store'); // Almacenar nuevo usuario
$routes->get('usuarios/edit/(:num)', 'usuarios_controller::edit/$1'); // Mostrar formulario para editar usuario
$routes->post('usuarios/update/(:num)', 'usuarios_controller::update/$1'); // Actualizar usuario
$routes->get('usuarios/delete/(:num)', 'usuarios_controller::delete/$1'); // Eliminar usuario

/*rutas para el inicio de sesion*/
$routes->get('/login', 'login_controller::index');
$routes->post('/login/auth', 'login_controller::auth');
$routes->get('/logout', 'login_controller::logout');

/*rutas del Registro de Usuarios*/
$routes->get('/registro','registro_controller::create', ['filter' => 'authAdmin']);
$routes->post('/enviar-form','registro_controller::formValidation');

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
$routes->get('/listar', 'Product::index');