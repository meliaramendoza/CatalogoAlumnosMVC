<?php
// Cargar modelos necesarios para cursos y estudiantes
require_once 'app/models/CourseModel.php';
require_once 'app/models/StudentModel.php';

class CourseController {

    private $model;         // Modelo para manejar cursos
    private $studentModel;  // Modelo para manejar estudiantes

    public function __construct() { 
        // Inicializar modelos al crear el controlador
        $this->model = new CourseModel; 
        $this->studentModel = new StudentModel;
    }

    public function index() {
        // Obtener todos los cursos y cargar la vista principal
        $courses = $this->model->getAll();
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/courses/index.php';
        require 'app/views/partials/footer.php';
    }

    public function create() {
        // Si el formulario fue enviado, crear un nuevo curso
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->create($_POST['name'], $_POST['description']);
            header("Location: ?route=course/index");
            exit;
        }

        // Mostrar formulario de creación
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/courses/create.php';
        require 'app/views/partials/footer.php';
    }

    public function delete() {
        // Eliminar curso si se recibe un ID
        if (isset($_GET['id'])) $this->model->delete($_GET['id']);

        // Volver a la lista de cursos
        header("Location: ?route=course/index");
    }

    /** 
     * Mostrar estudiantes inscritos en una materia específica.
     * Los estudiantes se obtienen comparando:
     * students.materia == courses.name
     */
    public function studentsByCourse() {

        // Validar que se reciba el ID del curso
        if (!isset($_GET['id'])) {
            header("Location: ?route=course/index");
            exit;
        }

        $courseId = $_GET['id'];               // ID del curso seleccionado
        $course = $this->model->getById($courseId);  // Datos del curso

        // Obtener estudiantes cuya materia coincide con el nombre del curso
        $students = $this->studentModel->getStudentsByMateria($course['name']);

        // Cargar vista que muestra estudiantes del curso
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/courses/students.php';
        require 'app/views/partials/footer.php';
    }

    public function removeStudent() {

        // Validar parámetros necesarios
        if (!isset($_GET['course_id']) || !isset($_GET['student_id'])) {
            header("Location: ?route=course/index");
            exit;
        }

        $courseId = $_GET['course_id'];   // ID del curso
        $studentId = $_GET['student_id']; // ID del estudiante a eliminar

        // Eliminar completamente el estudiante de la base de datos
        $this->studentModel->delete($studentId);

        // Volver a la lista de estudiantes del curso
        header("Location: ?route=course/studentsByCourse&id=" . $courseId);
        exit;
    }

}