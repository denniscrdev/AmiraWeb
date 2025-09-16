<?php
class IntegrantesModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getIntegrantes($estado)
    {
        $sql = "SELECT i.*, 
                   c.nombre_danza AS comparsa, 
                   r.nombre AS rol
            FROM integrantes_comparsa i
            INNER JOIN comparsas c ON i.comparsa_id = c.id
            INNER JOIN roles_categoria r ON i.rol_id = r.id
            WHERE i.estado = $estado";
        return $this->selectAll($sql);
    }

    public function getDatos($table)
    {
        $sql = "SELECT * FROM $table WHERE estado = 1";
        return $this->selectAll($sql);
    }

    // Registrar un nuevo integrante
    public function registrar($comparsa_id, $rol_id, $nombre, $contacto, $mensaje)
    {
        $sql = "INSERT INTO integrantes_comparsa (comparsa_id, rol_id, nombre, contacto, mensaje)
                VALUES (?,?,?,?,?)";
        $array = array($comparsa_id, $rol_id, $nombre, $contacto, $mensaje);
        return $this->insertar($sql, $array);
    }

    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == 'registrar' && $id == 0) {
            $sql = "SELECT id FROM integrantes_comparsa WHERE $campo = '$valor'";
        } else {
            $sql = "SELECT id FROM integrantes_comparsa WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    public function eliminar($estado, $idIntegrantes)
    {
        $sql = "UPDATE integrantes_comparsa SET estado = ? WHERE id = ?";
        $array = array($estado, $idIntegrantes);
        return $this->save($sql, $array);
    }

    public function editar($idIntegrantes)
    {
        $sql = "SELECT * FROM integrantes_comparsa WHERE id = $idIntegrantes";
        return $this->select($sql);
    }

    public function actualizar($nombre, $descripcion, $max_integrantes, $mensaje, $id)
    {
        $sql = "UPDATE integrantes_comparsa 
                SET nombre=?, descripcion=?, max_integrantes=?, mensaje=? 
                WHERE id=?";
        $array = array($nombre, $descripcion, $max_integrantes, $mensaje, $id);
        return $this->save($sql, $array);
    }
}
