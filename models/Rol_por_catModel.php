<?php
class Rol_por_catModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }
    // Obtener roles activos/inactivos
    public function getRol_por_cat($estado)
    {
        $sql = "SELECT r.*, c.nombre AS categoria 
            FROM roles_categoria r 
            INNER JOIN categorias_danza c ON r.id_categoria = c.id 
            WHERE r.estado = $estado";
        return $this->selectAll($sql);
    }

    public function getDatos($table)
    {
        $sql = "SELECT * FROM $table WHERE estado = 1";
        return $this->selectAll($sql);
    }

    // Registrar un nuevo rol
    public function registrar($id_categoria, $nombre, $descripcion, $max_integrantes, $mensaje)
    {
        $sql = "INSERT INTO roles_categoria (id_categoria, nombre, descripcion, max_integrantes, mensaje) 
                VALUES (?,?,?,?,?)";
        $datos = array($id_categoria, $nombre, $descripcion, $max_integrantes, $mensaje);
        return $this->insertar($sql, $datos);
    }

    // Actualizar un rol existente
    public function actualizar($id_categoria, $nombre, $descripcion, $max_integrantes, $mensaje, $id)
    {
        $sql = "UPDATE roles_categoria SET id_categoria=?, nombre=?, descripcion=?, max_integrantes=?, mensaje=? WHERE id=?";
        $array = array($id_categoria, $nombre, $descripcion, $max_integrantes, $mensaje, $id);
        return $this->save($sql, $array);
    }

    // Validar duplicados
    public function getValidar($campo, $valor, $accion, $id)
    {
        if ($accion == "registrar") {
            $sql = "SELECT * FROM roles_categoria WHERE $campo = '$valor'";
        } else {
            $sql = "SELECT * FROM roles_categoria WHERE $campo = '$valor' AND id != $id";
        }
        return $this->select($sql);
    }

    // Obtener datos por id (para editar)
    public function editar($idRol_por_cat)
    {
        $sql = "SELECT * FROM roles_categoria WHERE id = $idRol_por_cat";
        return $this->select($sql);
    }

    // Cambiar estado (eliminar lógico)
    public function eliminar($estado, $idRol_por_cat)
    {
        $sql = "UPDATE roles_categoria SET estado = ? WHERE id = ?";
        $datos = array($estado, $idRol_por_cat);
        return $this->save($sql, $datos);
    }

    // ✅ NUEVO: Obtener la suma total de integrantes registrados en una categoría
    public function getTotalIntegrantesByCategoria($id_categoria)
    {
        $sql = "SELECT SUM(max_integrantes) AS total_integrantes 
                FROM roles_categoria 
                WHERE id_categoria = ? AND estado = 1";
        $datos = array($id_categoria);
        return $this->select($sql, $datos);
    }
}
