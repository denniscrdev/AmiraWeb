<?php
class ComparsasModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getComparsas($estado)
    {
        $sql = "SELECT co.*, ca.nombre AS carrera, cd.nombre AS categoria
                FROM comparsas co
                INNER JOIN carreras ca ON co.carrera_id = ca.id
                INNER JOIN categorias_danza cd ON co.categoria_id = cd.id
                WHERE co.estado = $estado";
        return $this->selectAll($sql);
    }

    public function getDatos($table)
    {
        $sql = "SELECT * FROM $table WHERE estado = 1";
        return $this->selectAll($sql);
    }

     public function registrar($nombre_danza, $carrera_id, $categoria_id, $responsable, $contacto_responsable, $nro_integrantes, $mensaje)
    {
        $sql = "INSERT INTO comparsas 
                (nombre_danza, carrera_id, categoria_id, responsable, contacto_responsable, nro_integrantes, mensaje) 
                VALUES (?,?,?,?,?,?,?)";
        $array = array($nombre_danza, $carrera_id, $categoria_id, $responsable, $contacto_responsable, $nro_integrantes, $mensaje);
        return $this->insertar($sql, $array);
    }

    // Validar si ya existe
    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id FROM comparsas WHERE $campo = '$valor'";
        } else {
            $sql = "SELECT id FROM comparsas WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function actualizar($nombre_danza, $carrera_id, $categoria_id, $responsable, $contacto, $nro_integrantes, $mensaje, $id)
    {
        $sql = "UPDATE comparsas 
                SET nombre_danza=?, carrera_id=?, categoria_id=?, responsable=?, contacto_responsable=?, nro_integrantes=?, mensaje=?
                WHERE id=?";
        $datos = array($nombre_danza, $carrera_id, $categoria_id, $responsable, $contacto, $nro_integrantes, $mensaje, $id);
        return $this->save($sql, $datos);
    }

    public function editar($idComparsas)
    {
        $sql = "SELECT * FROM comparsas WHERE id = $idComparsas";
        return $this->select($sql);
    }

    public function eliminar($estado, $idComparsas)
    {
        $sql = "UPDATE comparsas SET estado = ? WHERE id = ?";
        $array = array($estado, $idComparsas);
        return $this->save($sql, $array);
    }

    public function restaurar($id)
    {
        $sql = "UPDATE comparsas SET estado = 1 WHERE id = ?";
        return $this->save($sql, [$id]);
    }
}
