<?php 
use modelo\ProveedoresModelo as Proveedores;
if (file_exists(views.'Proveedor'.VISTA)){
    $proveedor = new Proveedores();
    $modulo = 'Proveedores ';
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'registrar') {
            $response = $proveedor->incluir($_POST['nombre'],$_POST['identificacion'], $_POST['direccion'],$_POST['telefono']);
            if ($response["resultado"]==1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => $modulo,
                    'message' => $response["mensaje"]
                ]);
                return 0;
            } else{
                echo json_encode([
                    'estatus' => '2',
                    'icon' => 'error',
                    'title' => $modulo,
                    'message' => $response["mensaje"]
                ]);
                return 0;
            }
            exit;
        } else if ($accion == 'eliminar') {
            $response = $proveedor->eliminar($_POST['id']);
            if ($response['resultado'] == 1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => $modulo,
                    'message' => $response['mensaje']
                ]);
            }else{
                echo json_encode([
                    'estatus' => '2',
                    'icon' => 'error',
                    'title' => $modulo,
                    'message' => $response["mensaje"]
                ]);
            }
            return 0;
            exit;
        } else if ($accion == 'modificar') {
            $response = $proveedor->modificar($_POST['id'],$_POST['nombre'],$_POST['identificacion'],$_POST['direccion'],$_POST['telefono']);
            if ($response['resultado']== 1) {
                echo json_encode([
                    'estatus' => '1',
                    'icon' => 'success',
                    'title' => $modulo,
                    'message' => $response['mensaje']
                ]);
            } else {
                echo json_encode([
                    'estatus' => '2',
                    'icon' => 'info',
                    'title' => $modulo,
                    'message' => $response['mensaje']
                ]);
            }
            return 0;
            exit;
        } else if ($accion == 'editar') {
            $datos = $proveedor->cargar($_POST['id']);
            foreach ($datos as $valor) {
                echo json_encode([
                    'id' => $valor['id'],
                    'nombres' => $valor['nombre'],
                    'identificacion' => $valor['identificacion'],
                    'telefono' => $valor['telefono'],
                    'direccion' => $valor['direccion']
                ]);
            }
            return 0;
        }       
    }
    $r1 = $proveedor->listar();
    require_once views .'Proveedor'.VISTA;
}
else{
    require_once views .'404.php'; 
}

 ?>