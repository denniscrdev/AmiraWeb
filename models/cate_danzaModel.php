<?php
class Cate_danzaModel extends Query {
    public function __construct() {
        parent::__construct();
    }

    public function getCate_danza($estado)
    {
        $sql = "SELECT * FROM categorias_danza WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $descripcion, $max_integrantes, $mensaje)
    {
        $sql = "INSERT INTO categorias_danza (nombre, descripcion, max_integrantes, mensaje) VALUES (?,?,?,?)";
        $array = array($nombre, $descripcion, $max_integrantes, $mensaje);
        return $this->insertar($sql, $array);
    }

    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id FROM categorias_danza WHERE $campo = '$valor'";
        } else {
            $sql = "SELECT id FROM categorias_danza WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idCate_danza)
    {
        $sql = "UPDATE categorias_danza SET estado = ? WHERE id = ?";
        $array = array($estado, $idCate_danza);
        return $this->save($sql, $array);
    }

    public function editar($idCate_danza)
    {
        $sql = "SELECT * FROM categorias_danza WHERE id = $idCate_danza";
        return $this->select($sql);
    }

    public function actualizar($nombre, $descripcion, $max_integrantes, $mensaje, $id)
    {
        $sql = "UPDATE categorias_danza 
                SET nombre=?, descripcion=?, max_integrantes=?, mensaje=? 
                WHERE id=?";
        $array = array($nombre, $descripcion, $max_integrantes, $mensaje, $id);
        return $this->save($sql, $array);
    }
}
?>
