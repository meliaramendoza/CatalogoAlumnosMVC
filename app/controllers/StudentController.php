<?php
require_once 'app/models/StudentModel.php';

class StudentController {
    private $model;

    public function __construct() {
        $this->model = new StudentModel;
    }

    public function index() {
        $students = $this->model->getAll();
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/students/index.php';
        require 'app/views/partials/footer.php';
    }

    public function create() {
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Campos requeridos
            $required = ['ci', 'name', 'email', 'birth_date', 'age', 'semester', 'materia'];
            
            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = "⚠️ Todos los campos son obligatorios.";
                    break;
                }
            }

            // Si no hay error, guardar datos
            if (empty($error)) {
                $this->model->create(
                    $_POST['ci'],
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['birth_date'],
                    $_POST['age'],
                    $_POST['semester'],
                    $_POST['materia']
                );

                header("Location: ?route=student/index");
                exit;
            }
        }

        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/students/create.php';
        require 'app/views/partials/footer.php';
    }

    public function delete() {
        if (isset($_GET['id'])) $this->model->delete($_GET['id']);
        header("Location: ?route=student/index");
    }
}