<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
 
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */ 

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/index', 'Home::index');
$routes->get('/tercond', 'Home::tercond');
$routes->get('/quienes_somos', 'Home::quienes_somos');
$routes->get('/comercializacion', 'Home::comercializacion');


/////////////////////// CONSULTAS -> LADO CLIENTE ////////////////////////
$routes->get('/contacto', 'Home::contacto');
$routes->post('/contacto', 'Home::contacto');
$routes->post('/nueva_consulta', 'Consultas_controller::nueva_consulta');
$routes->get('/nueva_consulta', 'Consultas_controller::nueva_consulta');
$routes->post('/nueva_consulta_noUser', 'Consultas_controller::nueva_consulta_noUser');
$routes->get('/nueva_consulta_noUser', 'Consultas_controller::nueva_consulta_noUser');


///////////////////////REGISTRO DE USUARIOS////////////////////////
$routes->get('/registro', 'Usuario_controller::registro');
$routes->post('/registro', 'Usuario_controller::registro');
 

///////////////////////RUTAS DE INICIO Y CIERRE DE SESION////////
$routes->get('/login', 'Usuario_controller::login');
$routes->post('/login', 'Usuario_controller::login');
$routes->get('/logout', 'Usuario_controller::logout');

///////////////////////////CATÁLOGO DE PRODUCTOS///////////////////////////////
$routes->get('productos', 'Productos_controller::catalogoProductos');
$routes->post('productosFiltrados', 'Productos_controller::productosFiltrados');
///////////////////////////ver compras///////////////////////////////
$routes->get('ver_compras', 'MisCompras_controller::ver_compras');

/////////////////////// CARRITO //////////////////////////////////////////////
$routes->get('/panel_carrito', 'Carrito_controller::panel_carrito');
$routes->post('/agregar_carrito', 'Carrito_controller::agregar_carrito');
$routes->get('eliminarCarrito', 'Carrito_controller::eliminarCarrito');
$routes->get('vaciarCarrito', 'Carrito_controller::vaciarCarrito');
$routes->get('sumar_carrito', 'Carrito_controller::sumar_carrito');
$routes->get('restar_carrito', 'Carrito_controller::restar_carrito');
$routes->get('comprar_carrito', 'Carrito_controller::comprar_carrito');

  

//////////////////////////SOLO TIENE ACCESO EL ADMINISTRADOR ///////////////////////////////////
$routes ->group("/", ['filter' => 'administrador'], function($routes){
    
    ///////////////////////RUTAS DE CONSULTAS////////////////////////////////////////////////////
    //$routes->post('/panel_consultas', 'Consultas_controller::panel_consultas');
    $routes->get('/consultas', 'Consultas_controller::consultas');
    $routes->get('/panel_consultas', 'Consultas_controller::panel_consultas');
    $routes->get('/panel_consultas_noUser', 'Consultas_controller::panel_consultas_noUser');

    ///////////////////////RUTAS DE USUARIOS QUE MANEJA EL ADMINISTRADOR/////////////////////
    $routes->get('/panel_usuarios', 'Usuario_controller::panel_usuarios');
    //$routes->post('/panel_usuarios', 'Usuario_controller::panel_usuarios');    
    $routes->get('/editar_user', 'Usuario_controller::editar_user');
    $routes->post('editar_user', 'Usuario_controller::editar_user');
    $routes->get('/actualizar_user', 'Usuario_controller::actualizar_user');
    $routes->post('actualizar_user', 'Usuario_controller::actualizar_user');
    $routes->get('/eliminar_user', 'Usuario_controller::eliminar_user');
    $routes->get('/eliminados_user', 'Usuario_controller::eliminados_user');
    $routes->get('/restaurar_user', 'Usuario_controller::restaurar_user');
 
    $routes->get('/agregar_usuario', 'Usuario_controller::agregar_usuario');
    $routes->post('/agregar_usuario', 'Usuario_controller::agregar_usuario');

    ///////////////////////RUTAS DE PRODUCTOS QUE MANEJA EL ADMINISTRADOR/////////////////////
    $routes->get('/panel_productos', 'Productos_controller::panel_productos');
    //$routes->post('/panel_productos', 'Productos_controller::panel_productos');
    $routes->get('/registro_producto', 'Productos_controller::registro_producto');
    $routes->post('/registro_producto', 'Productos_controller::registro_producto');
    $routes->post('/insertar', 'Productos_controller::insertar');
    $routes->get('/nuevo', 'Productos_controller::nuevo');
    $routes->get('/editar', 'Productos_controller::editar');
    $routes->post('editar', 'Productos_controller::editar');
    $routes->get('/actualizar', 'Productos_controller::actualizar');
    $routes->post('actualizar', 'Productos_controller::actualizar');
    $routes->get('/eliminar', 'Productos_controller::eliminar');
    $routes->get('/eliminados', 'Productos_controller::eliminados');
    $routes->get('/restaurar', 'Productos_controller::restaurar');

    // $routes->get('/panel_carrito', 'Usuario_controller::panel_carrito');
    // $routes->post('/panel_carrito', 'Usuario_controller::panel_carrito');

    
    $routes->get('/responder_consulta', 'Consultas_controller::responder_consulta');
    $routes->get('/responder_consulta_noUser', 'Consultas_controller::responder_consulta_noUser');

    ///////////////////////RUTAS DE VENTAS QUE MANEJA EL ADMINISTRADOR/////////////////////
    $routes->get('/panel_ventas', 'Ventas_controller::panel_ventas');
    $routes->get('/panel_detalle', 'Ventas_controller::panel_detalle');
    
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
