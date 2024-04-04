<?php 
use modelo\UsuariosModelo as Usuarios;
    $propietario = new Usuarios();
    $modulo = 'Usuario ';

    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        if ($accion == 'registrar') {
            $response = $propietario->incluir($_POST['nombre'],$_POST['clave'], $_POST['correo'],$_POST['telefono']);
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
            $response = $propietario->eliminar($_POST['id']);
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
            $response = $propietario->modificar($_POST['id'],$_POST['nombre'],$_POST['clave'],$_POST['correo'],$_POST['telefono']);
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
            $datos = $propietario->cargar($_POST['id']);
            foreach ($datos as $valor) {
                echo json_encode([
                    'id' => $valor['id'],
                    'nombres' => $valor['nombre'],
                    'clave' => $valor['clave'],
                    'telefono' => $valor['telefono'],
                    'correo' => $valor['correo']
                ]);
            }
            return 0;
        }       
    }
 ?>