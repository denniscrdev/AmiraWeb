<?php
class TallasModel extends Query
{
    public function __construct() {
        parent::__construct();
    }

    public function getTallas($estado)
    {
        $sql = "SELECT * FROM tallas_poleras WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $talla, $descripcion)
    {
        $sql = "INSERT INTO tallas_poleras (nombre, talla, descripcion) VALUES (?,?,?)";
        $array = array($nombre, $talla, $descripcion);
        return $this->insertar($sql, $array);
    }

    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id FROM tallas_poleras WHERE $campo = '$valor'";
        } else {
            $sql = "SELECT id FROM tallas_poleras WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idTallas)
    {
        $sql = "UPDATE tallas_poleras SET estado = ? WHERE id = ?";
        $array = array($estado, $idTallas);
        return $this->save($sql, $array);
    }

    public function editar($idTallas)
    {
        $sql = "SELECT * FROM tallas_poleras WHERE id = $idTallas";
        return $this->select($sql);
    }

    public function actualizar($nombre, $talla, $descripcion, $id)
    {
        $sql = "UPDATE tallas_poleras SET nombre=?, talla=?, descripcion=? WHERE id=?";
        $array = array($nombre, $talla, $descripcion, $id);
        return $this->save($sql, $array);
    }
}
?>
