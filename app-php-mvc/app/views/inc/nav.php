<nav class="is-fixed-top navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <button class="button is-white menu-click"> </button>
        <a class="navbar-item" href="#">
            <img src="<?php echo APP_URL?>./app/views/img/logo.jpg" alt="logo" height="400">

        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="../pages/principal">
                Inicio
            </a>

            <a class="navbar-item" href="../pages/documentacion">
                Documentacion
            </a>

            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Mas
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        A cerca de
                    </a>
                    <a class="navbar-item is-selected">
                        Trabajo
                    </a>
                    <a class="navbar-item " href="../pages/contacto">
                        Contactos
                    </a>
                    <hr class="navbar-divider" >
                    <a class="navbar-item">
                        Reportar
                    </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="../../../../../www/app-php-mvc/">
                        <strong>Desconectar </strong>
                    </a>
                    <a class="button is-light">
                        Iniciar
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>