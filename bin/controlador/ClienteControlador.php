<?php 
use modelo\ClientesModelo as Clientes;
if (file_exists(views.'Cliente'.VISTA)){
    $clientes = new Clientes();
    if (isset($_POST['accion'])) {
        if($_POST['accion'] == "registrar"){
            $response = $clientes->incluir($_POST['nombre'],$_POST['identificacion'], $_POST['direccion'],$_POST['telefono']);
            if ($response["resultado"]==1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => 'Cliente',
                    'message' => $response["mensaje"],
                    'resultado' =>'registrar_cliente'
                ]);
                return 0;
            } else{
                echo json_encode([
                    'estatus' => '2',
                    'icon' => 'error',
                    'title' => 'Cliente',
                    'message' => $response["mensaje"],
                    'resultado' => 'registrar_cliente'
                ]);
                return 0;
            }
            exit;
        }
        else
        if($_POST['accion'] == "listarclientes"){
            $datos = $clientes->listar_clientes();
            echo json_encode($datos);
            exit;
        }
    }
    require_once views .'Cliente'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>