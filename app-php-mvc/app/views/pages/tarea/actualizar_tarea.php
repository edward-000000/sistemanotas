<?php
use app\controllers\TareaController;
use app\models\MainModel;

$tareaController = new TareaController();
$mainModel = new MainModel();

$id_tarea = $mainModel->limpiarCadena($url_vista[2]);
$tarea = $tareaController->listarTareaPorId($id_tarea);
?>
<section class="section">
    <div class="columns is-fluid is-vcentared is-mobile">
        <div class="column">
            <h1 class="title">Tarea</h1>
            <h2 class="subtitle">Actualizar</h2>
        </div>
        <div class="column is-narrow">
            <a href="<?php echo APP_URL ?>tarea/listar_tarea"
               class="button is-rounded is-success">
                <i class="fa-solid fa-left-long pr-1"></i> Regresar atrás
            </a>
        </div>
    </div>
    <div>
        <form action="<?php echo APP_URL ?>app/ajax/tareaAjax.php"
              class="FormularioAjax"
              method="POST"
              autocomplete="on">
            <input 
                type="hidden"
                name="modulo_tarea"
                value="actualizar"
            >
            <input 
                type="hidden"
                name="id_tarea"
                value="<?php echo $tarea['id_tarea'] ?>"
            >
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Titulo
                        </label>
                        <input
                            class="input is-rounded"
                            type="text"
                            placeholder="Nombre"
                            required
                            name="titulo"
                            value="<?php echo $tarea['titulo'] ?>"
                        />
                    </div>
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Fecha
                        </label>
                        <input
                            class="input is-rounded"
                            type="datetime-local"
                            placeholder="Fecha"
                            required
                            name="fecha"
                            value="<?php echo $tarea['fecha'] ?>"
                        />
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Tarea
                        </label>
                        <textarea
                            class="textarea"
                            placeholder="Descripción de la tarea"
                            rows="10"
                            required
                            name="tarea"
                        ><?php echo $tarea['tarea'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="has-text-centered">
                <button type="reset" 
                        class="button is-link is-rounded">
                    Limpiar
                </button>
                <button type="submit" 
                        class="button is-info is-rounded">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</section>
