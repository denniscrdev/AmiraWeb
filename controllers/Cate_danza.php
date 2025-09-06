<?php
class Cate_danza extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Cat. Danza';
        $data['script'] = 'Cate_danza.js';
        $this->views->getView('cate_danza', 'index', $data);
    }

    public function listar()
    {
        $data = $this->model->getCate_danza(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '
                <button class="btn btn-primary btn-sm" type="button" onclick="editarCate_danza(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
                <button class="btn btn-danger btn-sm" type="button" onclick="eliminarCate_danza(' . $data[$i]['id'] . ')"><i class="fas fa-trash-alt"></i></button>
            ';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $id = strClean($_POST['id']);
        $nombre = strClean($_POST['nombre']);
        $descripcion = strClean($_POST['descripcion']);
        $max_integrantes = intval($_POST['max_integrantes']);
        $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';

        if (empty($nombre)) {
            $res = ['msg' => 'El nombre es requerido', 'type' => 'warning'];
        } else if (empty($descripcion)) {
            $res = ['msg' => 'La descripción es requerida', 'type' => 'warning'];
        } else if (empty($max_integrantes) || $max_integrantes <= 0) {
            $res = ['msg' => 'El número de integrantes debe ser mayor a 0', 'type' => 'warning'];
        } else {
            if ($id == '') {
                $verificar = $this->model->getValidar('nombre', $nombre, 'registrar', 0);
                if (empty($verificar)) {
                    // Registrar nuevo
                    $data = $this->model->registrar($nombre, $descripcion, $max_integrantes, $mensaje);
                    if ($data > 0) {
                        $res = ['msg' => 'Registro exitoso', 'type' => 'success'];
                    } else {
                        $res = ['msg' => 'Error al registrar', 'type' => 'error'];
                    }
                } else {
                    $res = ['msg' => 'El nombre ya existe', 'type' => 'warning'];
                }
            } else {
                $verificar = $this->model->getValidar('nombre', $nombre, 'actualizar', $id);
                if (empty($verificar)) {
                    // Registrar nuevo
                    $data = $this->model->actualizar($nombre, $descripcion, $max_integrantes, $mensaje, $id);
                    if ($data == 1) {
                        $res = ['msg' => 'categoria modificada', 'type' => 'success'];
                    } else {
                        $res = ['msg' => 'Error al modificar', 'type' => 'error'];
                    }
                } else {
                    $res = ['msg' => 'El nombre ya existe', 'type' => 'warning'];
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($idCate_danza)
    {
        if (isset($_GET)) {
            if (is_numeric($idCate_danza)) {
                $data = $this->model->eliminar(0, $idCate_danza);
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

    public function editar($idCate_danza)
    {
        $data = $this->model->editar($idCate_danza);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function inactivos()
    {
        $data['title'] = 'Cartegorias Inactivas';
        $data['script'] = 'cate_danza_inactivos.js';
        $this->views->getView('cate_danza', 'inactivos', $data);
    }

    public function listarInactivos()
    {
        $data = $this->model->getCate_danza(0);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" data-bs-toggle="tooltip" title="Restaurar Registro" type="button" onclick="restaurarCate_danza(' . $data[$i]['id'] . ')"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function restaurar($idCate_danza)
    {
        if (is_numeric($idCate_danza)) {
            $data = $this->model->eliminar(1, $idCate_danza);
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
