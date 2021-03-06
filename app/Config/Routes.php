<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Index'); 
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
$routes->get('', 'Index::index');
$routes->get('/Registrar', 'Index::registro');
$routes->get('/Registrarusuario', 'Index::Registrarusuario');
$routes->get('/ValidarDatosIngreso', 'Index::ValidarDatosIngreso');
$routes->get('/cargarVistaInicio', 'Index::cargarVistaInicio');
$routes->get('/cerrarSession', 'Index::cerrarSession');

$routes->get('/Puntos', 'Puntos::historial_punto');
$routes->get('/BuscarNivel', 'Puntos::BuscarNivel');


// $routes->get('/InicioAdmin', 'Index::cargarVistaInicio');


// Modulo  Vista Administrador
$routes->get('/BuscarUsuarios','BuscarUsuarios::listar_usuarios');
$routes->get('/BuscarId','BuscarUsuarios::BuscarId');


//Modulo  Vista Usuario
$routes->get('/Historial', 'Historial::historial_expe');





// $routes->group('ModuloUsuario', ['namespace' => 'App\Controllers\ModuloUsuario'], function ($routes) {
// $routes->get('BuscarUsuarios','BuscarUsuarios:: index');
//  });

// $routes->group('ModuloPuntos', ['namespace' => 'App\Controllers\ModuloPuntos'], function ($routes) {
// 	$routes->get('Puntos', 'Puntos::historial_punto');
	 
// });




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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
