<?php
class Comparsas extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Comparsas';
        $data['script'] = 'comparsas.js';
        $data['carreras'] = $this->model->getDatos('carreras');
        $data['categorias_danza'] = $this->model->getDatos('categorias_danza');
        $this->views->getView('comparsas', 'index', $data);
    }

    public function listar()
    {
        $data = $this->model->getComparsas(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '
                <button class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Eliminar Registro" type="button" onclick="eliminarComparsa(' . $data[$i]['id'] . ')"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Editar Registro" type="button" onclick="editarComparsa(' . $data[$i]['id'] . ')"><i class="fas fa-edit"></i></button>
            ';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $id = $_POST['id'];
        $nombre_danza = strClean($_POST['nombre_danza']);
        $carrera_id = strClean($_POST['carrera_id']);
        $categoria_id = strClean($_POST['categoria_id']);
        $responsable = strClean($_POST['responsable']);
        $contacto_responsable = strClean($_POST['contacto_responsable']);
        $nro_integrantes = intval($_POST['max_integrantes']);
        $mensaje = strClean($_POST['mensaje']);

        if (empty($nombre_danza)) {
            $res = ['msg' => 'El nombre de la danza es requerido', 'type' => 'warning'];
        } else if (empty($carrera_id) || $carrera_id <= 0) {
            $res = ['msg' => 'Debe seleccionar una carrera', 'type' => 'warning'];
        } else if (empty($categoria_id) || $categoria_id <= 0) {
            $res = ['msg' => 'Debe seleccionar una categoría', 'type' => 'warning'];
        } else if (empty($responsable)) {
            $res = ['msg' => 'El responsable es requerido', 'type' => 'warning'];
        } else if (empty($contacto_responsable)) {
            $res = ['msg' => 'El contacto del responsable es requerido', 'type' => 'warning'];
        } else if ($nro_integrantes <= 0) {
            $res = ['msg' => 'El número de integrantes debe ser mayor a 0', 'type' => 'warning'];
        } else {
            if ($id == '') {
                $verificar = $this->model->getValidar('nombre_danza', $nombre_danza, 'registrar', 0);
                if (empty($verificar)) {
                    // Registrar nuevo
                    $data = $this->model->registrar($nombre_danza, $carrera_id, $categoria_id, $responsable, $contacto_responsable, $nro_integrantes, $mensaje);
                    if ($data > 0) {
                        $res = ['msg' => 'Registro exitoso', 'type' => 'success'];
                    } else {
                        $res = ['msg' => 'Error al registrar', 'type' => 'error'];
                    }
                } else {
                    $res = ['msg' => 'La comparsa ya existe', 'type' => 'warning'];
                }
            } else {
                $verificar = $this->model->getValidar('nombre_danza', $nombre_danza, 'actualizar', $id);
                if (empty($verificar)) {
                    // Actualizar
                    $data = $this->model->actualizar($nombre_danza, $carrera_id, $categoria_id, $responsable, $contacto_responsable, $nro_integrantes, $mensaje, $id);
                    if ($data == 1) {
                        $res = ['msg' => 'Comparsa modificada', 'type' => 'success'];
                    } else {
                        $res = ['msg' => 'Error al modificar', 'type' => 'error'];
                    }
                } else {
                    $res = ['msg' => 'La comparsa ya existe', 'type' => 'warning'];
                }
            }
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar($idComparsas)
    {
        if (isset($_GET)) {
            if (is_numeric($idComparsas)) {
                $data = $this->model->eliminar(0, $idComparsas);
                if ($data == 1) {
                    $res = array('msg' => 'Comparsa DADA DE BAJA', 'type' => 'success');
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

    public function editar($idComparsas)
    {
        $data = $this->model->editar($idComparsas);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


    public function inactivos()
    {
        $data['title'] = 'Cartegorias Inactivas';
        $data['script'] = 'comparsas_inactivos.js';
        $this->views->getView('comparsas', 'inactivos', $data);
    }

    public function listarInactivos()
    {
        $data = $this->model->getComparsas(0);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" data-bs-toggle="tooltip" title="Restaurar Registro" type="button" onclick="restaurarComparsa(' . $data[$i]['id'] . ')"><i class="fas fa-check-circle"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function restaurar($idComparsas)
    {
        if (is_numeric($idComparsas)) {
            $data = $this->model->eliminar(1, $idComparsas);
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
