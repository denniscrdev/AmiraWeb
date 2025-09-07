<?php
class Rol_por_cat extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Rol x Danza';
        $data['script'] = 'rol_por_cat.js';
        $data['categorias'] = $this->model->getdatos('categorias_danza');
        $this->views->getView('rol_por_cat', 'index', $data);
    }

    public function listar()
    {
        $data = $this->model->getRol_por_cat(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '
                <button class="btn btn-primary btn-sm" type="button" onclick="editarRol_por_cat(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" type="button" onclick="eliminarRol_por_cat(' . $data[$i]['id'] . ')"><i class="fas fa-trash-alt"></i></button>
            ';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Registrar o actualizar
    public function registrar()
    {
        $id = strClean($_POST['id']);
        $id_categoria = strClean($_POST['id_categoria']);
        $nombre = strClean($_POST['nombre']);
        $descripcion = strClean($_POST['descripcion']);
        $max_integrantes = strClean($_POST['max_integrantes']);
        $mensaje = strClean($_POST['mensaje']);

        if (empty($id_categoria) || empty($nombre)) {
            $res = array('msg' => 'TODOS LOS CAMPOS CON * SON OBLIGATORIOS', 'type' => 'warning');
        } else {
            if ($id == '') {
                // Nuevo registro
                $verificar = $this->model->getValidar('nombre', $nombre, 'registrar', 0);
                if (empty($verificar)) {
                    $data = $this->model->registrar($id_categoria, $nombre, $descripcion, $max_integrantes, $mensaje);
                    $res = ($data > 0)
                        ? array('msg' => 'ROL REGISTRADO', 'type' => 'success')
                        : array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                } else {
                    $res = array('msg' => 'EL ROL YA EXISTE', 'type' => 'warning');
                }
            } else {
                // Actualizar registro
                $verificar = $this->model->getValidar('nombre', $nombre, 'actualizar', $id);
                if (empty($verificar)) {
                    $data = $this->model->actualizar($id_categoria, $nombre, $descripcion, $max_integrantes, $mensaje, $id);
                    if ($data == 1) {

                        $res = array('msg' => 'ROL MODIFICADO', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'EL ROL YA EXISTE', 'type' => 'warning');
                }
            }
        }

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Eliminar (cambio de estado)
    public function eliminar($idRol_por_cat)
    {
        if (isset($_GET)) {
            if (is_numeric($idRol_por_cat)) {
                $data = $this->model->eliminar(0, $idRol_por_cat);
                if ($data == 1) {
                    $res = array('msg' => 'MEDIDA DADO DE BAJA', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
                }
            } else {
                $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Editar (traer datos)
    public function editar($idRol_por_cat)
    {
        $data = $this->model->editar($idRol_por_cat);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    //  roles inactivas
    public function inactivos()
    {
        $data['title'] = 'Rol inactivos';
        $data['script'] = 'rol_por_cat_inactivos.js';
        $data['categorias'] = $this->model->getdatos('categorias_danza');
        $this->views->getView('rol_por_cat', 'inactivos', $data);
    }

     public function listarinactivos()
    {
        $data = $this->model->getRol_por_cat(0);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '
                <button class="btn btn-primary btn-sm" type="button" onclick="restaurarRol_por_cat(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            ';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Eliminar (cambio de estado)
    public function restaurar($idRol_por_cat)
    {
        if (isset($_GET)) {
            if (is_numeric($idRol_por_cat)) {
                $data = $this->model->eliminar(1, $idRol_por_cat);
                if ($data == 1) {
                    $res = array('msg' => 'ROL RESTAURADO', 'type' => 'success');
                } else {
                    $res = array('msg' => 'ERROR AL RESTAURAR', 'type' => 'error');
                }
            } else {
                $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
