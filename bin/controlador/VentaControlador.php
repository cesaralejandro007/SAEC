<?php 
use modelo\VentasModelo as Ventas;
if (file_exists(views.'Venta'.VISTA)){
    $ventas = new Ventas();
    $modulo = 'Venta ';
    if (isset($_POST['accion'])) {
        if($_POST['accion'] == "listado_ventas"){
            $datos = $ventas->listar_ventas();
            echo json_encode($datos);
            exit;
        }
    }
    require_once views .'Venta'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>