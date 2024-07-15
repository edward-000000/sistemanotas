<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
    /* Estilos para el contenedor principal del login */

body {
    background-image: url(images.jpg);
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: dimgray;
}
.login .title {
    text-align: center;
    margin-bottom: 2rem;
    font-size: 1.5rem;
    color: #3370d3;
}
.login .icon-person {
    font-size: 4rem;
    display: flex;
    justify-content: center;
    margin-bottom: 1rem;
    color: #3273dc;
}
.login .input {
    margin-bottom: 1rem;
}
.login .btn {
    width: 100%;
    background-color: #3273dc;
    color: white;
    margin-top: 1rem;
}
.login .btn:hover {
    background-color: #276cda;
}

</style>
<body>
    <div class="login-content">
        <form class="login box" action="" method="post" autocomplete="on">
            <div class="icon-person">
                <i class="fas fa-user-circle"></i>
            </div>
            <h2 class="title">Bienvenido</h2>
            <?php 
                // Aquí se incluirían los archivos de conexión y controlador, si es necesario
                include 'modelo/conexion.php';
                include 'controlador/controlador_login.php';
            ?>
            <div class="field">
                <div class="control has-icons-left">
                    <input name="usuario" id="usuario" class="input" type="text" placeholder="Usuario">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>
            <div class="field">
                <div class="control has-icons-left">
                    <input name="password" id="password" class="input" type="password" placeholder="Contraseña">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>
            <input name="btningresar" class="button btn" type="submit" value="INICIAR SESION">
        </form>
    </div>
</body>
</html>

