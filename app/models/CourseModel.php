<?php
require_once 'app/models/BaseModel.php';

class CourseModel extends BaseModel {
    public function getAll() {
        return $this->pdo->query("SELECT * FROM courses")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $desc) {
        $stmt = $this->pdo->prepare("INSERT INTO courses (name, description) VALUES (?, ?)");
        return $stmt->execute([$name, $desc]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM courses WHERE id=?");
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

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM courses WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}