<?php
class Integrantes extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Integrantes';
        $data['script'] = 'integrantes.js';
        $data['comparsas'] = $this->model->getDatos('comparsas');
        $data['roles_categoria'] = $this->model->getDatos('roles_categoria');
        $this->views->getView('integrantes', 'index', $data);
    }

    public function listar()
    {
        $data = $this->model->getIntegrantes(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '
                <button class="btn btn-primary btn-sm" type="button" onclick="editarIntegrante(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" type="button" onclick="eliminarIntegrante(' . $data[$i]['id'] . ')"><i class="fas fa-trash-alt"></i></button>
            ';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $id = strClean($_POST['id']);
        $comparsa_id = strClean($_POST['comparsa_id']);
        $rol_id = strClean($_POST['rol_id']);
        $nombre = strClean($_POST['nombre']);
        $contacto = strClean($_POST['contacto']);
        $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

        if (empty($comparsa_id)) {
            $res = array('msg' => 'Debe seleccionar una comparsa', 'type' => 'warning');
        } else if (empty($rol_id)) {
            $res = array('msg' => 'Debe seleccionar un rol', 'type' => 'warning');
        } else if (empty($nombre)) {
            $res = array('msg' => 'El nombre es requerido', 'type' => 'warning');
        } else if (empty($contacto)) {
            $res = array('msg' => 'Debe ingresar un número de contacto', 'type' => 'warning');
        } else {
            $verificar = $this->model->getValidar('contacto', $contacto, 'registrar', 0);
            if (empty($verificar)) {
                // Registrar nuevo
                $data = $this->model->registrar($comparsa_id, $rol_id, $nombre, $contacto, $mensaje);
                if ($data > 0) {
                    $res = array('msg' => 'Registro exitoso', 'type' => 'success');
                } else {
                    $res = array('msg' => 'Error al registrar', 'type' => 'error');
                }
            } else {
                $res = array('msg' => 'El contacto ya existe', 'type' => 'warning');
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($idIntegrantes)
    {
        if (isset($_GET)) {
            if (is_numeric($idIntegrantes)) {
                $data = $this->model->eliminar(0, $idIntegrantes);
                if ($data == 1) {
                    $res = array('msg' => 'Integrante dado de baja', 'type' => 'success');
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

    public function editar($idIntegrantes)
    {
        $data = $this->model->editar($idIntegrantes);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function inactivos()
    {
        $data['title'] = 'integrantes Inactivas';
        $data['script'] = 'integrantes_inactivos.js';
        $this->views->getView('integrantes', 'inactivos', $data);
    }

    public function listarInactivos()
    {
        $data = $this->model->getIntegrantes(0);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" data-bs-toggle="tooltip" title="Restaurar Registro" type="button" onclick="restaurarIntegrante(' . $data[$i]['id'] . ')"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function restaurar($idIntegrantes)
    {
        if (is_numeric($idIntegrantes)) {
            $data = $this->model->eliminar(1, $idIntegrantes);
            if ($data == 1) {
                $res = array('msg' => 'Categoria RESTAURADA', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL RESTAURAR', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}
