<?php

namespace app\controllers;

use app\db\conexionDB;
use app\common\Response;
use app\models\TareaModels;
use app\models\MainModel;
use Exception;

class TareaController extends MainModel
{
    private $pdo;
    private $tareaModel;

    public function __construct()
    {
        $this->pdo = conexionDB::connect();
        $this->tareaModel = new TareaModels($this->pdo);
    }

    public function listarTarea()
    {
        try {
            return $this->tareaModel->listarTarea();
        } catch (Exception $e) {
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }
    }

    public function registrarTarea()
    {
        // Verifica que la solicitud sea POST
        $titulo = $this->limpiarCadena($_POST['titulo']);
        $tarea = $this->limpiarCadena($_POST['tarea']);
        $fecha = $this->limpiarCadena($_POST['fecha']);
        try {
            // Validación de campos obligatorios
            if ($titulo == "" || $tarea == "" || $fecha == "") {
                return Response::errorResponse("No has rellenado los campos requeridos");
            }

            $resultado = $this->tareaModel->registrarTarea($titulo, $tarea, $fecha);

            if ($resultado) {
                return Response::successResponse("La tarea " . $titulo . " se ha registrado correctamente");
            } else {
                return Response::errorResponse("La tarea " . $titulo . " no se ha registrado");
            }
        } catch (Exception $e) {
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }
    }

    public function listarTareaPorId($id_tarea)
    {
        try {
            return $this->tareaModel->listarTareaPorId($id_tarea);
        } catch (Exception $e) {
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }
    }

    public function actualizarTarea()
    {
        $id_tarea = $this->limpiarCadena($_POST['id_tarea']);
        $titulo = $this->limpiarCadena($_POST['titulo']);
        $tarea = $this->limpiarCadena($_POST['tarea']);
        $fecha = $this->limpiarCadena($_POST['fecha']);

        try {
            // Validación de campos obligatorios
            if ($titulo == "" || $tarea == "" || $fecha == "") {
                return Response::errorResponse("No has rellenado los campos requeridos");
            }

            // Verificando existencia de la tarea
            $datos = $this->tareaModel->listarTareaPorId($id_tarea);
            if (empty($datos)) {
                return Response::errorResponse("No hemos encontrado la tarea en el sistema");
            }

            $resultado = $this->tareaModel->actualizarTarea($id_tarea, $titulo, $tarea, $fecha);

            if ($resultado) {
                return Response::successResponse("La tarea '" . $titulo . "' se ha actualizado correctamente");
            } else {
                return Response::errorResponse("No se pudo actualizar la tarea '" . $titulo . "'");
            }
        } catch (Exception $e) {
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }
    }

    public function eliminarTarea()
    {
        $id_tarea = $this->limpiarCadena($_POST['id_tarea']);

        try {
            $resultado = $this->tareaModel->eliminarTarea($id_tarea);

            if ($resultado) {
                return Response::successResponse("La tarea se ha eliminado correctamente");
            } else {
                return Response::errorResponse("La tarea no se ha podido eliminar");
            }
        } catch (Exception $e) {
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }
    }
}
