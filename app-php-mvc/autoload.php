<?php
// captura una ruta y dirige a una nueva pestaña

spl_autoload_register(function ($clase) {
$archivo = __DIR__ ."/".$clase.".php";  //  __DIR__ ruta completa de proyecto
$archivo = str_replace("\\","/",$archivo);// reemplazar valores del de arriba

// se existe un archivo retorna en boleano

    if (is_file($archivo)) {
    require_once $archivo;
    }

});















































