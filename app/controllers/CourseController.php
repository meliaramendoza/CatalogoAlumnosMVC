<?php
require_once 'app/models/CourseModel.php';
require_once 'app/models/StudentModel.php';

class CourseController {

    private $model;
    private $studentModel;

    public function __construct() { 
        $this->model = new CourseModel; 
        $this->studentModel = new StudentModel;
    }

    public function index() {
        $courses = $this->model->getAll();
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/courses/index.php';
        require 'app/views/partials/footer.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->create($_POST['name'], $_POST['description']);
            header("Location: ?route=course/index");
            exit;
        }
        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/courses/create.php';
        require 'app/views/partials/footer.php';
    }

    public function delete() {
        if (isset($_GET['id'])) $this->model->delete($_GET['id']);
        header("Location: ?route=course/index");
    }

    /** 
     * LISTA estudiantes por MATERIA
     * Aquí filtramos desde la tabla students directamente:
     * WHERE students.materia = courses.name
     */
    public function studentsByCourse() {

        if (!isset($_GET['id'])) {
            header("Location: ?route=course/index");
            exit;
        }

        $courseId = $_GET['id'];
        $course = $this->model->getById($courseId);

        //CLAVE: Obtener estudiantes según la materia
        $students = $this->studentModel->getStudentsByMateria($course['name']);

        require 'app/views/partials/header.php';
        require 'app/views/partials/navbar.php';
        require 'app/views/courses/students.php';
        require 'app/views/partials/footer.php';
    }

    public function removeStudent() {

        if (!isset($_GET['course_id']) || !isset($_GET['student_id'])) {
            header("Location: ?route=course/index");
            exit;
        }

        $courseId = $_GET['course_id'];
        $studentId = $_GET['student_id'];

        //AHORA SI SE ELIMINA COMPLETAMENTE EL ALUMNO DE LA TABLA
        $this->studentModel->delete($studentId);

        header("Location: ?route=course/studentsByCourse&id=" . $courseId);
        exit;
    }

}