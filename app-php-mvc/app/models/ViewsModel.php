<?php
namespace app\models;

class ViewsModel
{
    protected function obtenerVista($url)
    {
        $listaBlanca = array(
            'pages/principal',
            'pages/contacto',
            'pages/documentacion',
            'pages/login',
            'pages/usuario',
            'pages/tarea',
            'usuario/listar_usuario',
            'usuario/actualizar_usuario',
            'usuario/eliminar_usuario',
            'usuario/crear_usuario',
            'usuario/exportar_excel',
            'usuario/exportar_pdf',
            'tarea/listar_tarea',
            'tarea/crear_tarea',
            'tarea/actualizar_tarea',
            'tarea/eliminar_tarea',
            'tarea/exportar_excel',
            'tarea/exportar_pdf'
        );

        if (in_array($url, $listaBlanca)) {
            if (is_file("./app/views/pages/".$url .".php")) {
                $contenido = "./app/views/pages/".$url.".php";
            } else {
                $contenido = "pages/404";
            }
        } elseif ($url == "login/login") {
            $contenido = "login/login";
        } else {
            $contenido = "pages/404";
        }

        return $contenido;
    }
}

