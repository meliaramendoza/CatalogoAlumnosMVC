<?php
require_once 'app/models/BaseModel.php';

class StudentModel extends BaseModel {

    public function __construct() {
        parent::__construct(); // Inicializa la conexión PDO desde BaseModel
    }

    public function getAll() {
        return $this->pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ci, $name, $email, $birth_date, $age, $semester, $materia) {
        $stmt = $this->pdo->prepare("
            INSERT INTO students (ci, name, email, birth_date, age, semester, materia)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$ci, $name, $email, $birth_date, $age, $semester, $materia]);
    }


    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id=?");
        return $stmt->execute([$id]);
    }

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

    public function getStudentsByMateria($materia) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE materia = ?");
        $stmt->execute([$materia]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeMateriaFromStudent($studentId) {
        $stmt = $this->pdo->prepare("UPDATE students SET materia = NULL WHERE id = ?");
        return $stmt->execute([$studentId]);
    }

}