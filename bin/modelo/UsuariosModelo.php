<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class UsuariosModelo extends connectDB
{
    private $id;
    private $nombre;
    private $clave;
    private $correo;
    private $telefono;


    public function incluir($nombre, $clave, $correo, $telefono)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($correo);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El correo se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO usuarios(nombre, clave, correo, telefono)
					VALUES('$nombre', '$clave', '$correo', '$telefono')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $nombre, $clave, $correo, $telefono)
    {
        try {
            $this->conex->query("UPDATE usuarios  SET nombre = '$nombre', clave = '$clave', correo = '$correo', telefono = '$telefono' WHERE id='$id'");
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
            $this->conex->query("DELETE from usuarios WHERE id = '$id'");
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
        $resultado = $this->conex->prepare("SELECT * FROM usuarios");
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
        $resultado = $this->conex->prepare("SELECT * FROM usuarios WHERE id = '$id'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    private function validar_registro($correo)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM usuarios WHERE correo='$correo'");
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
