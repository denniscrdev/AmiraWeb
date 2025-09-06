<?php
class CarrerasModel extends Query
{
    public function __construct() {
        parent::__construct();
    }

    public function getCarreras($estado)
    {
        $sql = "SELECT * FROM carreras WHERE estado = $estado";
        return $this->selectAll($sql);
    }

    public function registrar($nombre, $sigla, $delegado, $contacto, $mensaje)
    {
        $sql = "INSERT INTO carreras (nombre, sigla, delegado, contacto, mensaje) VALUES (?,?,?,?,?)";
        $array = array($nombre, $sigla, $delegado, $contacto, $mensaje);
        return $this->insertar($sql, $array);
    }

    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id FROM carreras WHERE $campo = '$valor'";
        } else {
            $sql = "SELECT id FROM carreras WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idCarrera)
    {
        $sql = "UPDATE carreras SET estado = ? WHERE id = ?";
        $array = array($estado, $idCarrera);
        return $this->save($sql, $array);
    }

    public function editar($idCarrera)
    {
        $sql = "SELECT * FROM carreras WHERE id = $idCarrera";
        return $this->select($sql);
    }

    public function actualizar($nombre, $sigla, $delegado, $contacto, $mensaje, $id)
    {
        $sql = "UPDATE carreras SET nombre=?, sigla=?, delegado=?, contacto=?, mensaje=? WHERE id=?";
        $array = array($nombre, $sigla, $delegado, $contacto, $mensaje, $id);
        return $this->save($sql, $array);
    }
}
?>
