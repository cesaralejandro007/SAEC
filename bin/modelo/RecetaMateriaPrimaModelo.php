<?php
namespace modelo;
use config\connect\connectDB as connectDB;

class RecetaMateriaPrimaModelo extends connectDB
{
    private $id;
    private $id_receta;
    private $id_materia_prima;
    private $cantidad;

    public function cargar_receta_materia_prima($id_receta)
    {
        $resultado = $this->conex->query("SELECT mp.nombre as ingrediente FROM receta_materia_prima rmp INNER JOIN recetas r ON r.id=rmp.id_receta INNER JOIN materias_prima mp ON mp.id=rmp.id_materia_prima WHERE r.id='$id_receta'");
        $respuestaArreglo = [];
        try {
            $resultado->execute();
			$respuesta = "";
            if($resultado){
				foreach($resultado as $r){
                    $respuesta = $respuesta."<li>".$r['ingrediente']. "</li>";
                }
			}
            $respuestaArreglo['resultado'] = 'listado_ingredientes';
            $respuestaArreglo['mensaje'] = $respuesta;
        } catch (Exception $e) {
            $respuestaArreglo['resultado'] = 'listado_ingredientes';
            $respuestaArreglo['mensaje'] = $e->getMessage();
        }
        return $respuestaArreglo;
    }
}
