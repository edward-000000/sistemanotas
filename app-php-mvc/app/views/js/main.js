document.addEventListener('DOMContentLoaded', () => {
    // Manejo del menú de navegación (navbar-burger)
    const navbarBurgers = Array.from(document.querySelectorAll('.navbar-burger'));
    navbarBurgers.forEach(navbarBurger => {
        navbarBurger.addEventListener('click', () => {
            const target = navbarBurger.dataset.target;
            const $target = document.getElementById(target);
            navbarBurger.classList.toggle('is-active');
            $target.classList.toggle('is-active');
        });
    });

    // Manejo del submenu de Usuario
    const usuario = document.getElementById('usuario');
    usuario.addEventListener('click', () => {
        const submenu = usuario.querySelector('.submenu');
        submenu.classList.toggle('active');
    });

    const submenuLinks = usuario.querySelectorAll('.submenu a');
    submenuLinks.forEach(link => {
        link.addEventListener('click', () => {
            const submenu = usuario.querySelector('.submenu');
            submenu.classList.remove('active');
        });
    });

    // Manejo del submenu de Administrar Tareas
    const tarea = document.getElementById('tarea');
    tarea.addEventListener('click', () => {
        const submenu = tarea.querySelector('.submenu');
        submenu.classList.toggle('active');
    });

    const tareaSubmenuLinks = tarea.querySelectorAll('.submenu a');
    tareaSubmenuLinks.forEach(link => {
        link.addEventListener('click', () => {
            const submenu = tarea.querySelector('.submenu');
            submenu.classList.remove('active');
        });
    });

    // Ajuste del tamaño del aside.menu según el ancho de la ventana
    function adjustMenuSize() {
        const aside = document.querySelector('aside.menu');
        const mainContent = document.querySelector('.main-content');

        if (window.innerWidth < 768) {
            aside.style.width = '0';
            aside.style.padding = '0';
            mainContent.style.marginLeft = '0';
        } else {
            aside.style.width = '256px';
            aside.style.padding = '10px';
            mainContent.style.marginLeft = '256px';
        }
    }

    // Llamar a la función al cargar la página y al cambiar el tamaño de la ventana
    adjustMenuSize();
    window.addEventListener('resize', adjustMenuSize);

    // Manejo del botón de colapso del aside.menu
    const click = document.querySelector('.click');
    let valida = true;

    click.innerHTML = "<i class=\"fa-solid fa-angles-right\"></i>";

    click.addEventListener('click', () => {
        if (valida) {
            click.innerHTML = "<i class=\"fa-solid fa-angles-right\"></i>";
            const aside = document.querySelector('aside.menu');
            const mainContent = document.querySelector('.main-content');
            aside.style.width = '0';
            aside.style.padding = '0';
            mainContent.style.marginLeft = '0';
            valida = false;
        } else {
            click.innerHTML = "<i class=\"fa-solid fa-angles-left\"></i>";
            const aside = document.querySelector('aside.menu');
            const mainContent = document.querySelector('.main-content');
            aside.style.width = '256px';
            aside.style.padding = '10px';
            mainContent.style.marginLeft = '256px';
            valida = true;
        }
    });

    // Asignar funcionalidad al botón
    const menuClickButton = document.querySelector('.menu-click');
    menuClickButton.addEventListener('click', () => {
        alert('Botón clickeado!');
        // Aquí puedes agregar la funcionalidad que desees
    });
});




