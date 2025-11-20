<?php
// Importar la clase BaseModel que maneja la conexión PDO
require_once 'app/models/BaseModel.php';

class StudentModel extends BaseModel {

    // Llamar al constructor del BaseModel para iniciar la conexión
    public function __construct() {
        parent::__construct();
    }

    // Obtener todos los registros de la tabla "students"
    public function getAll() {
        return $this->pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar un nuevo estudiante en la base de datos
    public function create($ci, $name, $email, $birth_date, $age, $semester, $materia) {
        $stmt = $this->pdo->prepare("
            INSERT INTO students (ci, name, email, birth_date, age, semester, materia)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$ci, $name, $email, $birth_date, $age, $semester, $materia]);
    }

    // Eliminar definitivamente un estudiante según su ID
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM students WHERE id=?");
        return $stmt->execute([$id]);
    }

    // Obtener estudiantes filtrando por la materia asignada
    public function getStudentsByMateria($materia) {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE materia = ?");
        $stmt->execute([$materia]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}