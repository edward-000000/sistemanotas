<?php
namespace app\controllers;

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$password'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION['id']=$datos->id_usuario;
            $_SESSION['nombre']=$datos->nombre;
            $_SESSION['apellido']=$datos->apellido;
            $_SESSION['id_usuario']=$datos->id;
            header("Location: pages/principal");
            exit();
        } else {
            echo "<div class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Acceso denegado</div>";
        }
    } else {
        echo "<div class='alert alert-warning'><i class='fas fa-exclamation-triangle'></i> Campos vacíos</div>";
    }
}


?>