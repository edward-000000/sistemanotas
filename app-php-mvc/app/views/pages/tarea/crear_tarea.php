<section class="section">
    <div class="columns is-fluid is-vcentered is-mobile">
        <div class="column">
            <h1 class="title">Tarea</h1>
            <h2 class="subtitle">Crear tarea</h2>
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
              method="POST"
              class="FormularioAjax"
              autocomplete="off"
              enctype="multipart/form-data">
            <input type="hidden" name="modulo_tarea" value="registrar">
            
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Nombres
                        </label>
                        <input class="input is-rounded"
                               type="text"
                               placeholder="Nombres"
                               required
                               name="titulo">
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">
                            <i class="fa-solid fa-cable-car"></i>
                            Fecha
                        </label>
                        <input class="input is-rounded"
                               type="datetime-local"
                               placeholder="Fecha"
                               required
                               name="fecha">
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
                        <textarea class="textarea is-rounded"
                                  placeholder="¿Qué quieres hacer hoy?"
                                  required
                                  name="tarea"
                                  rows="5"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="columns">
                <div class="column has-text-centered">
                    <button type="reset" class="button is-link is-rounded">Limpiar</button>
                    <button type="submit" class="button is-info is-rounded">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</section>




