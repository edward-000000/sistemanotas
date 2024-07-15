<?php

namespace app\models;

use PDO;
use Exception;
use PDOException;

class TareaModels
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarTarea()
    {
        try {
            $sql = "SELECT * FROM tarea";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al listar tarea: " . $e->getMessage());
        }
    }

    public function listarTareaPorId($id_tarea)
    {
        try {
            $sql = "SELECT * FROM tarea WHERE id_tarea = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_tarea);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al obtener tarea por ID: " . $e->getMessage());
        }
    }

    public function registrarTarea($titulo, $tarea, $fecha)
    {
        try {
            $sql = "INSERT INTO tarea (titulo, tarea, fecha) 
                    VALUES (:titulo, :tarea, :fecha)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":titulo", $titulo);
            $stmt->bindParam(":tarea", $tarea);
            $stmt->bindParam(":fecha", $fecha);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al registrar tarea: " . $e->getMessage());
        }
    }

    public function actualizarTarea($id_tarea, $titulo, $tarea, $fecha)
    {
        try {
            $sql = "UPDATE tarea SET titulo = :titulo, tarea = :tarea, fecha = :fecha 
                    WHERE id_tarea = :id_tarea";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':tarea', $tarea);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':id_tarea', $id_tarea);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar tarea: " . $e->getMessage());
        }
    }

    public function eliminarTarea($id_tarea)
    {
        try {
            $sql = "DELETE FROM tarea WHERE id_tarea = :id_tarea";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_tarea', $id_tarea);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar tarea: " . $e->getMessage());
        }
    }
}
