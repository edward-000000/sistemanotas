
<?php
require_once "../../config/app.php";
require_once "../../autoload.php";


use app\controllers\TareaController;
//usuarios
if (isset($_POST["modulo_tarea"])) {
$tareaController = new TareaController();
if ($_POST["modulo_tarea"] == "registrar") {
echo $tareaController ->registrarTarea();
}
if ($_POST["modulo_tarea"] == "actualizar") {
echo $tareaController ->actualizarTarea();
}
if ($_POST["modulo_tarea"] == "eliminar") {
echo $tareaController ->eliminarTarea();
}
}
