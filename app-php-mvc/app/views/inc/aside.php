<aside class="menu pt-6 mt-2">
        <div>
            <p class="menu-label">Configuración</p>
            <ul class="menu-list">
                <li id="usuario">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        Usuarios
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo APP_URL ?>usuario/crear_usuario">
                                <i class="fa-solid fa-plus"></i>
                                Crear Usuario
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo APP_URL ?>usuario/listar_usuario">
                                <i class="fa-solid fa-list"></i>
                                Listar Usuario
                            </a>
                        </li>
                        <li>
                    </ul>
                <li id="tarea">
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        Administrar Tareas
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo APP_URL ?>tarea/crear_tarea">
                                <i class="fa-solid fa-plus"></i>
                                Crear tarea
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo APP_URL ?>tarea/listar_tarea">
                                <i class="fa-solid fa-list"></i>
                                Listar Tareas
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../pages/documentacion">
                        <i class="fa fa-bell" ></i>
                        Acerca de nosotros
                    </a>
                </li>
                <li>
                    <a href="../pages/contacto">
                        <i class="fa fa-comment"></i>
                        Contáctenos
                    </a>
                </li>
            </ul>
        </div>
</aside>
