<?php 
use modelo\RecetasModelo as Recetas;
use modelo\RecetaMateriaPrimaModelo as Ingredientes;
if (file_exists(views.'Receta'.VISTA)){
    $receta = new Recetas();
    $ingredientes = new Ingredientes();
    $modulo = 'Usuarios ';
    if (isset($_POST['accion'])) {
        if($_POST['accion'] == "listadorecetas"){
            $datos = $receta->listar_recetas();
            echo json_encode($datos);
            exit;
        }
        if($_POST['accion'] == "listado_ingredientes"){
            $datos = $ingredientes->cargar_receta_materia_prima($_POST['id_receta']);
            echo json_encode($datos);
            exit;
        }
    }
    require_once views .'Receta'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>