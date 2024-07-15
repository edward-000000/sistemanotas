<?php

namespace app\models;
use PDO;
use Exception;
use PDOException;
use app\common\Response;
class UsuarioModels
{
    private  $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function listarUsuario()
    {
        try {
            $sql = "SELECT * FROM USUARIO";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new Exception("Error al listar usuarios".$e->getMessage());
        }
    }
    public function validarEmail($email)
    {
        try {
            $sql = "SELECT email FROM usuario WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new Exception("Error al optener el email " .$e->getMessage() );
        }
    }

    public function validarUsuario($usuario)
    {
        try {
            $sql = "SELECT usuario FROM usuario WHERE usuario = :usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false; // Devuelve true si el usuario existe
        } catch (PDOException $e) {
            throw new Exception("Error al obtener el usuario: " . $e->getMessage());
        }
    }
    public function registrarUsuario($nombre, $apellido, $email, $clave,$usuario, $foto) {
        try {
            $sql = "INSERT INTO usuario (nombre, apellido, email, clave,usuario, foto) 
                    VALUES (:nombre, :apellido, :email, :clave,:usuario, :foto)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(":nombre", $nombre);
            $stmt->bindParam(":apellido", $apellido);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":clave", $clave);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(":foto", $foto);
            return $stmt->execute();
        } catch (PDOException $e) {
            throw new Exception("Error al registrar usuario: " . $e->getMessage());
        }
    }
    public function listarUsuarioPorId($id_usuario){
        try {
            $sql = "SELECT * FROM usuario WHERE id_usuario = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_usuario);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            throw new Exception("Error al optener al usuario" .$e->getMessage());
        }
    }
    public function actualizarUsuario($nombre, $apellido, $email, $usuario, $id_usuario)
    {
        try {
            $sql = "update usuario set nombre = :nombre, apellido =:apellido, email = :email, usuario = :usuario where id_usuario = :id_usuario";
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':id_usuario', $id_usuario);
            return $stmt->execute();
        }catch (PDOException $e){
            throw new Exception("Error al actualizar usuario" .$e->getMessage() );
        }
    }
    public function eliminarUsuario($id_usuario){
        try {
            $sql = "delete from usuario where id_usuario = :id_usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_usuario', $id_usuario);
            return $stmt->execute(); 
        }catch (PDOException $e){
            throw new Exception("Error al eliminar usuario " .$e->getMessage() );
        }
    }
    
    
}