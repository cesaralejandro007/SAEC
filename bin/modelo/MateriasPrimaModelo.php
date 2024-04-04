<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class MateriasPrimaModelo extends connectDB
{
    private $id;
    private $nombre;
    private $id_caracteristica;
    private $cantidad;
    private $stock_minimo;
    private $stock_maximo;


    public function incluir($nombre, $id_caracteristica, $cantidad, $stock_minimo, $stock_maximo)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($nombre);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El nombre se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO materias_prima(nombre, id_caracteristica, cantidad, stock_minimo, stock_maximo)
					VALUES('$nombre', '$id_caracteristica', '$cantidad', '$stock_minimo', '$stock_maximo')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $nombre, $id_caracteristica, $cantidad, $stock_minimo, $stock_maximo)
    {
        try {
            $this->conex->query("UPDATE materias_prima  SET nombre = '$nombre', id_caracteristica = '$id_caracteristica', cantidad = '$cantidad', stock_minimo = '$stock_minimo', stock_maximo = '$stock_maximo' WHERE id='$id'");
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
            $this->conex->query("DELETE from materias_prima WHERE id = '$id'");
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
        $resultado = $this->conex->prepare("SELECT * FROM materias_prima");
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
        $resultado = $this->conex->prepare("SELECT * FROM materias_prima WHERE id = '$id'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    private function validar_registro($nombre)
    {
        try {
            $resultado = $this->conex->prepare("SELECT * FROM materias_prima WHERE nombre='$nombre'");
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
