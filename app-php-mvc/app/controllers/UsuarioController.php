<?php

namespace app\controllers;

use app\db\conexionDB;
use app\common\Response;
use app\models\UsuarioModels;
use app\models\MainModel;
use PDO;
use PDOException;
use Exception;

class UsuarioController extends MainModel
{
    private $pdo;
    private $usuarioModel;
    public function  __construct()
    {
        $this->pdo = conexionDB::connect();
        $this->usuarioModel = new UsuarioModels($this->pdo);

    }
    public function listarUsuario()
    {
        try {
            return $this->usuarioModel->listarUsuario();
        }catch(Exception $e){
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }

    }
    

    public function registrarUsuario()
    {
        $nombre = $this->limpiarCadena($_POST['usuario_nombre']);
        $apellido = $this->limpiarCadena($_POST['usuario_apellido']);
        $usuario = $this->limpiarCadena($_POST['usuario_usuario']);
        $email = $this->limpiarCadena($_POST['usuario_email']);
        $clave_1 = $this->limpiarCadena($_POST['usuario_clave_1']);
        $clave_2 = $this->limpiarCadena($_POST['usuario_clave_2']);
        //var_dump($nombre, $apellidos, $usuario, $email, $clave_1, $clave_2);
        try {
            #validacion de campos obligatorios
            if ($nombre == "" || $apellido == "" ||$usuario == "" ){
                return Response::errorResponse("No has rellenado los campos requeridos");
            }

            #Validación de claves
            if ($clave_1 != $clave_2){
                return Response::errorResponse("Las claves no coinciden");
            }else{
                #Encriptando la contraseña o clave
                $clave = password_hash($clave_1,PASSWORD_BCRYPT, ["cost"=>10]);
            }

            #validacion con expresiones regulares clave

            if($this->verificarDatos("[a-zA-Z0-9.-_]{3,50}",$clave_1 )|| $this->verificarDatos("[a-zA-Z0-9.-]{3,50}",$clave_2)){
                return Response::errorResponse("La clave no coincide con el formato correcto");
            }

            if($this->verificarDatos("[0-9a-zA-Z]{3,50}", $nombre) || $this->verificarDatos("[0-9a-zA-Z]{3,50}",$apellido) || $this->verificarDatos("[0-9a-zA-Z]{3,50}", $usuario)){
                return Response::errorResponse("Solo se aceptan numeros y letras");
            }

            #validacion de Email
            if ($email != ""){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $validaEmail = $this->usuarioModel->validarEmail($email);
                    if($validaEmail){
                        return Response::errorResponse("El Email  ya existe");
                    }
                }
            }

            #validar usuario
            if ($usuario != ""){
                if(filter_var($usuario, FILTER_VALIDATE_DOMAIN)){
                    $validausuario = $this->usuarioModel->validarUsuario($usuario);
                    if($validausuario){
                        return Response::errorResponse("El usuario  ya existe");
                    }
                }
            }


            # Directorio de imagenes #
            $img_dir = "../views/img/fotos/";
            # Comprobar si se selecciono una imagen #
            if ($_FILES['usuario_foto']['name'] != "" && $_FILES['usuario_foto']['size'] > 0) {

                # Creando directorio #
                if (!file_exists($img_dir)) {
                    if (!mkdir($img_dir, 0777)) {
                        return Response::errorResponse("Error al crear el directorio");
                    }
                }

                # Verificando formato de imagenes #
                if (mime_content_type($_FILES['usuario_foto']['tmp_name']) != "image/jpeg" && mime_content_type($_FILES['usuario_foto']['tmp_name']) != "image/png") {
                    return Response::errorResponse("La imagen que ha seleccionado es de un formato no permitido");
                }

                # Verificando peso de imagen #
                if (($_FILES['usuario_foto']['size'] / 1024) > 5120) {
                    return Response::errorResponse("La imagen que ha seleccionado supera el peso permitido");
                }

                # Nombre de la foto #
                $foto = str_ireplace(" ", "_", $nombre);  //nombre del usuario espacio se reemplaza con _
                $foto = $foto . "_" . rand(0, 100); //random rand  elige un numero al azar

                # Extension de la imagen #
                switch (mime_content_type($_FILES['usuario_foto']['tmp_name'])) {
                    case 'image/jpeg':
                        $foto = $foto . ".jpg";
                        break;
                    case 'image/png':
                        $foto = $foto . ".png";
                        break;
                }
                chmod($img_dir, 0777);

                # Moviendo imagen al directorio #
                if (!move_uploaded_file($_FILES['usuario_foto']['tmp_name'], $img_dir . $foto)) {
                    return Response::errorResponse("No podemos subir la imagen al sistema en este momento");
                }
            } else {
                $foto = "";
            }
            $resultado = $this->usuarioModel->registrarUsuario($nombre,$apellido,$email,$clave,$usuario,$foto);

            if ($resultado) {
                return Response::successResponse("El usuario ".$nombre." Se ha registrado correctamente");
            }else{
                return Response::errorResponse("El usuario ".$nombre." no se ha registrado");
            }

        }catch (Exception $e){
            return Response::errorResponse($e->getMessage());
        }finally {
            ConexionDB::disconnect();
        }
    }

    public function listarUsuarioPorId($id_usuario){
        try {
            return $this->usuarioModel->listarUsuarioPorId($id_usuario);
        }catch(Exception $e){
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }
    }
    public function actualizarUsuario()
    {
        $id_usuario = $this->limpiarCadena($_POST['id_usuario']);
        $nombre = $this->limpiarCadena($_POST['usuario_nombre']);
        $apellido = $this->limpiarCadena($_POST['usuario_apellido']);
        $usuario = $this->limpiarCadena($_POST['usuario_usuario']);
        $email = $this->limpiarCadena($_POST['usuario_email']);
        //var_dump($nombre, $apellidos, $usuario, $email, $clave_1, $clave_2);
        
        try {
            #validacion de campos obligatorios
            if ($nombre == "" || $apellido == "" ||$usuario == "" ){
                return Response::errorResponse("No has rellenado los campos requeridos");
            }
            # Verificando usuario #
            $datos = $this->usuarioModel->listarUsuarioPorId($id_usuario);
            if (empty($datos)) {
                return Response::errorResponse("No hemos encontrado el usuario en el sistema");
            }

            # Verificando email #
            if ($email != "" && $datos['email'] != $email) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $check_email = $this->usuarioModel->validarEmail($email);
                    if ($check_email) {
                        return Response::errorResponse("El EMAIL que acaba de ingresar ya se encuentra registrado en el sistema, por favor verifique e intente nuevamente");
                    }
                } else {
                    return Response::errorResponse("Ha ingresado un correo electrónico no valido");
                }
            }

            $resultado = $this->usuarioModel->actualizarUsuario($nombre,
                $apellido, $email,$usuario, $id_usuario);
            if ($resultado){
                return Response::successResponse("El usuario ".$nombre." se ha actualizado correctamente");
            }else{
                return Response::errorResponse("El usuario ".$nombre." no se ha actualizado");
            }
        }catch (Exception $e){
            return Response::errorResponse($e->getMessage());
        } finally {
            ConexionDB::disconnect();
        }
    }

    public function eliminarUsuario(){
        $id_usuario = $this->limpiarCadena($_POST['id_usuario']);

        try {
            $resultado = $this->usuarioModel->eliminarUsuario($id_usuario);
            if ($resultado){
                return Response::successResponse("El usuario se ha eliminado correctamente");
            } else {
                return Response::errorResponse("Ha ocurrido un error al eliminar el usuario");
            }
        } catch(Exception $e){
            return Response::errorResponse($e->getMessage());
        } finally {
            conexionDB::disconnect();
        }
    }
    
    public function validarCargoUsuario($usuario, $contraseña)
{
    try {
        // Consulta preparada para verificar las credenciales
        $sql = "SELECT * FROM usuario WHERE usuario = :usuario AND clave = :clave";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':clave', $contraseña);
        $stmt->execute();

        // Verificar si se encontró un usuario válido
        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario['id_cargo']; // Devuelve el id_cargo del usuario encontrado
        } else {
            return false; // Usuario no encontrado o credenciales incorrectas
        }
    } catch (PDOException $e) {
        // Manejo de errores
        echo "Error: " . $e->getMessage();
        return false;
    }
}


}