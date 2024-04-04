<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class RecetasModelo extends connectDB
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $telefono;


    public function incluir($nombre, $descripcion, $precio)
    {
        $respuesta = [];
        $validar_registro = $this->validar_registro($nombre);
        if ($validar_registro=='false') {
            $respuesta["resultado"]=3;
            $respuesta["mensaje"]="El nombre se encuentra registrado.";
        }
         else {
            try {
                $this->conex->query("INSERT INTO recetas(nombre, descripcion, precio)
					VALUES('$nombre', '$descripcion', '$precio')");
                $respuesta["resultado"]=1;
                $respuesta["mensaje"]="Registro Exitoso.";
            } catch (Exception $e) {
                $respuesta['resultado'] = 0;
                $respuesta['mensaje'] = $e->getMessage();
            }
        }
        return $respuesta;
    }


    public function modificar($id, $nombre, $descripcion, $precio)
    {
        try {
            $this->conex->query("UPDATE recetas  SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio' WHERE id='$id'");
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
            $this->conex->query("DELETE from recetas WHERE id = '$id'");
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
        $resultado = $this->conex->prepare("SELECT * FROM recetas");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function listar_recetas()
    {
        $resultado = $this->conex->query("SELECT * FROM recetas");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
			$respuesta = "";
            if($resultado){
				foreach($resultado as $r){
                    $respuesta = $respuesta ."<tr onclick='colocaproducto(this);'>";
                    $respuesta = $respuesta."<td style='display:none;'>".$r['id']. "</td>";
                    $respuesta = $respuesta."<td>".$r['nombre']. "</td>";
                    $respuesta = $respuesta."<td>".$r['precio']. "</td>";
                    $respuesta = $respuesta."<td>1</td>";
                    $respuesta = $respuesta."<td><a class='btn btn-success btn-sm' href='#'><i class='fas fa-plus'></i></a></td>";
                    $respuesta = $respuesta . '</tr>';
                }
			}
            $respuestaArreglo['resultado'] = 'listadorecetas';
            $respuestaArreglo['mensaje'] = $respuesta;
        } catch (Exception $e) {
            $respuestaArreglo['resultado'] = 'error';
            $respuestaArreglo['mensaje'] = $e->getMessage();
        }
        return $respuestaArreglo;
    }

    public function cargar($id)
    {
        $resultado = $this->conex->prepare("SELECT * FROM recetas WHERE id = '$id'");
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
            $resultado = $this->conex->prepare("SELECT * FROM recetas WHERE nombre='$nombre'");
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
