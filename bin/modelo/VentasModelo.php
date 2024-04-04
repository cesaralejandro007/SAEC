<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class VentasModelo extends connectDB
{
    private $id;
    private $id_cliente;
    private $fecha;
    private $codigo;
    private $observacion;


    public function incluir($id_cliente, $fecha, $codigo, $observacion)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($fecha);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="La cedula o rif se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO ventas(id_cliente, fecha, codigo, observacion)
					VALUES('$id_cliente', '$fecha', '$codigo', '$observacion')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $id_cliente, $fecha, $codigo, $observacion)
    {
        try {
            $this->conex->query("UPDATE ventas  SET id_cliente = '$id_cliente', fecha = '$fecha', codigo = '$codigo', observacion = '$observacion' WHERE id='$id'");
            $respuesta["resultado"]=1;
            $respuesta["mensaje"]="Modificación exitosa.";
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
        return $respuesta;
    }

    public function eliminar($id)
    {
        try {
            $this->conex->query("DELETE from ventas WHERE id = '$id'");
            $respuesta['resultado'] = 1;
            $respuesta['mensaje'] = "Eliminacion exitosa";
            return $respuesta;
        } catch (Exception $e) {
            $respuesta['resultado'] = 0;
            $respuesta['mensaje'] = $e->getMessage();
        }
    } 

    public function listar()
    {
        $resultado = $this->conex->prepare("SELECT * FROM ventas");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function listar_ventas()
    {
        $resultado = $this->conex->query("SELECT v.id, v.fecha as fecha, v.codigo as codigo, v.observacion as observacion, c.nombre as cliente, SUM(vr.total) as monto FROM ventas v INNER JOIN venta_receta vr ON v.id=vr.id_venta INNER JOIN clientes c ON c.id=v.id_cliente GROUP BY v.id;");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
			$respuesta = "";
            if($resultado){
				foreach($resultado as $r){
                    $respuesta = $respuesta . '<tr>';
                    $respuesta = $respuesta."<td>".$r['fecha']. "</td>";
                    $respuesta = $respuesta."<td>".$r['codigo']. "</td>";
                    $respuesta = $respuesta."<td>".$r['cliente']. "</td>";
                    $respuesta = $respuesta."<td>".$r['monto']. "</td>";
                    $respuesta = $respuesta."<td><a class='btn btn-info btn-sm' onclick='ver_ingredientes(".$r['id']. ")'><i class='fas fa-eye'></i></a>";
                    $respuesta = $respuesta."<a class='btn btn-danger btn-sm' href='#'><i class='fas fa-trahs'> Anular</i></a></td>";
                    $respuesta = $respuesta . '</tr>';
                }
			}
            $respuestaArreglo['resultado'] = 'listado_ventas';
            $respuestaArreglo['mensaje'] = $respuesta;
        } catch (Exception $e) {
            $respuestaArreglo['resultado'] = 'error';
            $respuestaArreglo['mensaje'] = $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cargar($id)
    {
        $resultado = $this->conex->prepare("SELECT * FROM ventas WHERE id = '$id'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    private function validar_registro($fecha)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM ventas WHERE fecha='$fecha'");
            $resultado->execute();
            $fila = $resultado->fetchAll();
            if ($fila) {
                return 'false';
            } else {
                return 'true';
            }
        } catch (Exception $e) {
            return 'false';
        }
    }
}
