<?php
class HomeController {
    public function index() {
        require_once 'app/views/partials/header.php';
        require_once 'app/views/partials/navbar.php';
        require_once 'app/views/home/index.php';
        require_once 'app/views/partials/footer.php';
    }
}