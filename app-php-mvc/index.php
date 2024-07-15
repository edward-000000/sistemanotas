<?php
require_once "./autoload.php";
require_once "./config/app.php";
require_once "./config/server.php";
require_once "./app/views/inc/sessionStart.php";

// Verificar y sanitizar la URL
if (isset($_GET['url'])) {
    $url_vista = explode("/", filter_var($_GET['url'], FILTER_SANITIZE_URL));
} else {
    $url_vista = ['login', 'login'];
}

// Importar el controlador de vistas
use app\controllers\ViewsController;

$viewsController = new ViewsController();

// Verificar que los índices 0 y 1 existen antes de usarlos
$vista_0 = isset($url_vista[0]) ? $url_vista[0] : 'login';
$vista_1 = isset($url_vista[1]) ? $url_vista[1] : 'login';

$url = $viewsController->obtenerVistaController($vista_0 . "/" . $vista_1);
?>

<html lang="en" data-theme="light">
<head>
    <?php include("./app/views/inc/head.php") ?>
</head>
<body>
<?php
// Determinar qué vista cargar
if ($url == 'login/login' || $url == 'pages/404' || $url == 'login/login1') {
    require_once "./app/views/pages/" . $url . ".php";
} else {
    include_once("./app/views/inc/nav.php");
    include_once("./app/views/inc/aside.php");
    ?>
    <div class="main-content pt-6 mt-4">
        <main>
            <div class="container is-fluid">
                <?php
                require_once $url;
                ?>
            </div>
        </main>
    </div>
    <?php
}
?>
</body>
</html>
<?php require_once "./app/views/inc/script.php"; ?>
