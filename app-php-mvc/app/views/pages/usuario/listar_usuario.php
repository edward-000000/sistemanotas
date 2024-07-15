<?php
    use app\controllers\UsuarioController;
    $usuarioController = new UsuarioController();

    $usuarios = $usuarioController->listarUsuario();

?>

<section class="section">
    <div class="columns is-fluid">
        <div class="column">
            <h2 class="subtitle">Lista de Usuarios</h2>
        </div>

        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>usuario/crear_usuario"
            class="button is-rounded is-success">
            <i class="fa-solid fa-user-plus pr-1"></i>
                Nuevo Usuario
            </a>
        </div>
        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>pdf/reporte_usuario.php"
            class="button is-rounded is-success">
            <i class="fa-solid fa-file-pdf pr-1"></i>    
            Exportar a pdf
            </a>
        </div>
    </div>
    <div class="table-container">
        <table class="table is-rounded is-striped is-narrow is-hoverable is-fullwidht">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>apellido</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th class="has-text-centered"
                    colspan="2">Opciones</th>
                </tr>
            </thead>
        <tbody>
            <?php
                foreach ($usuarios as $usuario):
            ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario['id_usuario'])?></td>
                <td><?php echo htmlspecialchars($usuario['nombre'])?></td>
                <td><?php echo htmlspecialchars($usuario['apellido'])?></td>
                <td><?php echo htmlspecialchars($usuario['usuario'])?></td>
                <td><?php echo htmlspecialchars($usuario['email'])?></td>

                <td>
                    <a href="<?php echo APP_URL ?>usuario/actualizar_usuario/<?php echo $usuario['id_usuario'] ?>"
                    class="button is-rounded is-small is-success">Actualizar</a>
                </td>
                <td>
                    <form action="<?php echo APP_URL ?>app/ajax/usuarioAjax.php"
                          class="FormularioAjax"
                          method="POST"
                          autocomplete="on">
                        <input type="hidden"
                               name="modulo_usuario"
                               value="eliminar">
                        <input type="hidden"
                               name="id_usuario"
                               value="<?php echo $usuario['id_usuario'] ?>"
                        >
                        <button type="submit" class="button is-rounded is-warning is-small">
                                <i class="fa-solid fa-trash-can pr-1"></i> Eliminar</button>

                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>

</section>