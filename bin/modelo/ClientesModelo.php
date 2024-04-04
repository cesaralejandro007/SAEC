<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class ClientesModelo extends connectDB
{
    private $id;
    private $nombre;
    private $identificacion;
    private $direccion;
    private $telefono;


    public function incluir($nombre, $identificacion, $direccion, $telefono)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($identificacion);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="La cedula o rif se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO clientes(nombre, identificacion, direccion, telefono)
					VALUES('$nombre', '$identificacion', '$direccion', '$telefono')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $nombre, $identificacion, $direccion, $telefono)
    {
        try {
            $this->conex->query("UPDATE clientes  SET nombre = '$nombre', identificacion = '$identificacion', direccion = '$direccion', telefono = '$telefono' WHERE id='$id'");
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
            $this->conex->query("DELETE from clientes WHERE id = '$id'");
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
        $resultado = $this->conex->prepare("SELECT * FROM clientes");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function listar_clientes()
    {
        $resultado = $this->conex->query("SELECT * FROM clientes");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
			$respuesta = "<option value='0' selected='selected' disabled>Seleccione</option>";
            if($resultado){
				foreach($resultado as $r){
                    $respuesta = $respuesta."<option value='".$r['id']. "' >".$r['nombre']. " / ". $r['identificacion'] ."</option>";
                }
			}
            $respuestaArreglo['resultado'] = 'listarclientes';
            $respuestaArreglo['mensaje'] = $respuesta;
        } catch (Exception $e) {
            $respuestaArreglo['resultado'] = 'error';
            $respuestaArreglo['mensaje'] = $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cargar($id)
    {
        $resultado = $this->conex->prepare("SELECT * FROM clientes WHERE id = '$id'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    private function validar_registro($identificacion)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM clientes WHERE identificacion='$identificacion'");
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
