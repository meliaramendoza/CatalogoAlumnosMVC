<?php
class HomeController {

    // Método principal que carga la página de inicio
    public function index() {

        // Incluir encabezado HTML
        require_once 'app/views/partials/header.php';

        // Incluir barra de navegación
        require_once 'app/views/partials/navbar.php';

        // Cargar la vista principal de Home
        require_once 'app/views/home/index.php';

        // Incluir pie de página
        require_once 'app/views/partials/footer.php';
    }
}