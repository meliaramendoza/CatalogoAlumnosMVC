<?php
// Datos de conexión a la base de datos
define('DB_HOST', 'localhost');   // Servidor de la base de datos
define('DB_USER', 'root');        // Usuario de MySQL
define('DB_PASS', '');            // Contraseña del usuario
define('DB_NAME', 'coursy');      // Nombre de la base de datos

try {
  // Crear una conexión PDO con MySQL
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
    DB_USER,
    DB_PASS
  );

  // Activar modo de errores para obtener excepciones detalladas
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  // Mostrar mensaje si ocurre un error al conectar
  die("Error de conexión: " . $e->getMessage());
}