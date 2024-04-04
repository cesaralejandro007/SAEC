<?php 
use modelo\UsuariosModelo as Usuarios;
use modelo\RolesModelo as Roles;
if (file_exists(views.'Reporte'.VISTA)){
    $procesos = new Usuarios();
    $rol = new Roles();
    $modulo = 'Usuarios ';
    require_once views .'Reporte'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>