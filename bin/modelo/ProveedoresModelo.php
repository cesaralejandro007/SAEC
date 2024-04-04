<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class ProveedoresModelo extends connectDB
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
                $this->conex->query("INSERT INTO proveedores(nombre, identificacion, direccion, telefono)
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
            $this->conex->query("UPDATE proveedores  SET nombre = '$nombre', identificacion = '$identificacion', direccion = '$direccion', telefono = '$telefono' WHERE id='$id'");
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
            $this->conex->query("DELETE from proveedores WHERE id = '$id'");
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
        $resultado = $this->conex->prepare("SELECT * FROM proveedores");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cargar($id)
    {
        $resultado = $this->conex->prepare("SELECT * FROM proveedores WHERE id = '$id'");
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
            $resultado = $this->conex->prepare("SELECT * FROM proveedores WHERE identificacion='$identificacion'");
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
