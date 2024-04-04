<?php 
use modelo\UsuariosModelo as Usuarios;
use modelo\RolesModelo as Roles;
if (file_exists(views.'CostoFijo'.VISTA)){
    $procesos = new Usuarios();
    $rol = new Roles();
    $modulo = 'Usuarios ';
    require_once views .'CostoFijo'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>