<?php

// Cargar la configuración de la base de datos (constantes DB_HOST, DB_USER, etc.)
require_once __DIR__ . '/../config/config.php';

class BaseModel {
    protected $pdo; // Conexión PDO disponible para todos los modelos que hereden

    public function __construct() {
        try {
            // Crear una conexión PDO usando las constantes de configuración
            $this->pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );

            // Activar modo de errores para lanzar excepciones si ocurre un problema
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // Detener la ejecución si ocurre un error al conectar
            die("Error de conexión: " . $e->getMessage());
        }
    }
}