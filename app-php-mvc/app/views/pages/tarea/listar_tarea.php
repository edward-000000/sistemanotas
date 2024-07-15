<?php
use app\controllers\TareaController;
$tareaController = new TareaController();

$tareas = $tareaController->listarTarea();
$estados = $tareaController->listarEstados();
?>
<section class="section">
    <div class="columns is-fluid is-vcentered is-mobile">
        <div class="column">
            <h1 class="title">Tareas</h1>
        </div>
        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>tarea/crear_tarea"
               class="button is-rounded is-success">
               <i class="fa-solid fa-note-sticky pr-1"></i>
                Nuevo Tarea
            </a>
        </div>
        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>pdf/reporte_tarea.php"
               class="button is-rounded is-success">
                <i class="fa-solid fa-file-pdf pr-1"></i>
                Exportar a pdf
            </a>
        </div>
    </div>
    <div class="table-container">
        <table class="table is-rounded is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Tarea</th>
                    <th>Fecha</th>
                    <th>Estado</th> <!-- Nuevo campo -->
                    <th class="has-text-centered" colspan="3">Opciones</th> <!-- Ajuste para 3 opciones -->
                </tr>
            </thead>
            <tbody>
                <?php foreach($tareas as $tarea): ?>
                <tr>
                    <td><?php echo htmlspecialchars($tarea['id_tarea']) ?></td>
                    <td><?php echo htmlspecialchars($tarea['titulo']) ?></td>
                    <td><?php echo htmlspecialchars($tarea['tarea']) ?></td>
                    <td><?php echo htmlspecialchars($tarea['fecha']) ?></td>
                    <td>
                        <form action="<?php echo APP_URL ?>app/ajax/tareaAjax.php"
                              class="FormularioAjax"
                              method="POST"
                              autocomplete="off">
                            <input type="hidden" name="modulo_tarea" value="cambiar_estado">
                            <input type="hidden" name="id_tarea" value="<?php echo $tarea['id_tarea'] ?>">
                            <div class="select is-small">
                                <select name="id_estado">
                                    <?php foreach($estados as $estado): ?>
                                        <option value="<?php echo $estado['id_estado'] ?>" <?php echo $estado['id_estado'] == $tarea['id_estado'] ? 'selected' : '' ?>>
                                            <?php echo htmlspecialchars($estado['estado']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="button is-rounded is-info is-small">
                                <i class="fa-solid fa-check pr-1"></i> Guardar estado
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="<?php echo APP_URL ?>tarea/actualizar_tarea/<?php echo $tarea['id_tarea'] ?>"
                           class="button is-rounded is-small is-link">
                            <i class="fa-solid fa-pencil pr-1"></i> Actualizar</a>
                    </td>
                    <td>
                        <form action="<?php echo APP_URL ?>app/ajax/tareaAjax.php"
                              class="FormularioAjax"
                              method="POST"
                              autocomplete="off">
                            <input type="hidden" name="modulo_tarea" value="eliminar">
                            <input type="hidden" name="id_tarea" value="<?php echo $tarea['id_tarea'] ?>">
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
