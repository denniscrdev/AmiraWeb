<?php
class Tallas extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Tallas';
        $data['script'] = 'tallas.js';
        $this->views->getView('tallas', 'index', $data);
    }

    public function listar()
    {
        $data = $this->model->getTallas(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Eliminar Registro" type="button" onclick="eliminarTalla(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            <button class="btn btn-info btn-sm" data-bs-toggle="tooltip" title="Editar Registro" type="button" onclick="editarTalla(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $nombre = strClean($_POST['nombre']);
        $talla = strClean($_POST['talla']);
        $descripcion = isset($_POST['descripcion']) ? strClean($_POST['descripcion']) : null;
        $id = strClean($_POST['id']);

        if (empty($nombre)) {
            $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
        } else if (empty($talla)) {
            $res = array('msg' => 'LA TALLA ES REQUERIDA', 'type' => 'warning');
        } else {
            if ($id == '') {
                // Verificamos que no exista la talla ya registrada
                $verificar = $this->model->getValidar('talla', $talla, 'registrar', 0);
                if (empty($verificar)) {
                    $data = $this->model->registrar($nombre, $talla, $descripcion);
                    if ($data > 0) {
                        $res = array('msg' => 'TALLA REGISTRADA', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'LA TALLA YA EXISTE', 'type' => 'warning');
                }
            } else {
                // Para edición
                $verificar = $this->model->getValidar('talla', $talla, 'actualizar', $id);
                if (empty($verificar)) {
                    $data = $this->model->actualizar($nombre, $talla, $descripcion, $id);
                    if ($data == 1) {
                        $res = array('msg' => 'TALLA MODIFICADA', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'LA TALLA YA EXISTE', 'type' => 'warning');
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function eliminar($idTallas)
    {
        if (is_numeric($idTallas)) {
            $data = $this->model->eliminar(0, $idTallas);
            if ($data == 1) {
                $res = array('msg' => 'CARRERA DADA DE BAJA', 'type' => 'success');
            } else {
                $res = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
            }
        } else {
            $res = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($idTallas)
    {
        $data = $this->model->editar($idTallas);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function inactivos()
    {
        $data['title'] = 'Tallas Inactivas';
        $data['script'] = 'tallas_inactivos.js';
        $this->views->getView('tallas', 'inactivos', $data);
    }

    public function listarInactivos()
    {
        $data = $this->model->getTallas(0);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" data-bs-toggle="tooltip" title="Restaurar Registro" type="button" onclick="restaurarTalla(' . $data[$i]['id'] . ')"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function restaurar($idTallas)
    {
        if (is_numeric($idTallas)) {
            $data = $this->model->eliminar(1, $idTallas);
            if ($data == 1) {
                $res = array('msg' => 'CARRERA RESTAURADA', 'type' => 'success');
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
