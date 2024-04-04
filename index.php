<?php 

require_once __DIR__ .'/config/__init.php';
require_once __DIR__ .'/router/index.php';
if (file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
}else{
    return "Error: no se encontró el autoload.";
}


$router =  new Router();

$router->get('/', 'Login');


//Procesos Molino-Cotufado-Peletizado
$router->get('/proceso-1', 'ProcesosMCP');
$router->post('/proceso-1', 'ProcesosMCP');

//Procesos Molino-Cotufado-Peletizado
$router->get('/proceso-2', 'ProcesosMCP');
$router->post('/proceso-2', 'ProcesosMCP');

//Permisos
$router->get('/seguridad', 'Permisos');
//Gestiones de permisos
$router->post('/seguridad', 'Permisos');
//Crud de usuarios
$router->post('/usuarios', 'Usuarios');
//Crud de roles
$router->post('/roles', 'Roles');

//Almacen
$router->get('/almacen', 'Almacen');
$router->post('/almacen', 'Almacen');

//Almacen
$router->get('/login', 'Login');
$router->post('/login', 'Login');


$router->get('/dashboard', 'Dashboard');

//Proveedor
$router->get('/proveedor', 'Proveedor');
$router->post('/proveedor', 'Proveedor');

//Cliente
$router->get('/cliente', 'Cliente');
$router->post('/cliente', 'Cliente');

//Caracteristica
$router->get('/caracteristica', 'Caracteristica');

//Tipo de Costo Fijo
$router->get('/tipo-costo', 'TipoCosto');

//Costo Fijo
$router->get('/costo-fijo', 'CostoFijo');

//Recetas
$router->get('/receta', 'Receta');
$router->post('/receta', 'Receta');

//Venta
$router->get('/venta', 'Venta');
$router->post('/venta', 'Venta');

//Reporte
$router->get('/reporte', 'Reporte');
$router->post('/reporte', 'Reporte');

$router->post('/reporte1', 'Reporte1');


$router->error('/404', '404', 'error');







