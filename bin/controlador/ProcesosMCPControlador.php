<?php 
use modelo\UsuariosModelo as Usuarios;
if (file_exists(views.'ProcesosMCP'.VISTA)){
    $procesos = new Usuarios();
    $modulo = 'Usuarios ';
    $r1 = $procesos->listar();
    $datos = [];
    require_once views .'ProcesosMCP'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>