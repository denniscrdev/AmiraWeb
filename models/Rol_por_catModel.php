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
        $sql = "UPDATE roles_categoria 
                SET id_categoria=?, nombre=?, descripcion=?, max_integrantes=?, mensaje=? 
                WHERE id=?";
        $array = array($id_categoria, $nombre, $descripcion, $max_integrantes, $mensaje, $id);
        return $this->save($sql, $array);
    }

    // Validar duplicados de nombre por categoría
    public function getValidar($nombre, $id_categoria, $accion, $id)
    {
        if ($accion == "registrar") {
            $sql = "SELECT * FROM roles_categoria 
                    WHERE nombre = '$nombre' AND id_categoria = $id_categoria AND estado = 1";
        } else {
            $sql = "SELECT * FROM roles_categoria 
                    WHERE nombre = '$nombre' AND id_categoria = $id_categoria 
                    AND id != $id AND estado = 1";
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

    // 🔹 Validación de capacidad
    public function getCapacidadDisponible($id_categoria, $id_rol = 0)
    {
        // Máximo de la categoría
        $sql = "SELECT max_integrantes FROM categorias_danza WHERE id = $id_categoria";
        $categoria = $this->select($sql);
        $maxCategoria = $categoria['max_integrantes'];

        // Total asignado en roles activos
        $sql = "SELECT SUM(max_integrantes) as total FROM roles_categoria 
                WHERE id_categoria = $id_categoria AND estado = 1";
        if ($id_rol > 0) {
            $sql .= " AND id != $id_rol"; // excluir el rol que se está editando
        }
        $res = $this->select($sql);
        $total = ($res['total'] != null) ? $res['total'] : 0;

        return $maxCategoria - $total; // disponible
    }
}
