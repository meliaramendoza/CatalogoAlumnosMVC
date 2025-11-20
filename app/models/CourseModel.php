<?php
// Importar la clase BaseModel, que contiene la conexión PDO
require_once 'app/models/BaseModel.php';

// CourseModel hereda la conexión y funcionalidades básicas de BaseModel
class CourseModel extends BaseModel {

    // Obtener todos los cursos de la tabla "courses"
    public function getAll() {
        return $this->pdo->query("SELECT * FROM courses")->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo curso con nombre y descripción
    public function create($name, $desc) {
        $stmt = $this->pdo->prepare("INSERT INTO courses (name, description) VALUES (?, ?)");
        return $stmt->execute([$name, $desc]);
    }

    // Eliminar un curso por su ID
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id=?");
        return $stmt->execute([$id]);
    }

    // Obtener estudiantes asignados a un curso mediante tabla intermedia course_student
    public function getStudentsByCourse($courseId) {
        $stmt = $this->pdo->prepare("
            SELECT students.*
            FROM students
            INNER JOIN course_student ON students.id = course_student.student_id
            WHERE course_student.course_id = ?
        ");
        $stmt->execute([$courseId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener datos de un curso específico por su ID
    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}