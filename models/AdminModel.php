<?php
class AdminModel extends Query{
    public function __construct() {
        parent::__construct();
    }
    public function getDatos()
    {
        $sql = "SELECT * FROM configuracion";
        return $this->select($sql);
    }
    public function actualizar($ruc, $nombre, $telefono, $correo,
    $direccion, $impuesto, $mensaje, $id)
    {
        $sql = "UPDATE configuracion SET ruc=?, nombre=?, telefono=?, correo=?,
        direccion=?, impuesto=?, mensaje=? WHERE id=?";
        $array = array($ruc, $nombre, $telefono, $correo,
        $direccion, $impuesto, $mensaje, $id);
        return $this->save($sql, $array);
    }
}
?>