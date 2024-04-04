<?php 
use modelo\UsuariosModelo as Usuarios;
use modelo\RolesModelo as Roles;
if (file_exists(views.'Almacen'.VISTA)){
    $procesos = new Usuarios();
    $rol = new Roles();
    $modulo = 'Usuarios ';
    $r1 = $procesos->listar();
    $roles = $rol->listar();
    require_once views .'Almacen'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>