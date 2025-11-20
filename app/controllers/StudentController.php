<?php
// Cargar el modelo que maneja la tabla "students"
require_once 'app/models/StudentModel.php';

class StudentController {
    private $model; // Instancia del modelo Student

    public function __construct() {
        // Inicializar el modelo al crear el controlador
        $this->model = new StudentModel;
    }

    public function index() {
        // Obtener todos los estudiantes de la base de datos
        $students = $this->model->getAll();

        // Cargar vistas de la página principal de estudiantes
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/students/index.php';
        require 'app/views/partials/footer.php';
    }

    public function create() {
        $error = ""; // Variable para almacenar mensajes de error

        // Verificar si el formulario fue enviado
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Lista de campos obligatorios
            $required = ['ci', 'name', 'email', 'birth_date', 'age', 'semester', 'materia'];
            
            // Validar que todos los campos estén completos
            foreach ($required as $field) {
                if (empty($_POST[$field])) {
                    $error = "⚠️ Todos los campos son obligatorios.";
                    break;
                }
            }

            // Si no hay errores, registrar al estudiante
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

                // Redirigir a la lista de estudiantes
                header("Location: ?route=student/index");
                exit;
            }
        }

        // Cargar vista del formulario de creación de estudiante
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/students/create.php';
        require 'app/views/partials/footer.php';
    }

    public function delete() {
        // Verificar que se haya recibido un ID para borrar
        if (isset($_GET['id'])) {
            $this->model->delete($_GET['id']); // Eliminar estudiante
        }
        
        // Redirigir a la lista de estudiantes
        header("Location: ?route=student/index");
        exit;
    }

}