<?php
class Carreras extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Carreras';
        $data['script'] = 'carreras.js';
        $this->views->getView('carreras', 'index', $data);
    }

    public function listar()
    {
        $data = $this->model->getCarreras(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger" data-bs-toggle="tooltip" title="Eliminar Registro" type="button" onclick="eliminarCarrera(' . $data[$i]['id'] . ')"><i class="fas fa-trash"></i></button>
            <button class="btn btn-info" data-bs-toggle="tooltip" title="Editar Registro" type="button" onclick="editarCarrera(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $nombre = strClean($_POST['nombre']);
        $sigla = strClean($_POST['sigla']);
        $delegado = strClean($_POST['delegado']);
        $contacto = strClean($_POST['contacto']);
        $mensaje = isset($_POST['mensaje']) ? strClean($_POST['mensaje']) : null;
        $id = strClean($_POST['id']);

        if (empty($nombre)) {
            $res = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
        } else if (empty($sigla)) {
            $res = array('msg' => 'LA SIGLA ES REQUERIDA', 'type' => 'warning');
        } else if (empty($delegado)) {
            $res = array('msg' => 'EL DELEGADO ES REQUERIDO', 'type' => 'warning');
        } else if (empty($contacto)) {
            $res = array('msg' => 'EL CONTACTO ES REQUERIDO', 'type' => 'warning');
        } else {
            if ($id == '') {
                $verificar = $this->model->getValidar('nombre', $nombre, 'registrar', 0);
                if (empty($verificar)) {
                    $data = $this->model->registrar($nombre, $sigla, $delegado, $contacto, $mensaje);
                    if ($data > 0) {
                        $res = array('msg' => 'CARRERA REGISTRADA', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'LA CARRERA YA EXISTE', 'type' => 'warning');
                }
            } else {
                $verificar = $this->model->getValidar('nombre', $nombre, 'actualizar', $id);
                if (empty($verificar)) {
                    $data = $this->model->actualizar($nombre, $sigla, $delegado, $contacto, $mensaje, $id);
                    if ($data == 1) {
                        $res = array('msg' => 'CARRERA MODIFICADA', 'type' => 'success');
                    } else {
                        $res = array('msg' => 'ERROR AL MODIFICAR', 'type' => 'error');
                    }
                } else {
                    $res = array('msg' => 'LA CARRERA YA EXISTE', 'type' => 'warning');
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($idCarrera)
    {
        if (is_numeric($idCarrera)) {
            $data = $this->model->eliminar(0, $idCarrera);
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

    public function editar($idCarrera)
    {
        $data = $this->model->editar($idCarrera);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function inactivos()
    {
        $data['title'] = 'Carreras Inactivas';
        $data['script'] = 'carreras_inactivos.js';
        $this->views->getView('carreras', 'inactivos', $data);
    }

    public function listarInactivos()
    {
        $data = $this->model->getCarreras(0);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" data-bs-toggle="tooltip" title="Restaurar Registro" type="button" onclick="restaurarCarrera(' . $data[$i]['id'] . ')"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function restaurar($idCarrera)
    {
        if (is_numeric($idCarrera)) {
            $data = $this->model->eliminar(1, $idCarrera);
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
